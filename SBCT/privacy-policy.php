<?php
	include('indata/connect.php');
	include('indata/commonFunction.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Private Policy</title>
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
        <div class="row">
            <div class="col-md-12">
                <h2>Privacy Policy</h2>
                <p>Thank you for choosing [Your Company/Website Name] for all your pet-related needs. This Privacy Policy outlines how we collect, use, store, and protect your personal information when you visit and use our pet ecommerce website. By accessing or using our website, you agree to the terms of this Privacy Policy.</p>
                
                <h3>Information We Collect</h3>
                <ol>
                    <li>
                        <strong>Personal Information:</strong> We may collect personal information such as your name, email address, mailing address, phone number, payment information, or any other information you voluntarily provide to us during the ordering or registration process.
                    </li>
                    <li>
                        <strong>Order Information:</strong> We collect information related to your orders, including the products purchased, order history, and delivery details.
                    </li>
                    <li>
                        <strong>Website Usage Information:</strong> We gather information about your interactions with our website, such as pages visited, search queries, referring/exit pages, and other statistics. This information helps us improve our website and enhance your shopping experience.
                    </li>
                    <li>
                        <strong>Cookies:</strong> We use cookies and similar technologies to personalize your browsing experience, remember your preferences, and collect information about how you use our website. You can manage your cookie preferences through your browser settings.
                    </li>
                </ol>

                <h3>Use of Information</h3>
                <p>We may use your personal information to:</p>
                <ul>
                    <li>Process and fulfill your orders</li>
                    <li>Communicate with you regarding your orders, inquiries, or customer support</li>
                    <li>Send you important notifications, such as order updates or account information</li>
                    <li>Provide personalized product recommendations or promotional offers</li>
                    <li>Improve our website, products, and services</li>
                    <li>Detect and prevent fraud or unauthorized activities</li>
                </ul>

                <p>We will only use your personal information for the purposes stated in this Privacy Policy or with your consent.</p>

                <h3>Data Sharing and Disclosure</h3>
                <p>We may share your personal information with third parties in the following situations:</p>
                <ul>
                    <li>With service providers who assist us in operating our website, processing payments, or delivering orders</li>
                    <li>To comply with legal obligations, such as responding to lawful requests or court orders</li>
                    <li>In the event of a merger, acquisition, or sale of all or a portion of our assets</li>
                </ul>
                <p>We will not sell, rent, or lease your personal information to third parties without your consent.</p>

                <h3>Data Security</h3>
                <p>We implement reasonable measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction. However, please be aware that no data transmission over the internet or electronic storage method is 100% secure. While we strive to protect your personal information, we cannot guarantee its absolute security. By providing your personal information, you acknowledge and accept any associated risks.</p>

                <h3>Third-Party Links</h3>
                <p>Our website may contain links to third-party websites or services that are not controlled or operated by us. We are not responsible for the privacy practices or content of those websites. We encourage you to review the privacy policies of any third-party websites you visit.</p>

                <h3>Children's Privacy</h3>
                <p>Our website is intended for individuals of all ages, including children with parental consent. However, we do not knowingly collect personal information from children without the consent of a parent or guardian. If you believe we have inadvertently collected personal information from a child, please contact us immediately.</p>

                <h3>Changes to this Privacy Policy</h3>
                <p>We reserve the right to modify or update this Privacy Policy from time to time. We will notify you of any changes by posting the revised Privacy Policy on our website. Your continued use of our website constitutes your acceptance of the updated Privacy Policy.</p>
            </div>
        </div>
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