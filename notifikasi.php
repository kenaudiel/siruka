<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - SIRUKA</title>
    <link rel="stylesheet" href="assets/css/notifikasi.css">
</head>
<body>
<div class="app-layout">
    <aside class="sidebar" id="sidebar">
        <a href="index.php" class="brand">SIRUKA</a>
        <p class="menu-label">Main Menu</p>
        <nav class="nav-menu">
            <a href="beranda.php" class="nav-link"><span>⌂</span>Beranda</a>
            <a href="cari-ruangan.php" class="nav-link"><span>♙</span>Cari Ruangan</a>
            <a href="kalender.php" class="nav-link"><span>▦</span>Jadwal Kalender</a>
            <a href="form-pengajuan.php" class="nav-link"><span>▧</span>Formulir Pengajuan</a>
            <a href="riwayat-peminjaman.php" class="nav-link"><span>◴</span>Riwayat Peminjaman</a>
        </nav>
        <p class="menu-label general-label">General</p>
        <nav class="nav-menu">
            <a href="profile.php" class="nav-link"><span>♙</span>Profile</a>
            <a href="settings.php" class="nav-link"><span>⚙</span>Settings</a>
            <a href="notifikasi.php" class="nav-link active"><span>♧</span>Notifikasi</a>
            <a href="#" class="nav-link"><span>⇥</span>Log Out</a>
        </nav>
    </aside>

    <main class="main-area">
        <header class="topbar">
            <button class="mobile-menu" id="mobileMenu" type="button" aria-label="Buka menu">☰</button>
            <label class="search-box">
                <span>⌕</span>
                <input type="search" id="searchInput" placeholder="Search" aria-label="Cari notifikasi">
            </label>
            <div class="top-actions">
                <a href="form-pengajuan.php" class="add-button">＋ Add Reservation</a>
                <a class="round-action active-bell" href="notifikasi.php" aria-label="Notifikasi saat ini" aria-current="page">♧</a>
                <button class="round-action" type="button" aria-label="Pengaturan">⚙</button>
                <button class="profile-action" type="button" aria-label="Profil">♙</button>
            </div>
        </header>

        <section class="content">
            <div class="page-heading">
                <div>
                    <h1>Notifikasi</h1>
                    <p class="subtitle">Lihat informasi terbaru mengenai pengajuan dan peminjaman ruangan.</p>
                </div>
                <button class="mark-all" id="markAllRead" type="button">Tandai semua dibaca</button>
            </div>

            <div class="notification-toolbar">
                <div class="filter-tabs" role="group" aria-label="Filter notifikasi">
                    <button class="filter-tab selected" data-filter="all" type="button">Semua <span id="allCount">5</span></button>
                    <button class="filter-tab" data-filter="unread" type="button">Belum dibaca <span id="unreadCount">3</span></button>
                </div>
            </div>

            <div class="notification-list" id="notificationList">
                <article class="notification unread" data-category="reservation" data-search="pengajuan ruangan ocr 1 diterima disetujui">
                    <div class="notification-icon success">✓</div>
                    <div class="notification-body">
                        <div class="notification-title-row"><h2>Pengajuan peminjaman diterima</h2><span class="unread-dot"></span></div>
                        <p>Pengajuan peminjaman ruangan <strong>OCR 1</strong> telah disetujui oleh pengelola.</p>
                        <span class="notification-time">Hari ini, 09.30</span>
                    </div>
                    <button class="more-button" type="button" aria-label="Tandai dibaca">•••</button>
                </article>

                <article class="notification unread" data-category="reservation" data-search="pengajuan ocr 6 menunggu verifikasi diproses">
                    <div class="notification-icon pending">◷</div>
                    <div class="notification-body">
                        <div class="notification-title-row"><h2>Pengajuan sedang diproses</h2><span class="unread-dot"></span></div>
                        <p>Pengajuan ruangan <strong>OCR 6</strong> sedang menunggu verifikasi pengelola.</p>
                        <span class="notification-time">Hari ini, 08.15</span>
                    </div>
                    <button class="more-button" type="button" aria-label="Tandai dibaca">•••</button>
                </article>

                <article class="notification unread" data-category="reminder" data-search="pengingat jadwal peminjaman ocr 2 besok">
                    <div class="notification-icon reminder">▦</div>
                    <div class="notification-body">
                        <div class="notification-title-row"><h2>Pengingat jadwal peminjaman</h2><span class="unread-dot"></span></div>
                        <p>Jangan lupa, jadwal peminjaman ruangan <strong>OCR 2</strong> dijadwalkan untuk besok.</p>
                        <span class="notification-time">Kemarin, 16.45</span>
                    </div>
                    <button class="more-button" type="button" aria-label="Tandai dibaca">•••</button>
                </article>

                <article class="notification" data-category="reservation" data-search="peminjaman ocr 4 selesai riwayat">
                    <div class="notification-icon info">i</div>
                    <div class="notification-body">
                        <div class="notification-title-row"><h2>Peminjaman telah selesai</h2></div>
                        <p>Peminjaman ruangan <strong>OCR 4</strong> telah selesai. Terima kasih telah menggunakan SIRUKA.</p>
                        <span class="notification-time">18 September 2026, 14.20</span>
                    </div>
                    <button class="more-button" type="button" aria-label="Tandai dibaca">•••</button>
                </article>

                <article class="notification" data-category="system" data-search="informasi sistem pembaruan siruka">
                    <div class="notification-icon system">⚙</div>
                    <div class="notification-body">
                        <div class="notification-title-row"><h2>Informasi sistem</h2></div>
                        <p>Pastikan informasi profil dan kontak Anda selalu diperbarui agar proses reservasi berjalan lancar.</p>
                        <span class="notification-time">15 September 2026, 10.00</span>
                    </div>
                    <button class="more-button" type="button" aria-label="Tandai dibaca">•••</button>
                </article>
            </div>
            <p class="empty-state" id="emptyState" hidden>Tidak ada notifikasi yang sesuai.</p>
        </section>
    </main>
</div>
<script src="assets/js/notifikasi.js"></script>
</body>
</html>
