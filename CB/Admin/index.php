<?php
include('../indata/connect.php');
include('../indata/commonFunction.php');
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // User is already logged in, redirect to the profile page
    header("Location: profile.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <style>
        .int-btn {
            background-color: #FF0000;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }
        .int-btn:hover {
            background-color: #BD685F;
        }
        .form-container {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="product_images/adminlog.png" alt="Admin Login" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4 form-container">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your Password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" name="login" class="int-btn" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$select_query = "SELECT * FROM admin_table WHERE admin_email='$email'";
	$result = mysqli_query($con, $select_query);
	$row_count = mysqli_num_rows($result);
	$row_data = mysqli_fetch_assoc($result);
	$admin_name = $row_data['admin_name'];

	if($row_count > 0){
		$_SESSION['username'] = $admin_name;
		if(password_verify($password, $row_data['admin_password'])){
			$_SESSION['username'] = $admin_name;
			echo "<script>alert('Login Successful')</script>";
			echo "<script>window.open('profile.php','_self')</script>";
		}else{
			echo "<script>alert('Invalid Password')</script>";
		}
	}else{
		echo "<script>alert('Invalid Credentials')</script>";
	}
}
?>