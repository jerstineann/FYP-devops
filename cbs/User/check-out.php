<?php
	include('../indata/connect.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Check Out</title>
	<link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link rel="stylesheet" href="user-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
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
						<a class='nav-link' href='#'>Welcome Guest</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='user_login.php'>Login</a>
					</li>";
				}else{
					echo"<li class='nav-item'>
					<a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
				</li> 
				<li class='nav-item'>
					<a class='nav-link' href='logout.php'>Logout</a>
				</li>";
				}
			?>
	    </ul>
    </nav>
</div>
<div class="small-container cart-page">
			<?php
				if(isset($SESSION['username'])){
					include('payment.php');
				}else{
					include('user_login.php');
				}
			?>
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
			<img src="../images/app-store.png" alr="">
		</div>
	</div>
	<hr>
	<p class="copyright"><i class="fa fa-copyright"></i> FYP</p>
</div>
</section>
</body>
</html>