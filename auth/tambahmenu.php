<?php

$conn = mysqli_connect("localhost","root","","cm_db");

if(isset($_POST['simpan'])){

$nama = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

mysqli_query($conn,"INSERT INTO menu 
(nama_menu,kategori,harga,stok)
VALUES
('$nama','$kategori','$harga','$stok')
");

header("Location: daftarmenu.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
}

.container{
margin-top:60px;
max-width:500px;
}

.card{
border-radius:12px;
}

</style>

</head>

<body>

<div class="container">

<div class="card shadow">

<div class="card-body">

<h4 class="mb-4">Tambah Menu</h4>

<form method="POST">

<div class="mb-3">
<label>Nama Menu</label>
<input type="text" name="nama_menu" class="form-control" required>
</div>

<div class="mb-3">
<label>Kategori</label>
<select name="kategori" class="form-control">
<option value="makanan">Makanan</option>
<option value="minuman">Minuman</option>
</select>
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control" required>
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control" required>
</div>

<button class="btn btn-primary" name="simpan">
Simpan
</button>

<a href="daftarmenu.php" class="btn btn-secondary">
Kembali

<td>

<a href="editmenu.php?id=<?php echo $row['id_menu']; ?>" 
class="btn btn-sm btn-warning">

Edit

</a>

<a href="hapusmenu.php?id=<?php echo $row['id_menu']; ?>" 
class="btn btn-sm btn-danger"
onclick="return confirm('Yakin ingin menghapus menu ini?')">

Hapus

</a>

</td>
</a>

</form>

</div>

</div>

</div>

</body>
</html>