<?php
	include('indata/connect.php');
	include('indata/commonFunction.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Pet Ecommerce Website</title>
	<link rel="icon" type="image/jpg" href="images/logo-dark.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="top-nav-bar">
	<div class="search-box">
        <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
        <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
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
<section class="header">
<div class="side-menu" id="side-menu">
		<ul>
			<li>On Sale<i class="fa fa-angle-right"></i>
				<ul>
					<li><a href="product.php?onSales=1"style="color: #00FF00">Accessory</a></li>
					<li><a href="product.php?onSales=2"style="color: #00FF00">Beds</a></li>
					<li><a href="product.php?onSales=3"style="color: #00FF00">Clothing</a></li>
					<li><a href="product.php?onSales=4"style="color: #00FF00">Food</a></li>
					<li><a href="product.php?onSales=5"style="color: #00FF00">Toys</a></li>
				</ul>
        	</li>
			<?php
				getCategories();
			?>
			<li>Brands<i class="fa fa-angle-right"></i>
				<?php
					getBrands();
				?>
            </li>
		</ul>
	</div>
</section>
    <div class="slider">
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
  			<div class="carousel-inner">
    			<div class="carousel-item active">
      				<img src="images/image-1.jpg" class="d-block w-100">
    			</div>
    			<div class="carousel-item">
      				<img src="images/image-2.jpg" class="d-block w-100">
    			</div>
    			<div class="carousel-item">
      				<img src="images/image-3.png" class="d-block w-100">
    			</div>
  			</div>
		</div>
</div>
<!----- featured categories -------->
<section class="featured-categories">
<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="images/category-1.jpg">
			</div>
			<div class="col-md-4">
				<img src="images/category-2.jpg">
			</div>
			<div class="col-md-4">
				<img src="images/category-3.jpg">
			</div>
		</div>
</div>
</section>
<!----- on sale products -------->
<section class="on-sale">
<div class="container">
	<div class="title-box">
		<h2>On Sale</h2>
	</div>
	<div class="row">
			<?php
				getsaleProducts();		
			?>
	</div>
</div>
</section>
<!----- New products -------->
<section class="new-products">
<div class="container">
	<ul class="nav nav-tabs">
  		<li class="nav-item">
    		<a class="nav-link active" aria-current="page" href="#">
      			<div class="title-box">
        			<h2>New Arrivals</h2>
      			</div>
    		</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" href="product.php">
      			<div class="title-box">
        			<h2>More Products</h2>
      			</div>
    		</a>
  		</li>
	</ul>
	<div class="row">
			<?php
				getnewProduct();	
			?>
	</div>
</div>
</section>
<!-------- website features -------->
<section class="website-features">
	<div class="container">
		<div class="row">
			<div class="col-md-3 feature-box">
				<img src="images/feature-1.png">
				<div class="feature-text">
					<p><b>100% Original items</b> are available at company</p>
				</div>
			</div>
			<div class="col-md-3 feature-box">
				<img src="images/feature-2.png" alt="">
				<div class="feature-text">
					<p><strong>Return within 30 days</strong> of receving your order</p>
				</div>
			</div>
			<div class="col-md-3 feature-box">
				<img src="images/feature-3.png" alt="">
				<div class="feature-text">
					<p><strong>Get free delivery for every</strong> order on more than price</p>
				</div>
			</div>
			<div class="col-md-3 feature-box">
				<img src="images/feature-4.png" alt="">
				<div class="feature-text">
					<p><strong>Pay online through multiple</strong> options (card/ net banking)</p>
				</div>
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
			<img src="images/play-store.png" alt="">
			<img src="images/app-store.png" alt="">
		</div>
	</div>
	<hr>
	<p class="copyright"><i class="fa fa-copyright"></i> FYP</p>
</div>
</section>
<!-------- js for toggle menu -------->
<script>
	function openmenu(){
		document.getElementById("side-menu").style.display="block";
		document.getElementById("menu-btn").style.display="none";
		document.getElementById("close-btn").style.display="block";
	}
	function closemenu(){
		document.getElementById("side-menu").style.display="none";
		document.getElementById("menu-btn").style.display="block";
		document.getElementById("close-btn").style.display="none";
	}
</script>
</body>
</html>