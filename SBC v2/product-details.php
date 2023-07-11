<?php
	include('includes/connect.php');
	include('functions/commonFunction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top-nav-bar">
	<div class="search-box">
        <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
        <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
        <a href="index.php"><img src="images/logo-dark.jpg" class="logo"></a>
		<form  class="d-flex justify-content-center" action="search-product.php" method="get">
        	<input class="form-control" type="search" aria-label="Search" name="search_data">
			<input type="submit" value="Search" class="btn custom-btn" name="search_data_product">
		</form>
    </div>
    <div class="menu-bar">
	<ul>
		<li><a href="cart.php"><i class="fa fa-shopping-basket"></i>cart</a></li>
		<li><a href="register.php">Sign Up</a></li>
		<li><a href="login.php">Log In</a></li>
	</ul>
    </div>
</div>
<section class="header">
<div class="side-menu" id="side-menu">
		<ul>
			<li>On Sale<i class="fa fa-angle-right"></i>
				<ul>
					<li><a href="product.php?onSales=1"style="color: #E799A3">Accessory</a></li>
					<li><a href="product.php?onSales=2"style="color: #E799A3">Beds</a></li>
					<li><a href="product.php?onSales=3"style="color: #E799A3">Clothing</a></li>
					<li><a href="product.php?onSales=4"style="color: #E799A3">Food</a></li>
					<li><a href="product.php?onSales=5"style="color: #E799A3">Toys</a></li>
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
<!------- single product------>
<div class="small-container product-details">
  <div class="row">
    <div class="col-2">
      <img src="./Admin/product_images/product-1.jpg" id="product-img">
    </div>
    <div class="col-2 text-left"> <!-- Added "text-left" class -->
      <h1>product_title</h1>
      <h4>product_price</h4>
      <input type="number" value="1">
      <a href="cart.html" class="btn"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
      <a href="product.php" class="btn go-back"><i class="fa fa-arrow-left"></i> Go back</a>
      <br>
      <p>product_description</p>
    </div>
  </div>
</div>
<!-------- products -------->
<section class="products page"> 
	<div class="container">
		<div class="row">
			<?php
				get_uniquecategories();
				get_onsaleproduct();
				get_uniquebrands();
			?>
		</div>
	</div>
</section>
<!-------- footer -------->
<section class="footer">
	<?php include("./includes/footer.php")?>
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