<?php
	include('../indata/connect.php');
    include('../indata/commonFunction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Payment </title>
	<link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- php code to access user id --->
<?php
    $user_ip=getIPAddress();
    $get_user="SELECT *FROM user_table WHERE user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
?>
<div class="top-nav-bar">
	<div class="search-box">
        <a href="../index.php"><img src="../images/logo-dark.jpg" class="logo" alt=""></a>
		<form class="d-flex justify-content-center" action="search-product.php" method="get">
        	<input class="form-control" type="search" aria-label="Search" name="search_data">
			<input type="submit" value="Search" class="btn custom-btn" name="search_data_product">
		</form>
    </div>
</div>
<div class="container">
	<h2 class="text-center" style="color: #00FF00;">Payment options</h2>
    <div class="row d-flex justify-content align-items-center my-5">
        <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../images/UPI.jpeg" alt=""></a>
        </div>
        <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>" style="text-decoration: none; color: black;"><h2>Pay offline</h2></a>
        </div>
    </div>
</div>
<!-------- footer -------->
<section class="footer">
<div class="container text-center">
	<div class="row">
		<div class="col-md-3">
			<h1>Useful Links</h1>
			<p><a href="../privacy-policy.php">Privacy Policy</a></p>
			<p><a href="../terms-of-use.php">Terms of Use</a></p>
			<p><a href="../return-policy.php">Return Policy</a></p>
			<p>Discount Coupons</p>
		</div>
		<div class="col-md-3">
			<h1>Company</h1>
			<p><a href="../about.php">About Us</a></p>
			<p><a href="../contactUs.php">Contact Us</a></p>
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