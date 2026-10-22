<!DOCTYPE html>
<html lang="id">
  <?php 
    $pagetitle = "Riwayat Peminjaman";
    $pageCSS = "riwayat-peminjaman.css";

    include 'includes/header.php'
  ?>
<body>
<div class="app-layout">
    
  <?php include 'includes/sidebar.php'; ?>

    <main class="main-area">
        <?php include 'includes/topbar.php' ?>

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

<?php include 'includes/modal-detail-ruangan.php' ?>
<script src="assets/js/riwayat-peminjaman.js"></script>
</body>
</html>
