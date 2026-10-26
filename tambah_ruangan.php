<?php
session_start();
$pageTitle = "Tambah Ruangan";
$activePage = "tambah_ruangan";
$success = false;
$errors = [];
$room = ["nama" => "", "lokasi" => "", "status" => "Tersedia"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($room as $key => $value) {
        if (isset($_POST[$key])) {
            $room[$key] = trim((string) $_POST[$key]);
        }
    }

    if ($room["nama"] === "") {
        $errors[] = "Nama ruangan wajib diisi.";
    }
    if ($room["lokasi"] === "") {
        $errors[] = "Lokasi ruangan wajib diisi.";
    }

    // Jika lolos validasi, simpan ke database
    if (empty($errors)) {
        // Panggil koneksi database
        $conn = require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/database.php';

        // Query INSERT (kode_ruangan, lokasi, status_ruangan)
        $query = "INSERT INTO ruangan (kode_ruangan, lokasi, status_ruangan) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param(
                $stmt, 
                "sss", 
                $room["nama"], 
                $room["lokasi"], 
                $room["status"]
            );

            // Eksekusi query
            if (mysqli_stmt_execute($stmt)) {
                $success = true;
                // Reset form setelah berhasil
                $room = ["nama" => "", "lokasi" => "", "status" => "Tersedia"];
            } else {
                $errors[] = "Gagal menyimpan ke database: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            $errors[] = "Gagal mempersiapkan query: " . mysqli_error($conn);
        }
    }
}

function old_value($value) { 
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8"); 
}
?>

<!DOCTYPE html>
<html lang="id">
  <?php
  $pagetitle = "Tambah Ruangan";
  $pageCSS = "admin-pages.css";
  $layoutCSS = "true";
  include 'includes/header.php'; ?>
<body>  
<div class="app-layout">
    <?php include 'includes/sidebar.php' ?>

    <main class="main-area">
        <?php include 'includes/topbar.php' ?>

        <section class="panel form-panel" style="padding-left:22px;">
            <div class="panel-heading">
                <div>
                    <h1>Informasi Ruangan</h1>
                    <p>Lengkapi data ruangan pada formulir berikut.</p>
                </div>
            </div>

            <?php if ($success): ?>
                <div class="alert alert-success">Data ruangan berhasil disimpan ke database!</div>
            <?php endif; ?>

            <?php if ($errors): ?>
                <div class="alert alert-error">
                    <strong>Periksa kembali:</strong>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="tambah_ruangan.php" class="room-form">
                <div class="field">
                    <label for="nama">Nama ruangan <span>*</span></label>
                    <input id="nama" name="nama" value="<?= old_value($room['nama']) ?>" placeholder="Contoh: Ruang Rapat A" required>
                </div>
                
                <div class="field" style="margin-top:16px;">
                    <label for="lokasi">Lokasi ruangan <span>*</span></label>
                    <input id="lokasi" name="lokasi" value="<?= old_value($room['lokasi']) ?>" placeholder="Contoh: Gedung A, Lantai 2" required>
                </div>
               
                <div class="field" style="margin-top:16px;">
                    <label for="status">Status ruangan</label>
                    <select id="status" name="status">
                        <option value="Tersedia" <?= $room['status'] === 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                        <option value="Perawatan" <?= $room['status'] === 'Perawatan' ? 'selected' : '' ?>>Perawatan</option>
                    </select>
                </div>

                <div class="form-footer">
                    <span class="required-note"><span>*</span> Wajib diisi</span>
                    <div class="form-actions">
                        <button type="reset" class="btn btn-light">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan Ruangan <span aria-hidden="true">→</span></button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</div>
<script src="assets/js/admin.js"></script>
</body>
</html>