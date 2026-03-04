<?php 
if(isset($_POST['simpan'])) {
    // Ambil data dari form
    $Nm_Barang = $_POST['Nm_Barang'];
    $Kategori_Barang = $_POST['Kategori_Barang']; 
    $Hrg_Satuan = $_POST['Hrg_Satuan']; 
    $Kd_Barang = $_POST['Kd_Barang'];

    // Menghandle upload gambar
    if ($_FILES['Gambar_Barang']['name']) {
        $Gambar_Barang = $_FILES['Gambar_Barang']['name'];
        $upload_dir = "uploads/";  // Folder tempat menyimpan gambar
        $target_file = $upload_dir . basename($Gambar_Barang);
        move_uploaded_file($_FILES['Gambar_Barang']['tmp_name'], $target_file);
    } else {
        // Jika tidak ada file baru, gunakan gambar yang lama
        $Gambar_Barang = $_POST['Gambar_Barang'];
    }

    // Periksa koneksi
    if (!$config) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk update data
    $query = "UPDATE roduk 
              SET Nm_Barang = '$Nm_Barang', 
                  Kategori_Barang = '$Kategori_Barang', 
                  Hrg_Satuan = '$Hrg_Satuan', 
                  Gambar_Barang = '$Gambar_Barang' 
              WHERE Kd_Barang = '$Kd_Barang'";

    // Tampilkan query untuk debugging
    echo "Query yang dijalankan: $query";

    // Eksekusi query
    if (mysqli_query($config, $query)) {
        // Redirect setelah update untuk menghindari pengiriman ulang form
        header("Location: Product_Item.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($config);  // Menampilkan error dari MySQL
    }
}  // Pastikan kurung tutup di sini untuk menutup blok if
?>