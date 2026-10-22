<!DOCTYPE html>
<html lang="id">
  <?php 
    $pagetitle = "Profile";
    $pageCSS = "profile.css";

    include 'includes/header.php'
  ?>
<body>

<div class="app-layout">

    <?php include 'includes/sidebar.php'; ?>

    <main class="main-area">
        <?php include 'includes/topbar.php' ?>

        <section class="content">
            <div class="profile-container">
                <h1>Profile</h1>

                <form id="profileForm">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" name="nim">
                    </div>

                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <input type="text" id="prodi" name="prodi">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="telepon">No Telpon</label>
                        <input type="text" id="telepon" name="telepon">
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-back">Kembali</button>
                        <button type="submit" class="btn-save">Konfirmasi</button>
                    </div>

                    <p id="formMessage"></p>
                </form>
            </div>
        </section>
    </main>

</div>

<script src="assets/js/profile.js"></script>
</body>
</html>