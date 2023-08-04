<?php 
include('../indata/connect.php');
include('../indata/commonFunction.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SBC | Login</title>
	<link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
	<link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid my-3">
	<h2 class="text-center">User Login</h2>
	<div class="row d-flex align-items-center justify-content-center">
		<div class="col-lg-12 col-xl-6">
			<form action="" method="post" enctype="multipart/form-data">
				<!---- username field --->
				<div class="form-outline mb-4">
					<label for="user_username" class="form-label">Username</label>
					<input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
				</div>
                <!---- password field --->
				<div class="form-outline mb-4">
					<label for="user_password" class="form-label">Password</label>
					<input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
				</div>
                <!---- Login button--->
                <div class="mt-4 pt-2">
	                <input type="submit" value="Login" class="py-2 px-3 border-0" name="user_login" style="background-color: #FF0000; color: white;">
					<p class="small fw-bold mt-2 pt-1 mb-0"><a href="recover_forgot.php" class="text-danger">Forgot Your Password?</a></p>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger"> Register</a></p>
                </div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['user_login'])){
	$user_username=$_POST['user_username'];
	$user_password=$_POST['user_password'];
	$user_ip=getIPAddress();
	$select_query="SELECT * FROM user_table WHERE username='$user_username'";
	$result=mysqli_query($con, $select_query);
	$rows_count=mysqli_num_rows($result);
	$row_data=mysqli_fetch_assoc($result);
	$user_status=$row_data['user_status']; 
	$user_email_status=$row_data['user_email_status']; 
	// cart items
	$select_cart_items="SELECT * FROM cart_details where ip_address='$user_ip'";
	$result_cart=mysqli_query($con, $select_cart_items);
	$rows_count_cart=mysqli_num_rows($result_cart);
	if($rows_count>0){
		$_SESSION['username']= $user_username;
		if(password_verify($user_password,$row_data['user_password'])){
			if($user_status=='Active'&& $user_email_status='Verified'){
				if($rows_count==1 && $rows_count_cart==0){
					$_SESSION['username']= $user_username;
					echo "<script>alert('Login Successful')</script>";
					echo "<script>window.open('profile.php','_self')</script>";
				}else{
					$_SESSION['username']= $user_username;
					echo "<script>alert('Login Successful')</script>";
					echo "<script>window.open('payment.php','_self')</script>";
				}
			} else if($user_email_status='Not verified'){
					echo "<script>alert('Your account is not verified')</script>";
					echo "<script>window.open('verification.php','_self')</script>";
			}else{
					echo "<script>alert('Your account is block')</script>";
					echo "<script>window.open('../index.php','_self')</script>";
			}
		}else{
			echo "<script>alert('Invalid Password')</script>";
		}
	}else{
		echo "<script>alert('Invalid Credentials')</script>";
	}
}
?>