<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - SIRUKA</title>
    <link rel="stylesheet" href="assets/css/settings.css">
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
            <a href="settings.php" class="nav-link active"><span>⚙</span>Settings</a>
            <a href="#" class="nav-link"><span>♧</span>Notifikasi</a>
            <a href="#" class="nav-link"><span>⇥</span>Log Out</a>
        </nav>
    </aside>

    <main class="main-area">
        <header class="topbar">
            <button class="mobile-menu" id="mobileMenu" type="button" aria-label="Buka menu">☰</button>
            <label class="search-box">
                <span>⌕</span>
                <input type="search" placeholder="Search" aria-label="Search">
            </label>
            <div class="top-actions">
                <a href="form-pengajuan.php" class="add-button">＋ Add Reservation</a>
                <a class="round-action" href="notifikasi.php" aria-label="Buka notifikasi">♧</a>
                <button class="round-action" type="button" aria-label="Pengaturan">⚙</button>
                <button class="profile-action" type="button" aria-label="Profil">♙</button>
            </div>
        </header>

        <section class="content">
            <h1>Settings</h1>

            <section class="account-summary">
                <div class="avatar" aria-hidden="true">♙</div>
                <div class="account-info">
                    <h2>Kenneth Audiel Manuelli</h2>
                    <p>audielkenneth23@gmail.com</p>
                </div>
            </section>

            <div class="account-actions">
                <button type="button" class="manage-button" id="manageAccount">Manage Account</button>
                <button type="button" class="signout-button" id="signOut">Sign Out</button>
            </div>

            <form class="password-form" id="passwordForm">
                <div class="form-group">
                    <label for="newPassword">Change Password</label>
                    <input type="password" id="newPassword" name="newPassword" autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" autocomplete="new-password">
                </div>
                <div class="form-actions">
                    <button type="reset" class="cancel-button">Cancel</button>
                    <button type="submit" class="confirm-button">Konfirmasi</button>
                </div>
                <p id="formMessage" aria-live="polite"></p>
            </form>
        </section>
    </main>
</div>
<script src="assets/js/settings.js"></script>
</body>
</html>
