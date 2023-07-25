<?php
	include('indata/connect.php');
	include('indata/commonFunction.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Return Policy</title>
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
<h2>Return Policy</h2>
<p>At SBC, we want you and your pet to be completely satisfied with your purchase. If for any reason you are not satisfied with your order, you may return the item(s) within [X] days of delivery, subject to the following conditions:</p>

<h3>1. Eligibility</h3>
<p>To be eligible for a return, the item(s) must be unused, in the same condition as received, and in the original packaging. Items that are damaged, used, or not in their original packaging may not be eligible for a refund or exchange.</p>

<h3>2. Return Process</h3>
<p>If you would like to return an item, please follow these steps:</p>
<ul>
  <li>Contact our customer service team at [email protected] or call [phone number] to initiate the return process.</li>
  <li>Provide your order number, the item(s) you wish to return, and the reason for the return.</li>
  <li>Our customer service team will guide you through the return process and provide you with a return shipping label if applicable.</li>
  <li>Carefully package the item(s) in the original packaging or a suitable alternative to prevent damage during transit.</li>
  <li>Ship the item(s) back to us using the provided return shipping label or a traceable shipping method of your choice.</li>
</ul>

<h3>3. Refunds</h3>
<p>Once we receive and inspect the returned item(s), we will notify you of the status of your refund. If the returned item(s) meet the eligibility criteria, a refund will be processed to the original payment method within [X] business days.</p>

<h3>4. Exchanges</h3>
<p>If you would like to exchange an item for a different size, color, or variant, please follow the return process outlined above and specify your exchange request when contacting our customer service team. Exchanges are subject to product availability.</p>

<h3>5. Non-Refundable Items</h3>
<p>The following items are non-refundable:</p>
<ul>
  <li>Opened or used pet food, treats, or supplements.</li>
  <li>Items purchased during clearance or sale events.</li>
  <li>Personalized or custom-made items.</li>
</ul>

<h3>6. Return Shipping Costs</h3>
<p>Return shipping costs may be the responsibility of the customer, unless the return is due to an error on our part or a defective item. In such cases, we will provide a prepaid return shipping label.</p>

<h3>7. Damaged or Defective Items</h3>
<p>If you receive a damaged or defective item, please contact our customer service team immediately. We will guide you through the return process and arrange for a replacement or refund.</p>

<p>For further information or assistance regarding our return policy, please contact our customer service team at [email protected] or call [phone number].</p>
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