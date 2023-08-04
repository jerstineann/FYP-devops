<?php
    include('indata/connect.php');
    include('indata/commonFunction.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Cart</title>
    <link rel="icon" type="image/jpg" href="images/logo-dark.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
    <style>
        .button-cart {
            background-color: transparent;
            border: none;
            color: #00BFFF;
            font-weight: bold;
            outline: none;
        }

        .button-cart:hover {
            color: #C65C81;
            cursor: pointer;
        }
    </style>

    <div class="top-nav-bar">
        <div class="search-box">
            <a href="index.php"><img src="images/logo-dark.jpg" class="logo" alt=""></a>
            <form class="d-flex justify-content-center" action="search-product.php" method="get">
                <input class="form-control" type="search" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn custom-btn" name="search_data_product">
            </form>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='User/user_login.php'>Login</a>
                        </li>";
                } else {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='User/logout.php'>Logout</a>
                        </li>";
                }
                ?>
            </ul>
        </nav>
    </div>

    <!-------- cart items details -------->
    <div class="small-container cart-page">
        <form action="" method="post">
            <?php
            $get_ip = getIPAddress();
            $subtotal_price = 0;
            $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count > 0) {
                echo "<table class='table'>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>";
                while ($row = mysqli_fetch_array($result)) {
                    $product_id = $row['product_id'];
                    $select_products = "SELECT * FROM product WHERE product_id=$product_id";
                    $result_product = mysqli_query($con, $select_products);
                    while ($row_product_price = mysqli_fetch_array($result_product)) {
                        $product_price = array($row_product_price['product_price']);
                        $price = $row_product_price['product_price'];
                        $product_title = $row_product_price['product_title'];
                        $product_image = $row_product_price['product_image'];
                        $quantities = $row['quantity'];
                        $product_value = array_sum($product_price);
                        $subtotal_price = $product_value * $quantities;
                        echo "<tr>
                                <td>
                                    <div class='cart-info'>
                                        <img src='Admin/product_images/$product_image' alt='Product Image'>
                                        <div class='cart-details'>
                                            <p class='product-name'>$product_title</p>
                                            <small class='product-price'>Price: $$price</small>
                                            <br>
                                            <input type='submit' value='Remove' class='button-cart' name='remove_cart'>
                                            <input type='submit' value='Update cart' class='button-cart' name='update_cart'>
                                        </div>
                                    </div>
                                </td>
                                <td><input type='number' class='quantity' name='qty' value='$quantities'></td>";
                        $get_ip = getIPAddress();
                        if (isset($_POST['update_cart'])) {
                            $quantities = $_POST['qty'];
                            $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip'";
                            $result_query = mysqli_query($con, $update_cart);
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                        if (isset($_POST['remove_cart'])) {
                            $product_id = $row['product_id'];
                            $delete_cart = "DELETE FROM cart_details WHERE ip_address='$get_ip' AND product_id=$product_id";
                            $run_delete = mysqli_query($con, $delete_cart);
                            if ($run_delete) {
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                        echo "<td>$$subtotal_price</td>
                            </tr>";
                    }
                }
                echo "</tbody>
                    </table>";
            ?>
            <div class="total-price">
                <?php total_cart_price(); ?>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button class="btn custom-btn mr-2"><a href="product.php" style="text-decoration: none; color: white;">Continue shopping</a></button>
                <button class="btn custom-btn"><a href="User/check-out.php" style="text-decoration: none; color: white;">Check out</a></button>
            </div>
        </form>
        <?php
            } else {
                echo "<h2 class='text-center text-danger'>Cart is empty</h2>
                        <div class='d-flex justify-content-end mt-4'>
                            <button class='px-3 py-2 border-0 mx-3' style='background-color: #00BFFF; color: white;'><a href='product.php' class='mr-2' style='text-decoration: none; color: white;'>Continue shopping</a></button>
                        </div>";
            }
        ?>
    </div>

    <!-------- footer -------->
    <section class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3">
                    <h1>Useful Links</h1>
                    <p><a href="privacy-policy.php">Privacy Policy</a></p>
                    <p><a href="terms-of-use.php">Terms of Use</a></p>
                    <p><a href="return-policy.php">Return Policy</a></p>
                    <p>Discount Coupons</p>
                </div>
                <div class="col-md-3">
                    <h1>Company</h1>
                    <p><a href="about.php">About Us</a></p>
                    <p><a href="contactUs.php">Contact Us</a></p>
                    <p>Career</p>
                    <p>Affiliate</p>
                </div>
                <div class="col-md-3">
                    <h1>Follow us On</h1>
                    <p><i class="fa fa-facebook-official"></i> Facebook</p>
                    <p><i class="fa fa-youtube-play"></i> YouTube</p>
                    <p><i class="fa fa-twitter-square"></i> Twitter</p>
                    <p><i class="fa fa-instagram"></i> Instagram</p>
                </div>
                <div class="col-md-3 footer-image">
                    <h1>Download App</h1>
                    <img src="images/play-store.png" alt="">
                    <img src="images/app-store.png" alt="">
                </div>
            </div>
            <hr>
            <p class="copyright"><i class="fa fa-copyright"></i> FYP</p>
        </div>
    </section>
</body>
</html>
