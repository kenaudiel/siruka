<?php
session_start();

$conn = require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/database.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// 1. Ambil data statistik ringkasan (Summary Counts)
// (Asumsi kolom status di database bernama 'status')
$q_total = mysqli_query($conn, "SELECT COUNT(*) as total FROM peminjaman WHERE member_id = $user_id");
$total_all = mysqli_fetch_assoc($q_total)['total'] ?? 0;

$q_disetujui = mysqli_query($conn, "SELECT COUNT(*) as total FROM peminjaman WHERE member_id = $user_id AND status_peminjaman = 'disetujui'");
$total_disetujui = mysqli_fetch_assoc($q_disetujui)['total'] ?? 0;

$q_menunggu = mysqli_query($conn, "SELECT COUNT(*) as total FROM peminjaman WHERE member_id = $user_id AND status_peminjaman = 'diproses'");
$total_menunggu = mysqli_fetch_assoc($q_menunggu)['total'] ?? 0;

$q_ditolak = mysqli_query($conn, "SELECT COUNT(*) as total FROM peminjaman WHERE member_id = $user_id AND status_peminjaman = 'ditolak'");
$total_ditolak = mysqli_fetch_assoc($q_ditolak)['total'] ?? 0;

// 2. Ambil data riwayat peminjaman milik user ini
$query = "SELECT * FROM peminjaman WHERE member_id = ? ORDER BY id DESC";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$total_rows = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="id">
  <?php 
    $pagetitle = "Riwayat Peminjaman";
    $pageCSS = "riwayat-peminjaman.css";
    $layoutCSS = "true";

    include 'includes/header.php';
  ?>
<body>
<div class="app-layout">
    
  <?php include 'includes/sidebar.php'; ?>

    <main class="main-area">
        <?php include 'includes/topbar.php' ?>

        <section class="content">
            <div class="page-heading">
                <div>
                    <h1>Riwayat Peminjaman</h1>
                    <p class="subtitle">Lihat dan pantau status pengajuan serta peminjaman ruangan Anda.</p>
                </div>
            </div>

            <!-- Summary Cards Dinamis -->
            <div class="summary-grid">
                <article class="summary-card">
                    <span class="summary-label">Total Pengajuan</span>
                    <strong><?= $total_all; ?></strong>
                    <span class="summary-note">Seluruh pengajuan</span>
                </article>
                <article class="summary-card">
                    <span class="summary-label">Disetujui</span>
                    <strong class="text-green"><?= $total_disetujui; ?></strong>
                    <span class="summary-note">Pengajuan diterima</span>
                </article>
                <article class="summary-card">
                    <span class="summary-label">Menunggu</span>
                    <strong class="text-orange"><?= $total_menunggu; ?></strong>
                    <span class="summary-note">Dalam proses verifikasi</span>
                </article>
                <article class="summary-card">
                    <span class="summary-label">Ditolak</span>
                    <strong class="text-red"><?= $total_ditolak; ?></strong>
                    <span class="summary-note">Pengajuan tidak disetujui</span>
                </article>
            </div>

            <section class="history-panel">
                <div class="panel-heading">
                    <h2>Daftar Peminjaman</h2>
                </div>

                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kegiatan</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="historyTable">
                          <?php if ($total_rows > 0): ?>
                              <?php while ($row = mysqli_fetch_assoc($result)): 
                                  $formatted_id = 'SRK-' . str_pad($row['id'], 3, '0', STR_PAD_LEFT);
                                  
                                  $datetime = strtotime($row['waktu_peminjaman']);
                                  $tanggal_format = date('d M Y', $datetime);
                                  $waktu_format = date('H.i', $datetime) . ' WIB';

                                  // 1. AMBIL DARI KOLOM YANG BENAR: status_peminjaman
                                  $status_db = $row['status_peminjaman'] ?? 'diproses';
                                  
                                  // 2. TENTUKAN KELAS CSS BADGE DAN LABEL TAMPILAN
                                  $badge_class = 'pending';
                                  $status_label = 'Menunggu';

                                  if ($status_db === 'disetujui') {
                                      $badge_class = 'approved';
                                      $status_label = 'Disetujui';
                                  } elseif ($status_db === 'ditolak') {
                                      $badge_class = 'rejected';
                                      $status_label = 'Ditolak';
                                  } elseif ($status_db === 'diproses') {
                                      $badge_class = 'pending';
                                      $status_label = 'Menunggu';
                                  }

                                  $search_string = strtolower($formatted_id . ' ' . $row['nama_kegiatan'] . ' ' . $row['kategori_kegiatan'] . ' ' . $row['ruangan_id'] . ' ' . $tanggal_format . ' ' . $status_label);
                              ?>
                                  <tr data-status="<?= htmlspecialchars($status_label); ?>" data-search="<?= htmlspecialchars($search_string); ?>">
                                      <td class="id-cell"><?= htmlspecialchars($formatted_id); ?></td>
                                      <td>
                                          <strong><?= htmlspecialchars($row['nama_kegiatan']); ?></strong>
                                          <small><?= htmlspecialchars($row['kategori_kegiatan']); ?></small>
                                      </td>
                                      <td><?= htmlspecialchars($row['ruangan_id']); ?></td>
                                      <td><?= htmlspecialchars($tanggal_format); ?></td>
                                      <td><?= htmlspecialchars($waktu_format); ?></td>
                                      <!-- Menggunakan badge_class dan status_label yang dinamis -->
                                      <td><span class="status-badge <?= $badge_class; ?>"><?= htmlspecialchars($status_label); ?></span></td>
                                      <td><button class="view-button" type="button" data-id="<?= $row['id']; ?>">Detail</button></td>
                                  </tr>
                              <?php endwhile; ?>
                          <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <p class="empty-state" id="emptyState" <?= $total_rows > 0 ? 'hidden' : ''; ?>>Tidak ada riwayat yang sesuai dengan pencarian atau filter.</p>
                
            </section>
        </section>
    </main>
</div>

<?php include 'includes/modal-detail-ruangan.php' ?>
<script src="assets/js/riwayat-peminjaman.js"></script>
</body>
</html>