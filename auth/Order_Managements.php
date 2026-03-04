<?php
include 'config.php'; // Sambungkan ke database

$query = "SELECT * FROM orders"; // Ambil semua data dari tabel orders
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>bersihkoe Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <a href="#" class="logo"><i class="fas-fa-untensils">
            <img src="image/BEE-70171-48b38c43-ae88-4bd2-b11e-bdcc561d807d-removebg-preview.png" alt=""> </i>
        </a>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard.html"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="Customer.html"><span class="las la-users"></span><span>Customers</span></a>
                </li>
                <li>
                    <a href="Order_Managements.php" class="active"><span class="las la-clipboard-list"></span>
                    <span>Order Management</span></a>
                </li>
                <li>
                    <a href="Product_Item.php"><span class="las la-receipt"></span><span>Product Item</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span><span>Reports & Insights</span></a>
                </li>
                <li class="Logout">
                    <a href="login_form.php"><span class="las la-sign-out-alt"></span><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle"><span class="las la-bars"></span></label>
                Orders Management
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search orders">
            </div>

            <div class="user-wrapper">
                <img src="image/download (3).jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>John Doe</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>

        <div class="orders-table">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Shipping Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['shipping_address']; ?></td>
                        <td>
                            <select name="order_status" id="order-status-<?php echo $row['order_id']; ?>">
                                <option value="pending" <?php if($row['status'] == 'pending') echo 'selected'; ?>>Belum Diproses</option>
                                <option value="processing" <?php if($row['status'] == 'processing') echo 'selected'; ?>>Diproses</option>
                                <option value="shipped" <?php if($row['status'] == 'shipped') echo 'selected'; ?>>Dikirim</option>
                                <option value="completed" <?php if($row['status'] == 'completed') echo 'selected'; ?>>Selesai</option>
                            </select>
                        </td>
                        <td>
                            <button onclick="processOrder(<?php echo $row['order_id']; ?>)">Process</button>
                            <button onclick="cancelOrder(<?php echo $row['order_id']; ?>)">Cancel</button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function processOrder(orderId) {
            // Aksi untuk memproses pesanan
            alert('Memproses pesanan ID ' + orderId);
        }

        function cancelOrder(orderId) {
            // Aksi untuk membatalkan pesanan
            alert('Membatalkan pesanan ID ' + orderId);
        }
    </script>
</body>
</html>