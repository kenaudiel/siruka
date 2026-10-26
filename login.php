<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/app.php';

if (isset($_SESSION['user_id'])) {
    header('Location: beranda.php');
    exit;
}

// Menangkap error dari session
$error = $_SESSION['login_error'] ?? null;
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="id">
  <?php 
    $pagetitle = "Login";
    $pageCSS = "login.css";

    include 'includes/header.php';
  ?>
<body>

    <main class="login-wrapper">
        <section class="login-container">

            <div class="left-content">
                <h1 style="font-size:64px; margin-bottom:8px; color:black">SIRUKA</h1>
                <p style="font-size:16px; color:black;">Sistem Reservasi Ruang Kampus<br>Terintegrasi.</p>
            </div>

            <div class="login-box">
                <!-- Tampilkan pesan error jika ada -->
                <?php if ($error): ?>
                    <p style="color: red; font-size: 14px; margin-bottom: 15px;"><?= htmlspecialchars($error); ?></p>
                <?php endif; ?>

                <form action="login_process.php" method="POST">
                    <div class="form-group">
                        <label for="email" style="color:black;">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password" style="color:black;">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn-login" style="margin-top:16px;">Sign in</button>
                </form>
            </div>

        </section>
    </main>

    <script src="assets/script.js"></script>
</body>
</html>