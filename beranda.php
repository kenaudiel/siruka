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

$q_tersedia_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM ruangan WHERE status_ruangan = 'tersedia'");
$total_ruangan_tersedia = mysqli_fetch_assoc($q_tersedia_count)['total'] ?? 0;

$q_ruangan = mysqli_query($conn, "SELECT kode_ruangan FROM ruangan WHERE status_ruangan = 'tersedia' ORDER BY kode_ruangan ASC LIMIT 6");

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
    $pagetitle = "Beranda";
    $pageCSS = "beranda.css";
    $layoutCSS = "true";

    include 'includes/header.php'
  ?>
</html>
<body>
  <div class="app-layout">
    
  <?php include 'includes/sidebar.php'; ?>

  <main class="main-area">
    <?php include 'includes/topbar.php' ?>

    <section class="content">
        <div class="welcome-row">
            <div>
                <p class="eyebrow">DASHBOARD</p>
                <h1>Selamat Datang di SIRUKA!</h1>
                <p class="welcome-text">Kelola peminjaman ruangan dan pantau jadwal kegiatan Anda dengan mudah.</p>
            </div>
        </div>

        <section class="stats-grid" aria-label="Ringkasan peminjaman">
            <article class="stat-card">
                <div class="stat-top"><span>Total Pengajuan</span><span class="stat-icon blue"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-notepad-text preview-icon"><path d="M8 2v4"/><path d="M12 2v4"/><path d="M16 2v4"/><rect width="16" height="18" x="4" y="4" rx="2"/><path d="M8 10h6"/><path d="M8 14h8"/><path d="M8 18h5"/></svg></span></div>
                <strong><?= $total_all ?></strong>
                <small>Seluruh pengajuan Anda</small>
            </article>
            <article class="stat-card">
                <div class="stat-top"><span>Disetujui</span><span class="stat-icon green"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check preview-icon"><path d="M20 6 9 17l-5-5"/></svg></span></div>
                <strong class="green-text"><?= $total_disetujui ?></strong>
                <small>Pengajuan telah diterima</small>
            </article>
            <article class="stat-card">
                <div class="stat-top"><span>Menunggu</span><span class="stat-icon orange"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-4 preview-icon"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></span></div>
                <strong class="orange-text"><?= $total_menunggu ?></strong>
                <small>Menunggu verifikasi</small>
            </article>
            <article class="stat-card">
                <div class="stat-top"><span>Ruangan Tersedia</span><span class="stat-icon purple"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-brick-wall preview-icon"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M12 9v6"/><path d="M16 15v6"/><path d="M16 3v6"/><path d="M3 15h18"/><path d="M3 9h18"/><path d="M8 15v6"/><path d="M8 3v6"/></svg></span></div>
                <strong><?= $total_ruangan_tersedia ?></strong>
                <small>Siap diajukan untuk reservasi</small>
            </article>
        </section>

        <section class="panel rooms-panel">
            <div class="panel-heading">
                <h2>Ruangan Tersedia</h2>
                <p>Pilihan ruangan untuk kegiatan Anda</p>
            </div>
            <div class="room-chips">
                <?php if (mysqli_num_rows($q_ruangan) > 0): ?>
                    <?php while ($room = mysqli_fetch_assoc($q_ruangan)): ?>
                        <a href="form-pengajuan.php" class="room-chip">
                          <span class="room-symbol">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-brick-wall preview-icon"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M12 9v6"/><path d="M16 15v6"/><path d="M16 3v6"/><path d="M3 15h18"/><path d="M3 9h18"/><path d="M8 15v6"/><path d="M8 3v6"/></svg>
                          </span>
                          <span>
                            <strong><?= htmlspecialchars($room['kode_ruangan']); ?></strong>
                            <small>Ruangan tersedia</small>
                          </span>
                          <i class="available-dot"></i>
                        </a>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p style="color: #64748b; font-size: 14px;">Belum ada ruangan yang tersedia saat ini.</p>
                <?php endif; ?>
            </div>
          </section>
        </section>
    </main>
  </div>
  <script src="assets/js/beranda.js"></script>
  </body>
</html>
