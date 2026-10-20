<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cari Ruangan - SIRUKA</title>
<link rel="stylesheet" href="assets/css/cari-ruangan.css">
</head>
<body>
<div class="app-layout">
<aside class="sidebar" id="sidebar">
<a href="menu.php?page=beranda" class="brand">SIRUKA</a>
<p class="menu-label">Main Menu</p>
<nav class="nav-menu">
<a href="beranda.php" class="nav-link"><span>⌂</span>Beranda</a>
<a href="cari-ruangan.php" class="nav-link active"><span>♙</span>Cari Ruangan</a>
<a href="kalender.php" class="nav-link"><span>▦</span>Jadwal Kalender</a>
<a href="form-pengajuan.php" class="nav-link"><span>▧</span>Formulir Pengajuan</a>
<a href="riwayat-peminjaman.php" class="nav-link"><span>◴</span>Riwayat Peminjaman</a>
</nav>
<p class="menu-label general-label">General</p>
<nav class="nav-menu">
<a href="profile.php" class="nav-link"><span>♙</span>Profile</a>
<a href="menu.php?page=settings" class="nav-link"><span>⚙</span>Settings</a>
<a href="notifikasi.php" class="nav-link"><span>♧</span>Notifikasi</a>
<a href="index.php" class="nav-link"><span>⇥</span>Log Out</a>
</nav>
</aside>
<main class="main-area">
<header class="topbar">
<button class="mobile-menu" id="mobileMenu" type="button" aria-label="Buka menu">☰</button>
<label class="search-box"><span>⌕</span><input type="search" placeholder="Search" aria-label="Search"></label>
<div class="top-actions">
<a href="form-pengajuan.php" class="add-button">＋ Add Reservation</a>
<a class="round-action" href="notifikasi.php" aria-label="Buka notifikasi">♧</a>
<button class="round-action" type="button" aria-label="Pengaturan">⚙</button>
<button class="profile-action" type="button" aria-label="Profil">♙</button>
</div>
</header>
<section class="content">
<h1>Cari Ruangan</h1>
<div class="room-grid">
<article class="room-card"><div class="room-heading"><h2>OCR 1</h2><span class="status"><i></i> Available</span></div><p class="room-date">24 September 2026</p><div class="room-actions"><button class="detail-button" type="button" data-room="OCR 1">Lihat Detail</button><a class="reserve-button" href="form-pengajuan.php">＋ <span>Tambah Reservasi</span></a></div></article>
<article class="room-card"><div class="room-heading"><h2>OCR 2</h2><span class="status"><i></i> Available</span></div><p class="room-date">25 September 2026</p><div class="room-actions"><button class="detail-button" type="button" data-room="OCR 2">Lihat Detail</button><a class="reserve-button" href="form-pengajuan.php">＋ <span>Tambah Reservasi</span></a></div></article>
<article class="room-card"><div class="room-heading"><h2>OCR 6</h2><span class="status"><i></i> Available</span></div><p class="room-date">26 September 2026</p><div class="room-actions"><button class="detail-button" type="button" data-room="OCR 6">Lihat Detail</button><a class="reserve-button" href="form-pengajuan.php">＋ <span>Tambah Reservasi</span></a></div></article>
<article class="room-card"><div class="room-heading"><h2>OCR 7</h2><span class="status"><i></i> Available</span></div><p class="room-date">28 September 2026</p><div class="room-actions"><button class="detail-button" type="button" data-room="OCR 7">Lihat Detail</button><a class="reserve-button" href="form-pengajuan.php">＋ <span>Tambah Reservasi</span></a></div></article>
</div>
</section>
</main>
</div>
<div class="modal-backdrop" id="detailModal" hidden><section class="detail-modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle"><button class="modal-close" id="closeModal" type="button" aria-label="Tutup">×</button><h2 id="modalTitle">Detail Ruangan</h2><p id="modalRoomName"></p><p class="modal-description">Informasi detail ruangan dapat ditambahkan nanti.</p><button type="button" class="modal-ok" id="modalOk">Tutup</button></section></div>
<script src="assets/js/cari-ruangan.js"></script>
</body>
</html>
