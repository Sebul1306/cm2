<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "cm_db";

$conn = mysqli_connect($servername, $username_db, $password_db, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

session_start();

$username = $_SESSION['username'] ?? "Admin";

/* ===============================
   QUERY DATA DASHBOARD
=================================*/

$q1 = mysqli_query($conn,"SELECT COUNT(*) as total FROM customers");
$r1 = mysqli_fetch_assoc($q1);
$total_customers = $r1['total'] ?? 0;

$q2 = mysqli_query($conn,"SELECT COUNT(*) as total FROM produk");
$r2 = mysqli_fetch_assoc($q2);
$total_products = $r2['total'] ?? 0;

$q3 = mysqli_query($conn,"SELECT COUNT(*) as total FROM orders");
$r3 = mysqli_fetch_assoc($q3);
$total_orders = $r3['total'] ?? 0;

$q4 = mysqli_query($conn,"SELECT SUM(total_amount) as total FROM orders");
$r4 = mysqli_fetch_assoc($q4);
$total_revenue = $r4['total'] ?? 0;

$formatted_total_revenue = number_format($total_revenue,0,",",".");

$recent_orders = mysqli_query($conn,"
SELECT 
order_id,
customer_name,
order_date,
total_amount,
status
FROM orders
ORDER BY order_date DESC
LIMIT 5
");

/* ===============================
   DATA CHART
=================================*/

$sql = "
SELECT 
YEAR(order_date) AS year,
MONTH(order_date) AS month,
SUM(total_amount) AS total
FROM orders
GROUP BY YEAR(order_date), MONTH(order_date)
ORDER BY YEAR(order_date), MONTH(order_date)
";

$result = mysqli_query($conn,$sql);

$months = [
1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",5=>"Mei",6=>"Jun",
7=>"Jul",8=>"Agu",9=>"Sep",10=>"Okt",11=>"Nov",12=>"Des"
];

$data_chart = [];

while($row=mysqli_fetch_assoc($result)){
$data_chart[]=[
'label'=>$months[$row['month']]." ".$row['year'],
'value'=>$row['total']
];
}

$chart_json=json_encode($data_chart);

$date_today = date("l, d F Y");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Cuanki Mandala</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<link rel="shortcut icon" type="image/png" href="../assets/images/logo51.png" />

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



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

.menu-title{
color:#94a3b8;
font-size:12px;
padding:10px 15px;
margin-top:10px;
text-transform:uppercase;
}

.main{
margin-left:230px;
}

.topbar{
background:white;
padding:15px 30px;
display:flex;
justify-content:space-between;
align-items:center;
border-bottom:1px solid #ddd;
}

.logo{
font-weight:bold;
font-size:20px;
color:white;
text-align:center;
margin-bottom:25px;
}

.user-box{
display:flex;
align-items:center;
gap:10px;
}

.user-img{
width:35px;
height:35px;
border-radius:50%;
}

.card{
border:none;
border-radius:12px;
}

.content{
padding:30px;
}

</style>

</head>

<body>


<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">
🍜 Cuanki Mandala
</div>

<a href="dashboard.php"><i class="las la-home"></i> Dashboard</a>

<div class="menu-title">Transaksi</div>

<a href="penjualan.php">
<i class="las la-cash-register"></i> Penjualan
</a>

<a href="pembelian.php">
<i class="las la-shopping-cart"></i> Pembelian
</a>

<div class="menu-title">Data Master</div>

<a href="daftarmenu.php">
<i class="las la-list"></i> Daftar Menu
</a>

<a href="daftarmakanan.php">
<i class="las la-utensils"></i> Daftar Makanan
</a>

<a href="daftarminuman.php">
<i class="las la-coffee"></i> Daftar Minuman
</a>

</div>


<div class="main">


<!-- TOPBAR -->

<div class="topbar">

<div>
<h5 class="mb-0">Dashboard</h5>
</div>

<div>
<?php echo $date_today ?>
</div>

<div class="user-box">

<img src="../image/admin4.jpg" class="user-img">

<span><?php echo $username ?></span>

<a href="logout.php" class="btn btn-sm btn-danger">
<i class="las la-sign-out-alt"></i> Logout
</a>

</div>

</div>


<div class="content">


<!-- CARDS -->

<div class="row g-4">

<div class="col-md-3">

<div class="card shadow-sm">
<div class="card-body d-flex justify-content-between">

<div>
<h6>Customers</h6>
<h3><?php echo $total_customers; ?></h3>
</div>

<i class="las la-users la-3x text-primary"></i>

</div>
</div>

</div>


<div class="col-md-3">

<div class="card shadow-sm">
<div class="card-body d-flex justify-content-between">

<div>
<h6>Products</h6>
<h3><?php echo $total_products; ?></h3>
</div>

<i class="las la-box la-3x text-success"></i>

</div>
</div>

</div>


<div class="col-md-3">

<div class="card shadow-sm">
<div class="card-body d-flex justify-content-between">

<div>
<h6>Orders</h6>
<h3><?php echo $total_orders; ?></h3>
</div>

<i class="las la-shopping-bag la-3x text-warning"></i>

</div>
</div>

</div>


<div class="col-md-3">

<div class="card shadow-sm">
<div class="card-body d-flex justify-content-between">

<div>
<h6>Total Revenue</h6>
<h3>Rp <?php echo $formatted_total_revenue; ?></h3>
</div>

<i class="las la-wallet la-3x text-danger"></i>

</div>
</div>

</div>

</div>


<!-- RECENT ORDERS -->

<div class="card mt-5 shadow-sm">

<div class="card-body">

<h5 class="mb-4">Recent Orders</h5>

<table class="table table-striped">

<thead>
<tr>
<th>ID</th>
<th>Customer</th>
<th>Date</th>
<th>Total</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($recent_orders)){ ?>

<tr>

<td>#<?php echo $row['order_id'] ?></td>

<td><?php echo $row['customer_name'] ?></td>

<td><?php echo $row['order_date'] ?></td>

<td>Rp <?php echo number_format($row['total_amount'],0,",",".") ?></td>

<td>

<?php

$status=$row['status'];

if($status=="Pending"){
echo "<span class='badge bg-warning text-dark'>Pending</span>";
}
elseif($status=="processing"){
echo "<span class='badge bg-primary'>Processing</span>";
}
elseif($status=="Completed"){
echo "<span class='badge bg-success'>Completed</span>";
}
else{
echo "<span class='badge bg-secondary'>$status</span>";
}

?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>


<!-- CHART -->

<div class="card mt-5 shadow-sm">

<div class="card-body">

<h5 class="mb-4">Sales Trend by Month</h5>

<canvas id="chart"></canvas>

</div>

</div>


</div>

</div>


<script>

const salesData=<?php echo $chart_json;?>;

const labels=salesData.map(x=>x.label);
const values=salesData.map(x=>x.value);

new Chart(document.getElementById("chart"),{

type:"line",

data:{
labels:labels,
datasets:[{
label:"Revenue",
data:values,
borderColor:"#0d6efd",
backgroundColor:"rgba(13,110,253,0.2)",
fill:true,
tension:0.4
}]
}

});

</script>


</body>
</html>