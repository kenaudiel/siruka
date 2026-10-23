<?php
$pageTitle = "Tambah Ruangan";
$activePage = "tambah_ruangan";
$success = false;
$errors = [];
$room = ["nama" => "", "lokasi" => "", "kapasitas" => "", "fasilitas" => "", "deskripsi" => "", "status" => "Tersedia"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($room as $key => $value) {
        if (isset($_POST[$key])) $room[$key] = trim((string) $_POST[$key]);
    }
    if ($room["nama"] === "") $errors[] = "Nama ruangan wajib diisi.";
    if ($room["lokasi"] === "") $errors[] = "Lokasi ruangan wajib diisi.";
    if ($room["kapasitas"] === "" || filter_var($room["kapasitas"], FILTER_VALIDATE_INT) === false || (int)$room["kapasitas"] < 1) {
        $errors[] = "Kapasitas harus berupa angka minimal 1.";
    }
    if (!$errors) {
        // TODO: Simpan ke database setelah koneksi database tersedia.
        $success = true;
        $room = ["nama" => "", "lokasi" => "", "kapasitas" => "", "fasilitas" => "", "deskripsi" => "", "status" => "Tersedia"];
    }
}
function old_value($value) { return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8"); }
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

        <section class="panel form-panel">
            <div class="panel-heading"><div><h2>Informasi Ruangan</h2><p>Lengkapi data ruangan pada formulir berikut.</p></div></div>
            <?php if ($success): ?><div class="alert alert-success">Validasi berhasil. Formulir siap dihubungkan ke database untuk menyimpan ruangan.</div><?php endif; ?>
            <?php if ($errors): ?><div class="alert alert-error"><strong>Periksa kembali:</strong><ul><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>

            <form method="post" action="tambah_ruangan.php" class="room-form">
                <div class="form-grid">
                    <div class="field"><label for="nama">Nama ruangan <span>*</span></label><input id="nama" name="nama" value="<?= old_value($room['nama']) ?>" placeholder="Contoh: Ruang Rapat A" required></div>
                    <div class="field"><label for="lokasi">Lokasi ruangan <span>*</span></label><input id="lokasi" name="lokasi" value="<?= old_value($room['lokasi']) ?>" placeholder="Contoh: Gedung A, Lantai 2" required></div>
                    <div class="field"><label for="kapasitas">Kapasitas orang <span>*</span></label><input id="kapasitas" name="kapasitas" type="number" min="1" value="<?= old_value($room['kapasitas']) ?>" placeholder="Contoh: 30" required></div>
                    <div class="field"><label for="status">Status ruangan</label><select id="status" name="status"><option <?= $room['status'] === 'Tersedia' ? 'selected' : '' ?>>Tersedia</option><option <?= $room['status'] === 'Perawatan' ? 'selected' : '' ?>>Perawatan</option></select></div>
                    <div class="field field-full"><label for="fasilitas">Fasilitas</label><input id="fasilitas" name="fasilitas" value="<?= old_value($room['fasilitas']) ?>" placeholder="Contoh: Proyektor, AC, papan tulis"></div>
                    <div class="field field-full"><label for="deskripsi">Deskripsi / catatan</label><textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Tambahkan informasi lain tentang ruangan..."><?= old_value($room['deskripsi']) ?></textarea></div>
                </div>
                <div class="form-footer"><span class="required-note"><span>*</span> Wajib diisi</span><div class="form-actions"><button type="reset" class="btn btn-light">Reset</button><button type="submit" class="btn btn-primary">Simpan Ruangan <span aria-hidden="true">→</span></button></div></div>
            </form>
        </section>
    </main>
</div>
<script src="assets/js/admin.js"></script>
</body>
</html>
