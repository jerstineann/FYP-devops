<?php 
include('../indata/connect.php');
include('../indata/commonFunction.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SBC | Register</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
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
        <a href="../index.php"><img src="../images/logo-dark.jpg" class="logo" alt=""></a>
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
	                <input type="submit" value="Register" class="py-2 px-3 border-0" name="user_register" style="background-color: #FF0000; color: white;">
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
session_start();

// Function to validate and sanitize input
function sanitizeInput($input)
{
    return trim(htmlspecialchars($input));
}

// Function to validate and sanitize email
function validateEmail($email)
{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        return false;
    }
}

if (isset($_POST['user_register'])) {
    $user_username = sanitizeInput($_POST['user_username']);
    $user_email = sanitizeInput($_POST['user_email']);
    $user_email = validateEmail($user_email);
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = sanitizeInput($_POST['user_address']);
    $user_contact = sanitizeInput($_POST['user_contact']);
    $user_ip = getIPAddress();
    $user_status = "Active";
	$user_email_status = 'Not verified';

    if (!$user_email) {
        echo "<script>alert('Invalid email address')</script>";
    } elseif (strlen($user_password) < 8) {
        echo "<script>alert('Use 8 or more characters with a mix of letters, numbers & symbols')</script>";
    } elseif ($user_password !== $conf_user_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        // Check if username or email already exists
        $select_query = "SELECT * FROM user_table WHERE username=? OR user_email=?";
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, "ss", $user_username, $user_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows_count = mysqli_num_rows($result);

        if ($rows_count > 0) {
            echo "<script>alert('Username and email already exist')</script>";
        } else {
            // Insert user data using prepared statement
            $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_ip, user_address, user_mobile, user_status, user_email_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $insert_query);
            mysqli_stmt_bind_param($stmt, "ssssssss", $user_username, $user_email, $hash_password, $user_ip, $user_address, $user_contact, $user_status, $user_email_status);
            $sql_execute = mysqli_stmt_execute($stmt);

            if ($sql_execute) {
                // Generate and store OTP
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $user_email;
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';           //Set the SMTP server to send through
                $mail->SMTPAuth = true;                     //Enable SMTP authentication
                $mail->Username = 'dammyfyp@gmail.com';       //SMTP username
                $mail->Password = 'xryymaffhaqzdlfg';                 //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                $mail->Port = 465;                           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //Recipients
                $mail->setFrom('dammyfyp@gmail.com', 'OTP Verification');
                $mail->addAddress($user_email);     //Add a recipient
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "Your verify code";
                $mail->Body    = "<p>Dear user,</p><h3>Your verify OTP code is $otp<br></h3><br><br><p>With regards,</p><b>SBC</b>" ;
				if ($mail->send()) {
					echo "<script>alert('Register Successfully, OTP sent to your email');</script>";
                    echo "<script>window.open('verification.php','_self')</script>";
					exit();
				} else {
					echo "<script>alert('Register Failed, Invalid Email');</script>";
				}
            }
        }
    }
}
?>