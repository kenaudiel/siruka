<!DOCTYPE html>
<html lang="id">
  <?php 
    $pagetitle = "Beranda";
    $pageCSS = "beranda.css";

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
                <div class="stat-top"><span>Total Pengajuan</span><span class="stat-icon blue">▤</span></div>
                <strong>12</strong>
                <small>Seluruh pengajuan Anda</small>
            </article>
            <article class="stat-card">
                <div class="stat-top"><span>Disetujui</span><span class="stat-icon green">✓</span></div>
                <strong class="green-text">8</strong>
                <small>Pengajuan telah diterima</small>
            </article>
            <article class="stat-card">
                <div class="stat-top"><span>Menunggu</span><span class="stat-icon orange">◷</span></div>
                <strong class="orange-text">2</strong>
                <small>Menunggu verifikasi</small>
            </article>
            <article class="stat-card">
                <div class="stat-top"><span>Ruangan Tersedia</span><span class="stat-icon purple">▦</span></div>
                <strong>6</strong>
                <small>Siap diajukan untuk reservasi</small>
            </article>
        </section>

        <section class="panel rooms-panel">
            <div class="panel-heading">
                <h2>Ruangan</h2>
                <p>Pilihan ruangan untuk kegiatan Anda</p>
            </div>
            <div class="room-chips">
                <a href="cari-ruangan.php" class="room-chip"><span class="room-symbol">▦</span><span><strong>OCR 1</strong><small>Ruangan tersedia</small></span><i class="available-dot"></i></a>
                <a href="cari-ruangan.php" class="room-chip"><span class="room-symbol">▦</span><span><strong>OCR 2</strong><small>Ruangan tersedia</small></span><i class="available-dot"></i></a>
                <a href="cari-ruangan.php" class="room-chip"><span class="room-symbol">▦</span><span><strong>OCR 6</strong><small>Ruangan tersedia</small></span><i class="available-dot"></i></a>
            </div>
            </section>
        </section>
    </main>
  </div>
  <script src="assets/js/beranda.js"></script>
  </body>
</html>
