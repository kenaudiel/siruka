<?php
$pageTitle = "Konfirmasi Peminjaman";
$activePage = "konfirmasi";

// Data contoh. Nantinya bisa diganti dengan data dari database.
$requests = [
    ["id" => "PJ-2026-001", "nama" => "Andi Saputra", "ruangan" => "Ruang Rapat A", "tanggal" => "22 Oktober 2026", "waktu" => "09.00–11.00", "keperluan" => "Rapat organisasi", "status" => "Menunggu"],
    ["id" => "PJ-2026-002", "nama" => "Siti Rahma", "ruangan" => "Laboratorium Komputer", "tanggal" => "23 Oktober 2026", "waktu" => "13.00–15.00", "keperluan" => "Praktikum", "status" => "Menunggu"],
    ["id" => "PJ-2026-003", "nama" => "Budi Pratama", "ruangan" => "Ruang Seminar", "tanggal" => "24 Oktober 2026", "waktu" => "10.00–12.00", "keperluan" => "Seminar mahasiswa", "status" => "Disetujui"],
];
?>
<!doctype html>
<html lang="id">
  <?php 
    $pagetitle = "Konfirmasi";
    $pageCSS = "admin-pages.css";
    $layoutCSS = "true";

    include 'includes/header.php'
  ?>
<body>
<div class="app-layout">
    <?php include 'includes/sidebar.php' ?>

    <main class="main-area">
        <?php include 'includes/topbar.php' ?>

        <section class="stats-grid" aria-label="Ringkasan pengajuan">
            <article class="stat-card"><span class="stat-caption">Total Pengajuan</span><strong><?= count($requests) ?></strong><span class="stat-note">Data contoh</span></article>
            <article class="stat-card"><span class="stat-caption">Menunggu</span><strong><?= count(array_filter($requests, fn($r) => $r['status'] === 'Menunggu')) ?></strong><span class="stat-note">Perlu ditinjau</span></article>
            <article class="stat-card"><span class="stat-caption">Disetujui</span><strong><?= count(array_filter($requests, fn($r) => $r['status'] === 'Disetujui')) ?></strong><span class="stat-note">Sudah dikonfirmasi</span></article>
        </section>

        <section class="panel">
            <div class="panel-heading">
                <div><h2>Daftar Pengajuan</h2><p>Periksa detail sebelum menyetujui atau menolak permohonan.</p></div>
                <div class="toolbar">
                    <input type="search" id="requestSearch" class="search-input" placeholder="Cari nama / ruangan..." aria-label="Cari pengajuan">
                    <select id="statusFilter" class="select-input" aria-label="Filter status">
                        <option value="">Semua status</option><option value="Menunggu">Menunggu</option><option value="Disetujui">Disetujui</option><option value="Ditolak">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="table-wrap">
                <table id="requestsTable">
                    <thead><tr><th>ID Pengajuan</th><th>Peminjam</th><th>Ruangan & Waktu</th><th>Keperluan</th><th>Status</th><th>Aksi</th></tr></thead>
                    <tbody>
                    <?php foreach ($requests as $request): ?>
                        <tr data-status="<?= htmlspecialchars($request['status']) ?>">
                            <td data-label="ID Pengajuan"><span class="request-id"><?= htmlspecialchars($request['id']) ?></span><small class="mobile-detail"><?= htmlspecialchars($request['tanggal']) ?></small></td>
                            <td data-label="Peminjam"><strong><?= htmlspecialchars($request['nama']) ?></strong><small class="table-sub"><?= htmlspecialchars($request['tanggal']) ?></small></td>
                            <td data-label="Ruangan & Waktu"><strong><?= htmlspecialchars($request['ruangan']) ?></strong><small class="table-sub"><?= htmlspecialchars($request['waktu']) ?></small></td>
                            <td data-label="Keperluan"><?= htmlspecialchars($request['keperluan']) ?></td>
                            <td data-label="Status"><span class="status status-<?= strtolower($request['status']) ?>"><?= htmlspecialchars($request['status']) ?></span></td>
                            <td data-label="Aksi">
                                <?php if ($request['status'] === 'Menunggu'): ?>
                                <div class="action-buttons">
                                    <button class="btn btn-success btn-small" data-decision="Disetujui" data-id="<?= htmlspecialchars($request['id']) ?>">Setujui</button>
                                    <button class="btn btn-danger btn-small" data-decision="Ditolak" data-id="<?= htmlspecialchars($request['id']) ?>">Tolak</button>
                                </div>
                                <?php else: ?><span class="muted">Selesai</span><?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="empty-state" id="emptyState" hidden>Tidak ada pengajuan yang cocok dengan pencarian.</div>
            </div>
            <p class="demo-note">Catatan: data pada halaman ini masih berupa contoh. Tombol Setujui/Tolak hanya mengubah tampilan sementara di browser, belum menyimpan ke database.</p>
        </section>
    </main>
</div>
<div class="toast" id="toast" role="status" aria-live="polite"></div>
<dialog class="confirm-dialog" id="decisionDialog" aria-labelledby="decisionTitle" aria-describedby="decisionMessage">
    <div class="confirm-dialog-content">
        <span class="confirm-dialog-icon" id="decisionIcon" aria-hidden="true">?</span>
        <h2 id="decisionTitle">Konfirmasi tindakan</h2>
        <p id="decisionMessage"></p>
        <div class="confirm-dialog-actions">
            <button class="btn btn-light" id="cancelDecision" type="button">Batal</button>
            <button class="btn" id="confirmDecision" type="button">Konfirmasi</button>
        </div>
    </div>
</dialog>
</body>
</html>
