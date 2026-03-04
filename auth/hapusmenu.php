<?php

$conn = mysqli_connect("localhost","root","","cm_db");

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM menu WHERE id_menu='$id'");

header("Location: daftarmenu.php");

?>