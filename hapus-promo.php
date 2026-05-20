<?php
session_start();
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Opsional: Hapus file gambar dari server
    $res = $conn->query("SELECT gambar FROM promo WHERE id = $id");
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (!empty($row['gambar']) && file_exists($row['gambar'])) {
            unlink($row['gambar']);
        }
    }
    
    // Hapus dari database
    $stmt = $conn->prepare("DELETE FROM promo WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: admin-dashboard.php");
exit;
?>
