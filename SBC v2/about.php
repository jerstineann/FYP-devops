<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | About Us</title>
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
		<li><a href="cart.php"><i class="fa fa-shopping-basket"></i>cart</a></li>
		<li><a href="register.php">Sign Up</a></li>
		<li><a href="login.php">Log In</a></li>
	</ul>
    </div>
</div>
<!-------- about page -------->
<div class="container">
        <div class="about-container">
            <h2>About Us</h2>
            <img src="images/aboutUs.png" alt="About Us Image" class="img-fluid">
            <p>Welcome to our one-stop pet paradise! We're dedicated to providing pet owners with a delightful shopping experience for all their beloved companions. Our online store offers a diverse range of high-quality products and accessories for dogs, cats, birds, small animals, and more. From nutritious pet food and tasty treats to cozy beds, entertaining toys, stylish apparel, and essential grooming supplies, we've got your furry, feathered, or scaled friend covered. With a strong commitment to pet health and happiness, we carefully curate our inventory to ensure the well-being of your cherished pets. We strive to create a seamless shopping journey, offering secure transactions, prompt delivery, and friendly customer support. Discover the joy of shopping for your pets with us and provide them with the love, care, and pampering they deserve. Start exploring our pet-centric e-commerce store today!</p>
        </div>
</div>
<!-------- footer -------->
<section class="footer">
<?php include("./includes/footer.php")?>
</section>
</body>
</html>