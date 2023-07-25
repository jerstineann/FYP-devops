<?php 
include('../indata/connect.php');
include('../indata/commonFunction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SBC | Register</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top-nav-bar">
	<div class="search-box">
        <a href="../index.php"><img src="../images/logo-dark.jpg" class="logo"></a>
		<form class="d-flex justify-content-center" action="search-product.php" method="get">
        	<input class="form-control" type="search" aria-label="Search" name="search_data">
			<input type="submit" value="Search" class="btn custom-btn" name="search_data_product">
		</form>
    </div>
</div>
<div class="container-fluid my-3">
	<h2 class="text-center">New User Registration</h2>
	<div class="row d-flex align-items-center justify-content-center">
		<div class="col-lg-12 col-xl-6">
			<form action="" method="post" enctype="multipart/form-data">
				<!---- username field --->
				<div class="form-outline mb-4">
					<label for="user_username" class="form-label">Username</label>
					<input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
				</div>
                <!---- email field --->
				<div class="form-outline mb-4">
					<label for="user_email" class="form-label">Email</label>
					<input type="text" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
				</div>
                <!---- password field --->
				<div class="form-outline mb-4">
					<label for="user_password" class="form-label">Password</label>
					<input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
				</div>
                <!---- confirm password field --->
				<div class="form-outline mb-4">
					<label for="conf_user_password" class="form-label">Confirm Password</label>
					<input type="password" id="conf_user_password" class="form-control" placeholder="Enter your confirm password" autocomplete="off" required="required" name="conf_user_password">
				</div>
                <!---- address field --->
				<div class="form-outline mb-4">
					<label for="user_address" class="form-label">Address</label>
					<input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required" name="user_address">
				</div>
                <!---- contact field --->
				<div class="form-outline mb-4">
					<label for="user_contact" class="form-label">Contact</label>
					<input type="text" id="user_contact" class="form-control" placeholder="Enter your Mobile Number" autocomplete="off" required="required" name="user_contact">
				</div>
                <!---- Register button--->
                <div class="mt-4 pt-2">
	                <input type="submit" value="Register" class="py-2 px-3 border-0" name="user_register" style="background-color: #E799A3; color: white;">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
                </div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<!---- php code ---->
<?php 
if(isset($_POST['user_register'])){
	$user_username=$_POST['user_username'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];
	$hash_password=password_hash($user_password,PASSWORD_DEFAULT);
	$conf_user_password=$_POST['conf_user_password'];
	$user_address=$_POST['user_address'];
	$user_contact=$_POST['user_contact'];
	$user_ip=getIPAddress();
	$user_status="active";
	// select query
	$select_query="SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
	$result=mysqli_query($con, $select_query);
	$rows_count=mysqli_num_rows($result);
	if($rows_count>0){
		echo "<script>alert('Username and email already exists')</script>";
	}else if($user_password!=$conf_user_password){
		echo "<script>alert('Passwords do not match')</script>";
	}else{
		// insert query
		$insert_query="INSERT INTO user_table (username, user_email, user_password, user_ip, user_address, user_mobile, user_status) VALUES ('$user_username', '$user_email', '$hash_password', '$user_ip', '$user_address', '$user_contact', '$user_status')";
		$sql_execute=mysqli_query($con,$insert_query);
		if($sql_execute){
			echo "<script>alert('Data inserted successfully')</script>";
		}else{
			die(mysqli_error($con));
		}
	}
	// selecting cart items 
	$select_cart_items="SELECT * FROM cart_details where ip_address='$user_ip'";
	$result_cart=mysqli_query($con, $select_cart_items);
	$rows_count=mysqli_num_rows($result_cart);
	if($rows_count>0){
		$_SESSION['username']= $user_username;
		echo "<script>alert('You have items in your cart')</script>";
		echo "<script>window.open('check-out.php','_self')</script>";
	}else{
		echo "<script>window.open('../index.php','_self')</script>";
	}
}
?>