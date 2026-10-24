<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /project_siruka/login.php");
    exit;
}

$conn = require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/database.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = "Email dan password wajib diisi!";
    header("Location: /project_siruka/login.php");
    exit;
}

$sql = "SELECT id, nama, email, password, role
        FROM user
        WHERE email = ?
        LIMIT 1";

$stmt = mysqli_prepare($conn, $sql);  

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            
            // Set session login
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['is_logged_in'] = true;

            // Redirect sukses ke beranda.php (disamakan dengan pengecekan di login.php)
            header("Location: /project_siruka/beranda.php"); 
            exit;

        } else {
            // Password salah
            $_SESSION['login_error'] = "Password salah!";
            header("Location: /project_siruka/login.php");
            exit;
        }
    } else {
        // Email tidak ditemukan
        $_SESSION['login_error'] = "Email tidak terdaftar!";
        header("Location: /project_siruka/login.php");
        exit;
    }
 
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['login_error'] = "Terjadi kesalahan pada sistem database.";
    header("Location: /project_siruka/login.php");
    exit;
}
?>