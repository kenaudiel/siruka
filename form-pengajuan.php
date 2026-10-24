<?php
session_start();

$conn = require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/database.php';
$filter = "tersedia";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$query = "SELECT kode_ruangan FROM ruangan WHERE status_ruangan = ? ORDER BY kode_ruangan ASC";
$stmt = mysqli_prepare($conn, $query);  

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $filter);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); // $result sudah siap dipakai di sini
} else {
    // Penanganan jika prepare query gagal
    $result = false;
}
?>

<!DOCTYPE html>
<html lang="id">
  <?php 
    $pagetitle = "Form Pengajuan";
    $pageCSS = "pengajuan.css";
    $layoutCSS = "true";

    include 'includes/header.php'
  ?>
<body>

<div class="app-layout">

  <?php include 'includes/sidebar.php'; ?>

    <main class="main-area">

      <?php include 'includes/topbar.php' ?>

        <section class="content">
            <div class="form-container">

                <h1>Formulir Pengajuan Peminjaman Ruangan</h1>

                <form id="reservationForm" action="form-pengajuan_process.php" method="post">

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

                    </fieldset>

                    <label for="ruangan"><strong>Pilih Ruangan</strong></label><br>
                    <select id="ruangan" name="ruangan" required style="padding:8px; background:white; outline:none; border-radius:5px; border:1px solid #dedede; margin-bottom:16px; margin-top:8px;">
                        <option value="" disabled selected>-- Pilih Ruangan Tersedia --</option>
                        <?php if ($result): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <option value="<?= htmlspecialchars($row['kode_ruangan']); ?>">
                                    <?= htmlspecialchars($row['kode_ruangan']); ?>
                                </option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>

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
</body>
</html>
