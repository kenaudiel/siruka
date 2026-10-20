<?php
$timezone = new DateTimeZone('Asia/Jakarta');
$today = new DateTimeImmutable('today', $timezone);
$monthStart = $today->modify('first day of this month');
$monthLength = (int) $monthStart->format('t');
$firstWeekday = (int) $monthStart->format('w');
$weekCount = (int) ceil(($firstWeekday + $monthLength) / 7);
$gridStart = $monthStart->modify("-{$firstWeekday} days");

$monthNames = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember',
];
$monthTitle = $monthNames[(int) $today->format('n')] . ' ' . $today->format('Y');

$events = [
    '2026-09-09' => ['room' => 'OCR 6', 'kind' => 'Seminar', 'color' => 'green'],
    '2026-09-10' => ['room' => 'OCR 1', 'kind' => 'Organisasi', 'color' => 'yellow'],
    '2026-09-22' => ['room' => 'OCR 4', 'kind' => 'Lomba', 'color' => 'pink'],
    '2026-09-23' => ['room' => 'OCR 5', 'kind' => 'Organisasi', 'color' => 'yellow'],
    '2026-09-25' => ['room' => 'OCR 6', 'kind' => 'Organisasi', 'color' => 'yellow'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender - SIRUKA</title>
    <link rel="stylesheet" href="assets/css/kalender.css">
</head>
<body>
<div class="app-layout">
    <aside class="sidebar" id="sidebar">
        <a href="menu.php?page=beranda" class="brand">SIRUKA</a>
        <p class="menu-label">Main Menu</p>
        <nav class="nav-menu" aria-label="Menu utama">
            <a class="nav-link" href="beranda.php"><span>⌂</span>Beranda</a>
            <a class="nav-link" href="cari-ruangan.php"><span>▤</span>Cari Ruangan</a>
            <a class="nav-link active" href="kalender.php" aria-current="page"><span>▦</span>Jadwal Kalender</a>
            <a class="nav-link" href="form-pengajuan.php"><span>▧</span>Formulir Pengajuan</a>
            <a class="nav-link" href="riwayat-peminjaman.php"><span>◴</span>Riwayat Peminjaman</a>
        </nav>

        <p class="menu-label general-label">General</p>
        <nav class="nav-menu" aria-label="Menu umum">
            <a class="nav-link" href="profile.php"><span>♙</span>Profile</a>
            <a class="nav-link" href="menu.php?page=settings"><span>⚙</span>Settings</a>
            <a class="nav-link" href="notifikasi.php"><span>♧</span>Notifikasi</a>
            <a class="nav-link" href="index.php"><span>⇥</span>Log Out</a>
        </nav>
    </aside>

    <main class="main-area">
        <header class="topbar">
            <button class="mobile-menu" id="mobileMenu" type="button" aria-label="Buka menu" aria-controls="sidebar" aria-expanded="false">☰</button>
            <label class="search-box">
                <span aria-hidden="true">⌕</span>
                <input type="search" placeholder="Search" aria-label="Cari">
            </label>
            <div class="top-actions">
                <a href="form-pengajuan.php" class="add-button">＋ Add Reservation</a>
                <a class="round-action" href="notifikasi.php" aria-label="Buka notifikasi">♧</a>
                <button class="round-action" type="button" aria-label="Pengaturan">⚙</button>
                <a class="profile-action" href="profile.php" aria-label="Buka profil">♙</a>
            </div>
        </header>

        <section class="content">
            <h1>Jadwal Kalender <span class="month-title"><?= htmlspecialchars($monthTitle, ENT_QUOTES, 'UTF-8') ?></span></h1>
            <div class="calendar-wrap">
                <div class="calendar-grid" role="grid" aria-label="Kalender <?= htmlspecialchars($monthTitle, ENT_QUOTES, 'UTF-8') ?>" style="grid-template-rows: 44px repeat(<?= $weekCount ?>, minmax(110px, 1fr));">
                    <div class="weekday" role="columnheader">MIN</div>
                    <div class="weekday" role="columnheader">SEN</div>
                    <div class="weekday" role="columnheader">SEL</div>
                    <div class="weekday" role="columnheader">RAB</div>
                    <div class="weekday" role="columnheader">KAM</div>
                    <div class="weekday" role="columnheader">JUM</div>
                    <div class="weekday" role="columnheader">SAB</div>
                    <?php for ($dayOffset = 0; $dayOffset < $weekCount * 7; $dayOffset++): ?>
                        <?php
                        $date = $gridStart->modify("+{$dayOffset} days");
                        $dateKey = $date->format('Y-m-d');
                        $isCurrentMonth = $date->format('Y-m') === $monthStart->format('Y-m');
                        $event = $events[$dateKey] ?? null;
                        $dateLabel = $date->format('j') . ' ' . $monthNames[(int) $date->format('n')] . ' ' . $date->format('Y');
                        $classes = ['day'];
                        if (!$isCurrentMonth) {
                            $classes[] = 'outside';
                        }
                        if ($dateKey === $today->format('Y-m-d')) {
                            $classes[] = 'today';
                        }
                        if ($event !== null) {
                            $classes[] = 'event';
                            $classes[] = $event['color'];
                        }
                        ?>
                        <?php if ($event !== null): ?>
                            <button class="<?= htmlspecialchars(implode(' ', $classes), ENT_QUOTES, 'UTF-8') ?>" type="button" role="gridcell" data-date="<?= htmlspecialchars($dateLabel, ENT_QUOTES, 'UTF-8') ?>" data-room="<?= htmlspecialchars($event['room'], ENT_QUOTES, 'UTF-8') ?>" data-kind="<?= htmlspecialchars($event['kind'], ENT_QUOTES, 'UTF-8') ?>" aria-label="<?= htmlspecialchars($dateLabel . ', ' . $event['room'] . ', ' . $event['kind'], ENT_QUOTES, 'UTF-8') ?>">
                                <span><?= $date->format('j') ?><?= $isCurrentMonth ? '' : ' ' . htmlspecialchars(substr($monthNames[(int) $date->format('n')], 0, 3), ENT_QUOTES, 'UTF-8') ?></span>
                                <b><?= htmlspecialchars($event['room'], ENT_QUOTES, 'UTF-8') ?></b>
                                <small><?= htmlspecialchars($event['kind'], ENT_QUOTES, 'UTF-8') ?></small>
                            </button>
                        <?php else: ?>
                            <div class="<?= htmlspecialchars(implode(' ', $classes), ENT_QUOTES, 'UTF-8') ?>" role="gridcell">
                                <span><?= $date->format('j') ?><?= $isCurrentMonth ? '' : ' ' . htmlspecialchars(substr($monthNames[(int) $date->format('n')], 0, 3), ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal-backdrop" id="modal" hidden>
    <section class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <button id="close" class="close" type="button" aria-label="Tutup detail">×</button>
        <h2 id="modalTitle">Detail Jadwal</h2>
        <p><b>Tanggal:</b> <span id="date"></span></p>
        <p><b>Ruangan:</b> <span id="room"></span></p>
        <p><b>Kegiatan:</b> <span id="kind"></span></p>
    </section>
</div>
<script src="assets/js/kalender.js"></script>
</body>
</html>
