<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/app.php';
$servername = "localhost";
$database = "dbsiruka";
$username = "root";
$password = "";
try {
        $conn = mysqli_connect($servername, $username, $password, $database);;
    } catch (mysqli_sql_exception $e) {
            header('Location: ' . $baseurl . '/config/error.php');
            exit;   
}

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

return $conn;
?>