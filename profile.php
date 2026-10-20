<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - SIRUKA</title>
    <link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>

<div class="app-layout">

    <aside class="sidebar" id="sidebar">
        <a href="menu.php?page=beranda" class="brand">SIRUKA</a>

        <p class="menu-label">Main Menu</p>

        <nav class="nav-menu">
            <a href="beranda.php" class="nav-link"><span>⌂</span>Beranda</a>
            <a href="cari-ruangan.php" class="nav-link"><span>▤</span>Cari Ruangan</a>
            <a href="kalender.php" class="nav-link"><span>▦</span>Jadwal Kalender</a>
            <a href="form-pengajuan.php" class="nav-link"><span>▧</span>Formulir Pengajuan</a>
            <a href="riwayat-peminjaman.php" class="nav-link"><span>◴</span>Riwayat Peminjaman</a>
        </nav>

        <p class="menu-label general-label">General</p>

        <nav class="nav-menu">
            <a href="profile.php" class="nav-link active"><span>♙</span>Profile</a>
            <a href="menu.php?page=settings" class="nav-link"><span>⚙</span>Settings</a>
            <a href="notifikasi.php" class="nav-link"><span>♧</span>Notifikasi</a>
            <a href="index.php" class="nav-link"><span>⇥</span>Log Out</a>
        </nav>
    </aside>

    <main class="main-area">
        <header class="topbar">
            <button class="mobile-menu" id="mobileMenu" type="button">☰</button>

            <div class="search-box">
                <span>⌕</span>
                <input type="text" placeholder="Search">
            </div>

            <div class="top-actions">
                <a href="form-pengajuan.php" class="add-button">+ Add Reservation</a>
                <a class="round-action" href="notifikasi.php" aria-label="Buka notifikasi">♧</a>
                <button class="round-action">⚙</button>
                <button class="profile-action">♙</button>
            </div>
        </header>

        <section class="content">
            <div class="profile-container">
                <h1>Profile</h1>

                <form id="profileForm">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" name="nim">
                    </div>

                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <input type="text" id="prodi" name="prodi">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="telepon">No Telpon</label>
                        <input type="text" id="telepon" name="telepon">
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-back">Kembali</button>
                        <button type="submit" class="btn-save">Konfirmasi</button>
                    </div>

                    <p id="formMessage"></p>
                </form>
            </div>
        </section>
    </main>

</div>

<script src="assets/js/profile.js"></script>
</body>
</html>