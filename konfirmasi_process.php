<?php
session_start();
$conn = require_once $_SERVER['DOCUMENT_ROOT'] . '/project_siruka/config/database.php';

// Validasi akses login admin
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $decision = $_POST['decision'] ?? null; // 'disetujui' atau 'ditolak'
    $admin_id = $_SESSION['user_id']; // Mengambil ID admin yang sedang login

    if ($id && in_array($decision, ['disetujui', 'ditolak'])) {
        // Query UPDATE dengan menyertakan status_peminjaman, admin_id, dan updated_at
        $query = "UPDATE peminjaman SET status_peminjaman = ?, admin_id = ?, updated_at = NOW() WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            // Binding parameter: "sii" -> string (decision), integer (admin_id), integer (id)
            mysqli_stmt_bind_param($stmt, "sii", $decision, $admin_id, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

// Kembalikan ke halaman konfirmasi setelah diproses
header('Location: konfirmasi.php');
exit;