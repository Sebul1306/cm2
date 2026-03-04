<?php

$conn = mysqli_connect("localhost","root","","cm_db");

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM menu WHERE id_menu='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$nama = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

mysqli_query($conn,"UPDATE menu SET
nama_menu='$nama',
kategori='$kategori',
harga='$harga',
stok='$stok'
WHERE id_menu='$id'
");

header("Location: daftarmenu.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Menu</title>

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

<h4 class="mb-4">Edit Menu</h4>

<form method="POST">

<div class="mb-3">
<label>Nama Menu</label>
<input type="text" name="nama_menu" class="form-control"
value="<?php echo $row['nama_menu']; ?>">
</div>

<div class="mb-3">
<label>Kategori</label>
<select name="kategori" class="form-control">

<option value="makanan"
<?php if($row['kategori']=="makanan") echo "selected"; ?>>
Makanan
</option>

<option value="minuman"
<?php if($row['kategori']=="minuman") echo "selected"; ?>>
Minuman
</option>

</select>
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control"
value="<?php echo $row['harga']; ?>">
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control"
value="<?php echo $row['stok']; ?>">
</div>

<button class="btn btn-success" name="update">
Update
</button>

<a href="daftarmenu.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>

</body>
</html>