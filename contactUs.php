<?php
	include('indata/connect.php');
	include('indata/commonFunction.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>SBC | Help Desk</title>

    <title>SBC | Contact Us</title>
    <link rel="icon" type="image/jpg" href="images/logo-dark.jpg">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top-nav-bar">
    <div class="search-box">
        <a href="index.php"><img src="images/logo-dark.jpg" class="logo" alt=""></a>
		<form  class="d-flex justify-content-center" action="search-product.php" method="get">
        	<input class="form-control" type="search" aria-label="Search" name="search_data">
			<input type="submit" value="Search" class="btn custom-btn" name="search_data_product">
		</form>
    </div>
    <div class="menu-bar">
	<ul>
        <li><a href="cart.php"><sup><?php cart_items();?></sup><i class="fa fa-shopping-basket"></i>cart</a></li>
		<?php
				if(!isset($_SESSION['username'])){
					echo"<li><a href='User/user_registration.php'>Sign Up</a></li>
					<li><a href='User/user_login.php'>Log In</a></li>";
				}else{
					echo" <li><a href='User/profile.php'>My Account</a></li>
					<li><a href='User/logout.php'>Logout</a></li>";
				}
		?>
	</ul>
    </div>
</div>
<!-------- Contact Us -------->
<div class="container">
        <div class="contact">
            <div class="content">
                <h2>Contact Us</h2>
                <p>If you have any queries, please get in touch by filling out the contact form below.</p>
            </div>
            <div class="contact-container">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon"><i class="fa fa-map-marker"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>9 Woodlands Ave 9,<br>Singapore<br>738964</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>+65 9660 2364</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-envelope-o"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>dammyfyp@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                    <form action="https://formspree.io/f/mbjebbeo" method="POST">
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea required="required"></textarea>
                            <span>Type your message...</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
