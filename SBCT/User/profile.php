<?php
    include('../indata/connect.php');
    include('../indata/commonFunction.php');
    session_start();
    // Check if user is logged in and email is not verified
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $select_query = "SELECT * FROM user_table WHERE username='$username'";
        $result = mysqli_query($con, $select_query);
        $row_data = mysqli_fetch_assoc($result);
        $email_status = $row_data['user_email_status'];

        if ($email_status == 'Not verified') {
			header("Location: verification.php");
            exit; // Stop executing the rest of the page if email is not verified
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Profile</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link rel="stylesheet" href="user-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top-nav-bar">
    <div class="search-box">
        <a href="../index.php"><img src="../images/logo-dark.jpg" class="logo" alt=""></a>
        <form class="d-flex justify-content-center" action="search-product.php" method="get">
            <input class="form-control" type="search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn custom-btn" name="search_data_product">
        </form>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        <?php
                if(!isset($_SESSION['username'])){
                    echo" <li class='nav-item'>
                        <span class='nav-link'>Welcome Guest</span>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='user_login.php'>Login</a>
                    </li>";
                }else{
                    echo"<li class='nav-item'>
                    <span class='nav-link'>Welcome ".$_SESSION['username']."</span>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout</a>
                </li>";
                }
            ?>
        </ul>
    </nav>
</div>
<?php
    if (!isset($_SESSION['username'])) {
        header("Location: user_login.php");
    } else {
?>
<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav text-center">
            <li class="nav-item" style="background:#E799A3;color:white;margin-top:50px;">
                <a class="nav-link" href="#" style="text-decoration: none;color:white;"><h4>Your profile</h4></a>
            </li>
            <li class="nav-item">
                <img src="../images/profile-pic.jpeg" alt="">
            </li>
            <li class="nav-item" style="background:#E799A3;color:white;">
                <a class="nav-link" href="profile.php?my-orders" style="text-decoration: none;color:white;">My Orders</a>
            </li>
            <li class="nav-item" style="background:#E799A3;color:white;">
                <a class="nav-link" href="profile.php?edit-account" style="text-decoration: none;color:white;">Edit Account</a>
            </li>
            <li class="nav-item" style="background:#E799A3;color:white;">
                <a class="nav-link" href="profile.php" style="text-decoration: none;color:white;">Pending Order</a>
            </li>
            <li class="nav-item" style="background:#E799A3;color:white;">
                <a class="nav-link" href="profile.php?delete-account" style="text-decoration: none;color:white;">Delete Account</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 text-center">
        <?php
            get_user_order_details();
            if(isset($_GET['edit-account'])){
                include('edit-account.php');
            }
            if(isset($_GET['my-orders'])){
                include('user-order.php');
            }
            if(isset($_GET['delete-account'])){
                include('delete-account.php');
            }
        ?>
    </div>
</div>
<?php } ?>
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
            <img src="../images/play-store.png" alt="">
            <img src="../images/app-store.png" alt="">
        </div>
    </div>
    <hr>
    <p class="copyright"><i class="fa fa-copyright"></i> FYP</p>
</div>
</section>
</body>
</html>
