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
            <a href="form-pengajuan.php" class="primary-button">＋ Ajukan Peminjaman</a>
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

        <div class="dashboard-grid">
            <section class="panel upcoming-panel">
                <div class="panel-heading">
                    <div><h2>Jadwal Mendatang</h2><p>Ringkasan peminjaman terdekat</p></div>
                    <a href="kalender.php" class="text-link">Lihat Kalender →</a>
                </div>
                <div class="upcoming-list">
                    <article class="upcoming-item">
                        <div class="date-block"><strong>24</strong><span>SEP</span></div>
                        <div class="event-info"><h3>Seminar Teknologi</h3><p>OCR 1 · 09.00–12.00</p><span class="status approved">Disetujui</span></div>
                        <a href="riwayat-peminjaman.php" class="item-arrow" aria-label="Lihat riwayat">›</a>
                    </article>
                    <article class="upcoming-item">
                        <div class="date-block"><strong>25</strong><span>SEP</span></div>
                        <div class="event-info"><h3>Rapat Organisasi</h3><p>OCR 6 · 13.00–15.00</p><span class="status pending">Menunggu</span></div>
                        <a href="riwayat-peminjaman.php" class="item-arrow" aria-label="Lihat riwayat">›</a>
                    </article>
                    <article class="upcoming-item">
                        <div class="date-block"><strong>28</strong><span>SEP</span></div>
                        <div class="event-info"><h3>Diskusi Kelompok</h3><p>OCR 4 · 10.00–12.00</p><span class="status approved">Disetujui</span></div>
                        <a href="riwayat-peminjaman.php" class="item-arrow" aria-label="Lihat riwayat">›</a>
                    </article>
                </div>
                <a href="riwayat-peminjaman.php" class="panel-bottom-link">Lihat semua riwayat peminjaman</a>
            </section>

            <section class="panel quick-panel">
                <div class="panel-heading">
                    <div><h2>Akses Cepat</h2><p>Mulai aktivitas Anda</p></div>
                </div>
                <a href="form-pengajuan.php" class="quick-action">
                    <span class="quick-icon navy">＋</span><span><strong>Ajukan Peminjaman</strong><small>Buat pengajuan ruangan baru</small></span><b>›</b>
                </a>
                <a href="cari-ruangan.php" class="quick-action">
                    <span class="quick-icon teal">⌕</span><span><strong>Cari Ruangan</strong><small>Periksa ruangan yang tersedia</small></span><b>›</b>
                </a>
                <a href="kalender.php" class="quick-action">
                    <span class="quick-icon violet">▦</span><span><strong>Lihat Kalender</strong><small>Periksa jadwal kegiatan</small></span><b>›</b>
                </a>
                <a href="notifikasi.php" class="quick-action">
                    <span class="quick-icon amber">♧</span><span><strong>Notifikasi</strong><small>Lihat pembaruan pengajuan</small></span><b>›</b>
                </a>
            </section>
        </div>

        <section class="panel rooms-panel">
            <div class="panel-heading">
                <div><h2>Ruangan</h2><p>Pilihan ruangan untuk kegiatan Anda</p></div>
                <a href="cari-ruangan.php" class="text-link">Lihat Semua →</a>
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
