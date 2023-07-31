<?php
	include('../indata/connect.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<title>Admin Dashboard</title>
	<link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
<style>
.logo{
	height: 20%;
	width: 20%;
}
.navbar-light{
	background-color: #E799A3;
}
.admin-image{
	width: 100px;
	object-fit: contain;
} 
.footer{
	background-color: #E799A3; 
	padding: 0.75rem; 
	text-align: center;
	bottom: 0;
}
.product_img{
	width: 100px;
	object-fit:contain;
}
</style>
</head>
<body>
    <!---- navbar ----->
    <div class="container-fluid p-0">
		<nav class="navbar navbar-expand-lg navbar-light" aria-label="Main Navigation">
			<div class="container-fluid">
				<a href="profile.php"><img src="../images/logo-dark.jpg" class="logo" alt=""></a>
				<nav class="navbar navbar-expand-lg" aria-label="Secondary Navigation">
					<ul class="navbar-nav">
						<li class="nav-item">
							<?php
							echo "<a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>";
							?>
						</li>
					</ul>
				</nav>
			</div>
		</nav>
		<div class="bg-light">
			<h3 class="text-center p-2">Manage Details</h3>
		</div>
		<div class="row">
			<div class="col-md-12 bg-secondary p1 d-flex align-items-center">
    			<div>
        			<a href="#"><img src="../images/user-1.png" class="admin-image" alt=""></a>
					<?php
        			echo"<p class='text-light'>".$_SESSION['username']."</p>";
					?>
    			</div>
				<div class="button text-center">
					<button class="my-3"><a href="insert-product.php" class="nav-link text-light my-1" style="background-color: #E799A3;">Insert Products</a></button>
					<button class="my-3"><a href="profile.php?view-product" class="nav-link text-light my-1" style="background-color: #E799A3;">View Products</a></button>
					<button class="my-3"><a href="profile.php?insert-category" class="nav-link text-light my-1" style="background-color: #E799A3;">Insert Categories</a></button>
					<button class="my-3"><a href="profile.php?view-category" class="nav-link text-light my-1"style="background-color: #E799A3;">View Categories</a></button>
					<button class="my-3"><a href="profile.php?insert-subCategory" class="nav-link text-light my-1" style="background-color: #E799A3;">Insert Sub Categories</a></button>
					<button class="my-3"><a href="profile.php?view-subcategory" class="nav-link text-light my-1" style="background-color: #E799A3;">View Sub Categories</a></button>
					<button class="my-3"><a href="profile.php?insert-brand" class="nav-link text-light my-1" style="background-color: #E799A3;">Insert Brands</a></button>
					<button class="my-3"><a href="profile.php?view-brand" class="nav-link text-light my-1" style="background-color: #E799A3;">View Brands</a></button>
					<button class="my-3"><a href="profile.php?list_order" class="nav-link text-light my-1" style="background-color: #E799A3;">All Orders</a></button>
					<button class="my-3"><a href="profile.php?all_payment" class="nav-link text-light my-1" style="background-color: #E799A3;">All Payments</a></button>
					<button class="my-3"><a href="profile.php?list_user" class="nav-link text-light my-1" style="background-color: #E799A3;">List Users</a></button>
					<button class="my-3"><a href="admin-logout.php" class="nav-link text-light my-1" style="background-color: #E799A3;">Logout</a></button>
				</div>
			</div>
		</div>
    </div>
	<div class="container my-3">
		<?php
		if(isset($_GET['insert-category'])){
			include('insert-categories.php');
		}
		if(isset($_GET['insert-brand'])){
			include('insert-brands.php');
		}
		if(isset($_GET['insert-subCategory'])){
			include('insert-subCategory.php');
		}
		if(isset($_GET['view-product'])){
			include('view-product.php');
		}
		if(isset($_GET['edit_products'])){
			include('edit-products.php');
		}
		if(isset($_GET['delete_product'])){
			include('delete_product.php');
		}
		if(isset($_GET['view-category'])){
			include('view-category.php');
		}
		if(isset($_GET['delete_category'])){
			include('delete_category.php');
		}
		if(isset($_GET['view-subcategory'])){
			include('view-subcategory.php');
		}
		if(isset($_GET['delete_subcategory'])){
			include('delete_subcategory.php');
		}
		if(isset($_GET['view-brand'])){
			include('view-brand.php');
		}
		if(isset($_GET['delete-brand'])){
			include('delete-brand.php');
		}
		if(isset($_GET['list_order'])){
			include('list_order.php');
		}
		if(isset($_GET['delete_order'])){
			include('delete_order.php');
		}
		if(isset($_GET['all_payment'])){
			include('all_payment.php');
		}
		if(isset($_GET['delete_payment'])){
			include('delete_payment.php');
		}
		if(isset($_GET['list_user'])){
			include('list_user.php');
		}
		if(isset($_GET['edit_user'])){
			include('edit_user.php');
		}
		if(isset($_GET['delete_user'])){
			include('delete_user.php');
		}
		?>
	</div>
	<div class="footer">
		<p>All rights reserved <i class="fa fa-copyright"></i> FYP</p>
	</div>
	<!---- bootstrap js link ----->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
