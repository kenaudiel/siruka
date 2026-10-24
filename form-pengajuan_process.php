<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /project_siruka/login.php");
    exit;
}

$conn = require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/database.php';

$member_id = $_SESSION['user_id'];
$agenda    = $_POST['agenda'];
$kategori  = $_POST['kategori'];
$ruangan   = $_POST['ruangan'];
$waktu     = $_POST['waktu'];

// 1. Ubah nama tabel ke 'peminjaman' dan pastikan kutip dua di akhir string lengkap
$query = "INSERT INTO peminjaman (member_id, ruangan_id, nama_kegiatan, kategori_kegiatan, waktu_peminjaman) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);  

if ($stmt) {

    mysqli_stmt_bind_param($stmt, "issss", $member_id, $ruangan, $agenda, $kategori, $waktu);
    
    // 3. Eksekusi query INSERT
    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil, arahkan ke beranda atau halaman riwayat peminjaman
        header("Location: /project_siruka/form-pengajuan.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
    }
    
    mysqli_stmt_close($stmt);
} else {
    echo "Terjadi kesalahan pada sistem database: " . mysqli_error($conn);
}
?>