<?php
include 'config.php'; // Sambungkan ke database

if (isset($_GET['Kd_Barang'])) {
    $Kd_Barang = $_GET['Kd_Barang'];

    // Hapus produk berdasarkan Kd_Barang
    $query = "DELETE FROM Produk WHERE Kd_Barang = '$Kd_Barang'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Produk berhasil dihapus!'); window.location.href='product_item.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus produk.'); window.location.href='product_item.php';</script>";
    }
}
?>