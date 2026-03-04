<?php

$conn = mysqli_connect("localhost","root","","cm_db");

/* =========================
TAMBAH MENU
========================= */

if(isset($_POST['tambah'])){

$nama=$_POST['nama_menu'];
$kategori=$_POST['kategori'];
$harga=$_POST['harga'];
$stok=$_POST['stok'];

mysqli_query($conn,"INSERT INTO menu
(nama_menu,kategori,harga,stok)
VALUES
('$nama','$kategori','$harga','$stok')");

header("Location: daftarmenu.php");
}


/* =========================
EDIT MENU
========================= */

if(isset($_POST['edit'])){

$id=$_POST['id_menu'];
$nama=$_POST['nama_menu'];
$kategori=$_POST['kategori'];
$harga=$_POST['harga'];
$stok=$_POST['stok'];

mysqli_query($conn,"UPDATE menu SET
nama_menu='$nama',
kategori='$kategori',
harga='$harga',
stok='$stok'
WHERE id_menu='$id'");

header("Location: daftarmenu.php");

}


/* =========================
HAPUS MENU
========================= */

if(isset($_GET['hapus'])){

$id=$_GET['hapus'];

mysqli_query($conn,"DELETE FROM menu WHERE id_menu='$id'");

header("Location: daftarmenu.php");

}


$data=mysqli_query($conn,"SELECT * FROM menu");

?>

<!DOCTYPE html>
<html>
<head>

<title>Daftar Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../assets/images/logo51.png" />

<style>

body{
background:#f4f6f9;
font-family:sans-serif;
}

.sidebar{
width:230px;
height:100vh;
position:fixed;
background:#1e293b;
padding-top:20px;
}

.sidebar a{
color:white;
display:block;
padding:14px;
text-decoration:none;
}

.sidebar a:hover{
background:#334155;
}

.main{
margin-left:230px;
padding:30px;
}

.logo{
font-weight:bold;
font-size:20px;
color:white;
text-align:center;
margin-bottom:25px;
}

.card{
border:none;
border-radius:12px;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">
🍜 Cuanki Mandala
</div>

<a href="dashboard.php">Dashboard</a>
<a href="daftarmenu.php">Daftar Menu</a>

</div>


<div class="main">

<h4 class="mb-4">Data Master - Daftar Menu</h4>

<div class="card shadow">

<div class="card-body">


<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
+ Tambah Menu
</button>


<table class="table table-striped">

<thead>
<tr>

<th>ID</th>
<th>Nama Menu</th>
<th>Kategori</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>

</tr>
</thead>


<tbody>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?php echo $row['id_menu']; ?></td>

<td><?php echo $row['nama_menu']; ?></td>

<td>

<?php

if($row['kategori']=="makanan"){
echo "<span class='badge bg-success'>Makanan</span>";
}else{
echo "<span class='badge bg-info'>Minuman</span>";
}

?>

</td>

<td>
Rp <?php echo number_format($row['harga'],0,",","."); ?>
</td>

<td><?php echo $row['stok']; ?></td>


<td>

<button 
class="btn btn-warning btn-sm"
data-bs-toggle="modal"
data-bs-target="#editModal<?php echo $row['id_menu']; ?>">

Edit

</button>


<a href="?hapus=<?php echo $row['id_menu']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus menu ini?')">

Hapus

</a>

</td>

</tr>


<!-- MODAL EDIT -->

<div class="modal fade" id="editModal<?php echo $row['id_menu']; ?>">

<div class="modal-dialog">
<div class="modal-content">

<form method="POST">

<div class="modal-header">
<h5>Edit Menu</h5>
</div>

<div class="modal-body">

<input type="hidden" name="id_menu"
value="<?php echo $row['id_menu']; ?>">

<input type="text"
name="nama_menu"
class="form-control mb-2"
value="<?php echo $row['nama_menu']; ?>"
required>

<select name="kategori" class="form-control mb-2">

<option value="makanan">Makanan</option>
<option value="minuman">Minuman</option>

</select>

<input type="number"
name="harga"
class="form-control mb-2"
value="<?php echo $row['harga']; ?>"
required>

<input type="number"
name="stok"
class="form-control"
value="<?php echo $row['stok']; ?>"
required>

</div>

<div class="modal-footer">

<button class="btn btn-success" name="edit">
Update
</button>

</div>

</form>

</div>
</div>

</div>

<?php } ?>

</tbody>

</table>

</div>
</div>

</div>


<!-- MODAL TAMBAH -->

<div class="modal fade" id="tambahModal">

<div class="modal-dialog">
<div class="modal-content">

<form method="POST">

<div class="modal-header">
<h5>Tambah Menu</h5>
</div>

<div class="modal-body">

<input type="text"
name="nama_menu"
class="form-control mb-2"
placeholder="Nama Menu"
required>

<select name="kategori" class="form-control mb-2">

<option value="makanan">Makanan</option>
<option value="minuman">Minuman</option>

</select>

<input type="number"
name="harga"
class="form-control mb-2"
placeholder="Harga"
required>

<input type="number"
name="stok"
class="form-control"
placeholder="Stok"
required>

</div>

<div class="modal-footer">

<button class="btn btn-primary" name="tambah">
Simpan
</button>

</div>

</form>

</div>
</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>