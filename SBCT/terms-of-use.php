<?php
	include('indata/connect.php');
	include('indata/commonFunction.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Terms of Use</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top-nav-bar">
    <div class="search-box">
        <a href="index.php"><img src="images/logo-dark.jpg" class="logo"></a>
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
<section class="Useful-Links">
<div class="container">
        <h1>Terms of Use</h1>
        <p>Welcome to SBC, a pet ecommerce platform. These Terms of Use govern your access to and use of our website, services, and any related content. By using our platform, you agree to comply with these terms and conditions, as well as any additional guidelines or rules we may provide.</p>

        <h2>Acceptance of Terms</h2>
        <p>By accessing or using the SBC platform, you acknowledge that you have read, understood, and agree to be bound by these Terms of Use. If you do not agree to these terms, please refrain from using our platform.</p>

        <h2>Account Creation</h2>
        <p>To access certain features of our platform, you may need to create an account. You are responsible for maintaining the confidentiality of your account information and are fully responsible for all activities that occur under your account. You agree to provide accurate and complete information when creating an account and to notify us immediately of any unauthorized use or security breach.</p>

        <h2>Use of the Platform</h2>
        <h3>Eligibility</h3>
        <p>Our platform is intended for use by individuals who are at least 18 years old or the age of majority in their jurisdiction.</p>
        <h3>Prohibited Conduct</h3>
        <p>You agree not to engage in any activity that violates these Terms of Use or any applicable laws. This includes but is not limited to:</p>
        <ul>
            <li>Impersonating any person or entity.</li>
            <li>Interfering with or disrupting the platform or its services.</li>
            <li>Uploading, posting, or transmitting any content that is unlawful, harmful, or infringes upon the rights of others.</li>
            <li>Using our platform for any unauthorized commercial purposes.</li>
        </ul>
        <h3>Intellectual Property</h3>
        <p>All content on the SBC platform, including but not limited to text, images, logos, and trademarks, is the property of SBC or its licensors and is protected by intellectual property laws. You agree not to use, reproduce, or distribute any content from our platform without obtaining prior written permission from SBC.</p>

        <h2>Product Listings and Purchases</h2>
        <h3>Product Information</h3>
        <p>We strive to provide accurate and up-to-date information about the products available on our platform. However, we do not guarantee the accuracy, completeness, or reliability of any product descriptions or other content.</p>
        <h3>Pricing and Payment</h3>
        <p>All prices displayed on our platform are in the currency specified. We reserve the right to change prices, add or remove products, or modify any aspect of our services without prior notice. Payment for products must be made through the designated payment methods provided.</p>
        <h3>Shipping and Returns</h3>
        <p>Please review our separate Shipping Policy and Return Policy for detailed information on shipping fees, delivery times, and our return process.</p>

        <h2>Limitation of Liability</h2>
        <h3>Disclaimer</h3>
        <p>SBC provides its platform on an "as is" and "as available" basis. We make no warranties or representations, express or implied, regarding the availability, reliability, or accuracy of our platform or its content.</p>
        <h3>Indemnification</h3>
        <p>You agree to indemnify and hold SBC harmless from any claims, losses, damages, liabilities, or expenses arising out of your use of our platform or violation of these Terms of Use.</p>

        <h2>Governing Law and Dispute Resolution</h2>
        <p>These Terms of Use shall be governed by and construed in accordance with the laws of [Your Jurisdiction]. Any disputes arising from or related to these terms or your use of the SBC platform shall be resolved exclusively through binding arbitration in accordance with the rules of [Arbitration Institution].</p>

        <h2>Modifications</h2>
        <p>SBC reserves the right to modify or update these Terms of Use at any time. We will provide notice of any material changes via email.</p>
    </div>
</section>
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
			<img src="images/play-store.png">
			<img src="images/app-store.png">
		</div>
	</div>
	<hr>
	<p class="copyright"><i class="fa fa-copyright"></i> FYP</p>
</div>
</section>
</body>
</html>