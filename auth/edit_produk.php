<?php
include 'config.php'; // Sambungkan ke database

// Ambil ID produk dari URL
$product_id= $_GET['Kd_Barang'];
 // Pastikan ID produk ada dalam URL

// Query untuk mengambil data produk berdasarkan ID
$query = "SELECT * FROM Produk WHERE Kd_Barang = '$product_id'"; 
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>bersihkoe Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <a href="#" class="logo"><i class="fas-fa-untensils">
            <img src="image/BEE-70171-48b38c43-ae88-4bd2-b11e-bdcc561d807d-removebg-preview.png" alt=""> </i>
        </a>
        <div class="sidebar-menu">
            <ul>
                <li><a href="dashboard.html"><span class="las la-igloo"></span><span>Dashboard</span></a></li>
                <li><a href="Customer.html"><span class="las la-users"></span><span>Customers</span></a></li>
                <li><a href="orders.html"><span class="las la-clipboard-list"></span><span>Orders Management</span></a></li>
                <li><a href="Product_Item.php" class="active"><span class="las la-receipt"></span><span>Product Item</span></a></li>
                <li><a href=""><span class="las la-clipboard-list"></span><span>Reports & Insights</span></a></li>
                <li class="Logout"><a href="home.html"><span class="las la-sign-out-alt"></span><span>Logout</span></a></li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle"><span class="las la-bars"></span></label>
                Product Item
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

        <!-- Edit Product Form -->
        <div class="edit-product-form">
            <h2>Edit Product</h2>

            <!-- Form untuk edit produk -->
            <form method="POST" action="update_produk.php" enctype="multipart/form-data">
                <!-- Input untuk nama produk -->
                <div class="input-field">
                    <label for="product-name">Product Name</label>
                    <input type="text" id="product-name" name="product_name" value="<?php echo $product['Nm_Barang']; ?>" required>
                </div>

                <!-- Input untuk kategori produk -->
                <div class="input-field">
                    <label for="product-category">Category</label>
                    <select name="category" id="product-category" required>
                        <option value="soap" <?php echo ($product['Kategori_Barang'] == 'soap') ? 'selected' : ''; ?>>Soap</option>
                        <option value="shampoo" <?php echo ($product['Kategori_Barang'] == 'shampoo') ? 'selected' : ''; ?>>Shampoo</option>
                    </select>
                </div>

                <!-- Input untuk harga produk -->
                <div class="input-field">
                    <label for="product-price">Price</label>
                    <input type="number" id="product-price" name="price" value="<?php echo $product['Hrg_Satuan']; ?>" required>
                </div>

                <!-- Input untuk gambar produk -->
                <div class="input-field">
                    <label for="product-image">Product Image</label>
                    <input type="file" id="product-image" name="image">
                    <img src="image/<?php echo $product['Gambar_Barang']; ?>" alt="<?php echo $product['Gambar_Barang']; ?>" width="100px">
                </div>

                <!-- Tombol submit -->
                <div class="input-field">
                    <button type="submit">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

