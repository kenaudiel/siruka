<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengajuan - SIRUKA</title>
    <link rel="stylesheet" href="assets/css/pengajuan.css">
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
            <a href="form-pengajuan.php" class="nav-link active">
                <span>▧</span>Formulir Pengajuan
            </a>
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
            <button class="mobile-menu" id="mobileMenu"
                    type="button" aria-label="Buka menu">☰</button>

            <div class="search-box">
                <span>⌕</span>
                <input type="search" placeholder="Search">
            </div>

            <div class="top-actions">
                <a href="form-pengajuan.php" class="add-button">
                    + Add Reservation
                </a>
                <a class="round-action" href="notifikasi.php" aria-label="Buka notifikasi">♧</a>
                <button class="round-action" aria-label="Pengaturan">⚙</button>
                <button class="profile-action" aria-label="Profil">♙</button>
            </div>
        </header>

        <section class="content">
            <div class="form-container">

                <h1>Formulir Pengajuan Peminjaman Ruangan</h1>

                <form id="reservationForm">

                    <div class="form-field">
                        <label for="agenda">Nama Kegiatan / Agenda</label>
                        <input type="text" id="agenda" name="agenda">
                    </div>

                    <fieldset class="category-field">
                        <legend>Kategori Kegiatan</legend>

                        <label class="radio-option">
                            <input type="radio" name="kategori" value="Akademik">
                            Akademik
                        </label>

                        <label class="radio-option">
                            <input type="radio" name="kategori" value="Seminar Umum">
                            Seminar Umum
                        </label>

                        <label class="radio-option">
                            <input type="radio" name="kategori" value="Organisasi / UKM">
                            Organisasi / UKM
                        </label>

                        <label class="radio-option">
                            <input type="radio" name="kategori" value="Lomba">
                            Lomba
                        </label>

                        <label class="radio-other">
                            <input type="radio" name="kategori" value="Lainnya">
                            <span>Lainnya:</span>
                            <input type="text" name="kategori_lainnya"
                                   aria-label="Kategori lainnya">
                        </label>
                    </fieldset>

                    <div class="form-field">
                        <label for="peserta">Estimasi Jumlah Peserta</label>
                        <input type="number" id="peserta" name="peserta" min="1">
                    </div>

                    <div class="form-field">
                        <label for="ruangan">Ruangan</label>
                        <input type="text" id="ruangan" name="ruangan">
                    </div>

                    <div class="form-field">
                        <label for="waktu">Tanggal &amp; Rentang Waktu</label>
                        <input type="datetime-local" id="waktu" name="waktu">
                    </div>

                    <div class="form-actions">
                        <button type="reset" class="button-cancel">Cancel</button>
                        <button type="submit" class="button-submit">Submit</button>
                    </div>

                    <p id="formMessage" aria-live="polite"></p>

                </form>
            </div>
        </section>

    </main>
</div>

<script src="assets/js/pengajuan.js"></script>
</body>
</html>
