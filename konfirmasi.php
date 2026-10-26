<?php
session_start();

$conn = require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/database.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil data peminjaman dari database, bergabung dengan tabel user untuk mendapatkan nama peminjam
$query = "SELECT p.id, p.ruangan_id, p.nama_kegiatan, p.kategori_kegiatan, p.waktu_peminjaman, p.status_peminjaman, u.nama AS nama_peminjam 
          FROM peminjaman p 
          JOIN user u ON p.member_id = u.id 
          ORDER BY p.id DESC";
$result = mysqli_query($conn, $query);

$requests = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Format ID pengajuan (contoh: PJ-2026-001)
        $formatted_id = 'PJ-' . date('Y') . '-' . str_pad($row['id'], 3, '0', STR_PAD_LEFT);
        
        // Format tanggal dan waktu dari kolom DATETIME
        $dt = strtotime($row['waktu_peminjaman']);
        $tanggal = date('d F Y', $dt);
        $waktu = date('H.i', $dt) . ' WIB';

        // Mapping ENUM database ('diproses', 'disetujui', 'ditolak') ke tampilan UI
        $status_db = $row['status_peminjaman'];
        $status_display = 'Menunggu';
        if ($status_db === 'disetujui') $status_display = 'Disetujui';
        elseif ($status_db === 'ditolak') $status_display = 'Ditolak';
        elseif ($status_db === 'diproses') $status_display = 'Menunggu';

        $requests[] = [
            "id" => $formatted_id,
            "raw_id" => $row['id'], // ID asli untuk parameter database
            "nama" => $row['nama_peminjam'],
            "ruangan" => $row['ruangan_id'],
            "tanggal" => $tanggal,
            "waktu" => $waktu,
            "keperluan" => $row['nama_kegiatan'] . ' (' . $row['kategori_kegiatan'] . ')',
            "status" => $status_display,
            "status_db" => $status_db
        ];
    }
}
?>
<!doctype html>
<html lang="id">
  <?php 
    $pagetitle = "Konfirmasi";
    $pageCSS = "admin-pages.css";
    $layoutCSS = "true";

    include 'includes/header.php';
  ?>
<body>
<div class="app-layout">
    <?php include 'includes/sidebar.php'; ?>

    <main class="main-area">
        <?php include 'includes/topbar.php'; ?>

        <!-- Statistik Dinamis -->
        <section class="stats-grid" aria-label="Ringkasan pengajuan">
            <article class="stat-card">
                <span class="stat-caption">Total Pengajuan</span>
                <strong><?= count($requests) ?></strong>
                <span class="stat-note">Seluruh permohonan</span>
            </article>
            <article class="stat-card">
                <span class="stat-caption">Menunggu</span>
                <strong><?= count(array_filter($requests, fn($r) => $r['status'] === 'Menunggu')) ?></strong>
                <span class="stat-note">Perlu ditinjau</span>
            </article>
            <article class="stat-card">
                <span class="stat-caption">Disetujui</span>
                <strong><?= count(array_filter($requests, fn($r) => $r['status'] === 'Disetujui')) ?></strong>
                <span class="stat-note">Sudah dikonfirmasi</span>
            </article>
        </section>

        <section class="panel">
            <div class="panel-heading">
                <div>
                    <h2>Daftar Pengajuan</h2>
                    <p>Periksa detail sebelum menyetujui atau menolak permohonan.</p>
                </div> 
            </div>
            <div class="table-wrap">
                <table id="requestsTable">
                    <thead>
                        <tr>
                            <th>ID Pengajuan</th>
                            <th>Peminjam</th>
                            <th>Ruangan &amp; Waktu</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (count($requests) > 0): ?>
                        <?php foreach ($requests as $request): ?>
                            <tr data-status="<?= htmlspecialchars($request['status']) ?>">
                                <td data-label="ID Pengajuan">
                                    <span class="request-id"><?= htmlspecialchars($request['id']) ?></span>
                                    <small class="mobile-detail"><?= htmlspecialchars($request['tanggal']) ?></small>
                                </td>
                                <td data-label="Peminjam">
                                    <strong><?= htmlspecialchars($request['nama']) ?></strong>
                                    <small class="table-sub"><?= htmlspecialchars($request['tanggal']) ?></small>
                                </td>
                                <td data-label="Ruangan &amp; Waktu">
                                    <strong><?= htmlspecialchars($request['ruangan']) ?></strong>
                                    <small class="table-sub"><?= htmlspecialchars($request['waktu']) ?></small>
                                </td>
                                <td data-label="Keperluan"><?= htmlspecialchars($request['keperluan']) ?></td>
                                <td data-label="Status">
                                    <span class="status status-<?= strtolower($request['status']) ?>"><?= htmlspecialchars($request['status']) ?></span>
                                </td>
                                <td data-label="Aksi">
                                    <?php if ($request['status'] === 'Menunggu'): ?>
                                    <div class="action-buttons">
                                        <!-- Tombol mengirim data ke file proses_konfirmasi.php -->
                                        <form action="konfirmasi_process.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $request['raw_id'] ?>">
                                            <input type="hidden" name="decision" value="disetujui">
                                            <button type="submit" class="btn btn-success btn-small">Setujui</button>
                                        </form>

                                        <form action="konfirmasi_process.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $request['raw_id'] ?>">
                                            <input type="hidden" name="decision" value="ditolak">
                                            <button type="submit" class="btn btn-danger btn-small">Tolak</button>
                                        </form>
                                    </div>
                                    <?php else: ?>
                                        <span class="muted">Selesai</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 20px; color: #64748b;">Belum ada data pengajuan peminjaman.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="empty-state" id="emptyState" hidden>Tidak ada pengajuan yang cocok dengan pencarian.</div>
            </div>
            <p class="demo-note">Data di atas diambil secara langsung dan real-time dari database SIRUKA.</p>
        </section>
    </main>
</div>
<div class="toast" id="toast" role="status" aria-live="polite"></div>
</body>
</html>