<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/app.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
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
