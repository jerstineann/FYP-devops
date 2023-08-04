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
    <title>SBC | Forgot Password</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-fluid {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 400px;
            max-width: 100%;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            border-color: #00BFFF;
            box-shadow: none;
        }
        .btn-login {
            background-color: #00BFFF;
            color: white;
            font-weight: bold;
        }
        .btn-login:hover {
            background-color: #bd685f;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <h2 class="card-title mb-4">Change Password</h2>
            <form action="" method="post" enctype="multipart/form-data">
				<div class="form-outline mb-4">
					<label for="user_password" class="form-label">Password</label>
					<input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
				</div>
				<div class="form-outline mb-4">
					<label for="conf_user_password" class="form-label">Confirm Password</label>
					<input type="password" id="conf_user_password" class="form-control" placeholder="Enter your confirm password" autocomplete="off" required="required" name="conf_user_password">
				</div>
                <div class="mt-4">
                    <input type="submit"  class="py-2 px-3 border-0" name="change_password" placeholder="save" style="background-color: #00BFFF; color: white;">
                </div>
            </form>
        </div>
    </div>
</body>
</html>