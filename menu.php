<?php
$requestedPage = $_GET['page'] ?? 'beranda';
if ($requestedPage === 'beranda') {
    header('Location: beranda.php');
    exit;
}
if ($requestedPage === 'notifikasi') {
    header('Location: notifikasi.php');
    exit;
}
if ($requestedPage === 'riwayat-peminjaman') {
    header('Location: riwayat-peminjaman.php');
    exit;
}

$pages = [
    'beranda' => [
        'title' => 'Beranda',
        'description' => 'Selamat datang di SIRUKA. Gunakan menu di samping untuk mencari ruangan, mengajukan peminjaman, atau melihat profil.',
    ],
    'settings' => [
        'title' => 'Settings',
        'description' => 'Pengaturan akun dan aplikasi akan tersedia di halaman ini.',
    ],
];

$page = $_GET['page'] ?? 'beranda';
$pageExists = is_string($page) && array_key_exists($page, $pages);
if (!$pageExists) {
    http_response_code(404);
    $page = 'beranda';
}

$title = $pageExists ? $pages[$page]['title'] : 'Halaman tidak ditemukan';
$description = $pageExists
    ? $pages[$page]['description']
    : 'Halaman yang diminta tidak tersedia.';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?> - SIRUKA</title>
    <link rel="stylesheet" href="assets/css/cari-ruangan.css">
    <style>
        .page-card {
            max-width: 760px;
            padding: 28px;
            border: 1px solid #e8e8e8;
            border-radius: 12px;
            background: #f7f8fa;
            box-shadow: 0 4px 14px #172b3d0a;
        }

        .page-card p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }

        @media (max-width: 480px) {
            .page-card {
                padding: 20px;
            }

            .page-card p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="app-layout">
    <aside class="sidebar" id="sidebar">
        <a href="menu.php?page=beranda" class="brand">SIRUKA</a>
        <p class="menu-label">Main Menu</p>
        <nav class="nav-menu">
            <a href="menu.php?page=beranda" class="nav-link<?= $page === 'beranda' && $pageExists ? ' active' : '' ?>"><span>⌂</span>Beranda</a>
            <a href="cari-ruangan.php" class="nav-link"><span>▤</span>Cari Ruangan</a>
            <a href="kalender.php" class="nav-link"><span>▦</span>Jadwal Kalender</a>
            <a href="form-pengajuan.php" class="nav-link"><span>▧</span>Formulir Pengajuan</a>
            <a href="riwayat-peminjaman.php" class="nav-link"><span>◴</span>Riwayat Peminjaman</a>
        </nav>
        <p class="menu-label general-label">General</p>
        <nav class="nav-menu">
            <a href="profile.php" class="nav-link"><span>♙</span>Profile</a>
            <a href="menu.php?page=settings" class="nav-link<?= $page === 'settings' ? ' active' : '' ?>"><span>⚙</span>Settings</a>
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
            <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
            <article class="page-card">
                <p><?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?></p>
            </article>
        </section>
    </main>
</div>
<script>
    const mobileMenu = document.getElementById("mobileMenu");
    const sidebar = document.getElementById("sidebar");
    mobileMenu.addEventListener("click", () => sidebar.classList.toggle("open"));
</script>
</body>
</html>
