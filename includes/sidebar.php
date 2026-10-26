<?php
// Pastikan session sudah aktif di halaman utama
// Cek role user (sesuaikan nama key session role kamu, misal $_SESSION['role'] atau $_SESSION['level'])
$user_role = $_SESSION['role'] ?? 'member'; // Default ke member jika belum diset
$isAdmin = (strtolower($user_role) === 'admin');
?>

<aside class="sidebar" id="sidebar">
  <a href="beranda.php" class="brand">SIRUKA</a>
  
  <nav class="nav-menu" aria-label="Menu utama">
    
    <!-- MENU UMUM / MEMBER -->
    <?php if (!$isAdmin): ?>
        <p class="menu-label">Main Menu</p>
        <a href="beranda.php" class="nav-link <?= (isset($pagetitle) && $pagetitle == 'Beranda') ? 'active' : ''; ?>">
          <span>⌂</span>
          Beranda
        </a>
        <a href="form-pengajuan.php" class="nav-link <?= (isset($pagetitle) && $pagetitle == 'Form Pengajuan') ? 'active' : ''; ?>">
          <span>▧</span>
          Formulir Pengajuan
        </a>
        <a href="riwayat-peminjaman.php" class="nav-link <?= (isset($pagetitle) && $pagetitle == 'Riwayat Peminjaman') ? 'active' : ''; ?>">
          <span>◴</span>
          Riwayat Peminjaman
        </a>
    <?php endif; ?>

    <!-- MENU KHUSUS ADMIN -->
    <?php if ($isAdmin): ?>
        <p class="menu-label">Admin Menu</p>
        <a href="beranda.php" class="nav-link <?= (isset($pagetitle) && $pagetitle == 'Beranda') ? 'active' : ''; ?>">
          <span>⌂</span>
          Beranda Admin
        </a>
        <a href="tambah_ruangan.php" class="nav-link <?= (isset($pagetitle) && $pagetitle == 'Tambah Ruangan') ? 'active' : ''; ?>">
          <span>＋</span>
          Tambah Ruangan
        </a>
        <a href="konfirmasi.php" class="nav-link <?= (isset($pagetitle) && $pagetitle == 'Konfirmasi') ? 'active' : ''; ?>">
          <span>✔</span>
          Konfirmasi Peminjaman
        </a>
    <?php endif; ?>

  </nav>
</aside>