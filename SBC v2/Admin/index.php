<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-style.css">
	<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<title>Admin Dashboard</title>
	<!---- bootstrap css link ----->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!---- navbar ----->
    <div class="container-fluid p-0">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container-fluid">
			<a href="index.php"><img src="../images/logo-dark.jpg" class="logo"></a>
			<nav class="navbar navbar-expand-lg">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="" class="nav-link">Welcome guest</a>
					</li>
				</ul>
			</nav>
		</div>
	</nav>
	<div class="bg-light">
		<h3 class="text-center p-2">Manage Details</h3>
	</div>
	<div class="row">
		<div class="col-md-12 bg-secondary">
			<div class="profile">
				<a href="#"><img src="../images/user-1.png" class="admin-image"></a>
				<p class="text-light text-center">Admin Name</p>
			</div>
			<div class="button text-center">
				<button class="nav-butn"><a href="insert-product.php" class="nav-link text-light">Insert Products</a></button>
				<button class="nav-butn"><a href="" class="nav-link text-light">View Products</a></button>
				<button class="nav-butn"><a href="index.php?insert-category" class="nav-link text-light">Insert Categories</a></button>
				<button class="nav-butn"><a href="" class="nav-link text-light">View Categories</a></button>
				<button class="nav-butn"><a href="index.php?insert-subCategory" class="nav-link text-light">Insert Sub Categories</a></button>
				<button class="nav-butn"><a href="" class="nav-link text-light">View Sub Categories</a></button>
				<button class="nav-butn"><a href="index.php?insert-brand" class="nav-link text-light">Insert Brands</a></button>
				<button class="nav-butn"><a href="" class="nav-link text-light">View Brands</a></button>
				<button class="nav-butn"><a href="" class="nav-link text-light">All Orders</a></button>
				<button class="nav-butn"><a href="" class="nav-link text-light">All Payments</a></button>
				<button class="nav-butn"><a href="" class="nav-link text-light">List Users</a></button>
				<button class="nav-butn"><a href="" class="nav-link text-light">Logout</a></button>
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
	?>
	</div>
	<div class="footer">
		<p>All rights reserved <i class="fa fa-copyright"></i> FYP</p>
	</div>
<!---- bootstrap js link ----->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<html>