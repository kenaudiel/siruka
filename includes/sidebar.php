<aside class="sidebar" id="sidebar">
  <a href="beranda.php" class="brand">SIRUKA</a>
  <p class="menu-label">Main Menu</p>
  <nav class="nav-menu" aria-label="Menu utama">
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
  </nav>
</aside>

