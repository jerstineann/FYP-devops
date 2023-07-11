<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Login</title>
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
<section class="register-login-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/image-1.jpg" alt="Login Image" class="login-image">
            </div>
            <div class="col-md-6 col-md-offset-3">
                <form action="" method="post">
                    <h3>login now</h3>
                    <?php
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo '<span class="error-msg">' . $error . '</span>';
                        };
                    };
                    ?>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="input-box pass">
                            <input type="password" required placeholder="Enter your password" id="password">
                            <img src="images/eye-close.png" class="eye-icon" id="eye-icon">
                        </div>
                    </div>
					<script>
                        let passwordEyeicon = document.getElementById("password-eyeicon");
                        let password = document.getElementById("password");
                        passwordEyeicon.onclick = function() {
                            if (password.type == "password") {
                                password.type = "text";
                                passwordEyeicon.src = "images/eye-open.png";
                            } else {
                                password.type = "password";
                                passwordEyeicon.src = "images/eye-close.png";
                            }
                        }
                    </script>
                    <input type="submit" name="submit" value="login now" class="btn btn-primary">
                    <p>Don't have an account? <a href="register.php">Register now</a></p>
                </form>
            </div>
        </div>
    </div>
</section>
<!-------- footer -------->
<section class="footer">
	<?php include("./includes/footer.php")?>
</section>
</body>
</html>