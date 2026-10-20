<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman - SIRUKA</title>
    <link rel="stylesheet" href="assets/css/riwayat-peminjaman.css">
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
            <a href="riwayat-peminjaman.php" class="nav-link active"><span>◴</span>Riwayat Peminjaman</a>
        </nav>
        <p class="menu-label general-label">General</p>
        <nav class="nav-menu">
            <a href="profile.php" class="nav-link"><span>♙</span>Profile</a>
            <a href="settings.php" class="nav-link"><span>⚙</span>Settings</a>
            <a href="notifikasi.php" class="nav-link"><span>♧</span>Notifikasi</a>
            <a href="index.php" class="nav-link"><span>⇥</span>Log Out</a>
        </nav>
    </aside>

    <main class="main-area">
        <header class="topbar">
            <button class="mobile-menu" id="mobileMenu" type="button" aria-label="Buka menu">☰</button>
            <label class="search-box">
                <span>⌕</span>
                <input type="search" id="searchInput" placeholder="Search" aria-label="Cari riwayat">
            </label>
            <div class="top-actions">
                <a href="form-pengajuan.php" class="add-button">＋ Add Reservation</a>
                <a class="round-action" href="notifikasi.php" aria-label="Buka notifikasi">♧</a>
                <button class="round-action" type="button" aria-label="Pengaturan">⚙</button>
                <a class="profile-action" href="profile.php" aria-label="Buka profil">♙</a>
            </div>
        </header>

        <section class="content">
            <div class="page-heading">
                <div>
                    <h1>Riwayat Peminjaman</h1>
                    <p class="subtitle">Lihat dan pantau status pengajuan serta peminjaman ruangan Anda.</p>
                </div>
                <a href="form-pengajuan.php" class="primary-button">＋ Pengajuan Baru</a>
            </div>

            <div class="summary-grid">
                <article class="summary-card">
                    <span class="summary-label">Total Pengajuan</span>
                    <strong>12</strong>
                    <span class="summary-note">Seluruh pengajuan</span>
                </article>
                <article class="summary-card">
                    <span class="summary-label">Disetujui</span>
                    <strong class="text-green">8</strong>
                    <span class="summary-note">Pengajuan diterima</span>
                </article>
                <article class="summary-card">
                    <span class="summary-label">Menunggu</span>
                    <strong class="text-orange">2</strong>
                    <span class="summary-note">Dalam proses verifikasi</span>
                </article>
                <article class="summary-card">
                    <span class="summary-label">Ditolak</span>
                    <strong class="text-red">2</strong>
                    <span class="summary-note">Pengajuan tidak disetujui</span>
                </article>
            </div>

            <section class="history-panel">
                <div class="panel-heading">
                    <h2>Daftar Peminjaman</h2>
                    <div class="table-tools">
                        <label class="filter-select">
                            <span>Status:</span>
                            <select id="statusFilter" aria-label="Filter status">
                                <option value="all">Semua</option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kegiatan</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="historyTable">
                            <tr data-status="Disetujui" data-search="SRK-012 seminar teknologi OCR 1 24 september 2026">
                                <td class="id-cell">SRK-012</td>
                                <td><strong>Seminar Teknologi</strong><small>Seminar Umum</small></td>
                                <td>OCR 1</td><td>24 Sep 2026</td><td>09.00–12.00</td>
                                <td><span class="status-badge approved">Disetujui</span></td>
                                <td><button class="view-button" type="button" data-id="SRK-012">Detail</button></td>
                            </tr>
                            <tr data-status="Menunggu" data-search="SRK-011 rapat organisasi OCR 6 25 september 2026">
                                <td class="id-cell">SRK-011</td>
                                <td><strong>Rapat Organisasi</strong><small>Organisasi / UKM</small></td>
                                <td>OCR 6</td><td>25 Sep 2026</td><td>13.00–15.00</td>
                                <td><span class="status-badge pending">Menunggu</span></td>
                                <td><button class="view-button" type="button" data-id="SRK-011">Detail</button></td>
                            </tr>
                            <tr data-status="Selesai" data-search="SRK-010 diskusi kelompok OCR 4 18 september 2026">
                                <td class="id-cell">SRK-010</td>
                                <td><strong>Diskusi Kelompok</strong><small>Akademik</small></td>
                                <td>OCR 4</td><td>18 Sep 2026</td><td>10.00–12.00</td>
                                <td><span class="status-badge completed">Selesai</span></td>
                                <td><button class="view-button" type="button" data-id="SRK-010">Detail</button></td>
                            </tr>
                            <tr data-status="Ditolak" data-search="SRK-009 latihan lomba OCR 2 16 september 2026">
                                <td class="id-cell">SRK-009</td>
                                <td><strong>Latihan Lomba</strong><small>Lomba</small></td>
                                <td>OCR 2</td><td>16 Sep 2026</td><td>15.00–17.00</td>
                                <td><span class="status-badge rejected">Ditolak</span></td>
                                <td><button class="view-button" type="button" data-id="SRK-009">Detail</button></td>
                            </tr>
                            <tr data-status="Disetujui" data-search="SRK-008 kuliah tamu OCR 7 12 september 2026">
                                <td class="id-cell">SRK-008</td>
                                <td><strong>Kuliah Tamu</strong><small>Akademik</small></td>
                                <td>OCR 7</td><td>12 Sep 2026</td><td>08.00–11.00</td>
                                <td><span class="status-badge approved">Disetujui</span></td>
                                <td><button class="view-button" type="button" data-id="SRK-008">Detail</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="empty-state" id="emptyState" hidden>Tidak ada riwayat yang sesuai dengan pencarian atau filter.</p>
                <div class="table-footer"><span id="resultCount">Menampilkan 5 data contoh</span><span>Data contoh untuk desain</span></div>
            </section>
        </section>
    </main>
</div>

<div class="modal-backdrop" id="detailModal" hidden>
    <section class="detail-modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <button class="modal-close" id="closeModal" type="button" aria-label="Tutup">×</button>
        <h2 id="modalTitle">Detail Peminjaman</h2>
        <div class="detail-content" id="detailContent"></div>
        <button class="modal-ok" id="modalOk" type="button">Tutup</button>
    </section>
</div>
<script src="assets/js/riwayat-peminjaman.js"></script>
</body>
</html>
