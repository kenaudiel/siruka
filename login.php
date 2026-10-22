<!DOCTYPE html>
<html lang="id">
  <?php 
    $pagetitle = "Beranda - Siruka";
    $pageCSS = "beranda.css";

    include 'includes/header.php'
  ?>
<body>

    <main class="login-wrapper">
        <section class="login-container">
            
            <div class="overlay"></div>

            <div class="left-content">
                <h1>SIRUKA</h1>
                <p>Sistem Reservasi Ruang Kampus<br>Terintegrasi.</p>
            </div>

            <div class="login-box">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>

                    <div class="forgot-password">
                        <a href="#">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn-login">Sign in</button>
                </form>
            </div>

        </section>
    </main>

    <script src="assets/script.js"></script>
</body>
</html>