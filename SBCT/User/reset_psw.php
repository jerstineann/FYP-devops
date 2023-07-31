<?php session_start() ;
include('../indata/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="user-style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Password Reset Form</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
</head>
<body>
    <nav class="navbar-expand-lg navbar-light bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="#">Password Reset Form</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5">
                        <div class="card-header">Reset Your Password</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="login">

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="password" id="password" class="form-control" name="password" required autofocus>
                                            <div class="input-group-append">
                                                <span class="input-group-text toggle-password" id="togglePassword">
                                                    <i class="bi bi-eye-slash"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="reset" name="reset" style="background-color: #E799A3; color: white;  border: none; padding: 5px 10px;"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php
if (isset($_POST["reset"])) {
    $psw = $_POST["password"];

    $token = $_SESSION['token'];
    $Email = $_SESSION['email'];

    $hash = password_hash($psw, PASSWORD_DEFAULT);

    $sql = mysqli_query($con, "SELECT * FROM user_table WHERE user_email='$Email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if ($Email) {
        $new_pass = $hash;
        mysqli_query($con, "UPDATE user_table SET user_password='$new_pass' WHERE user_email='$Email'");
?>
        <script>
            window.location.replace("user_login.php");
            alert("Your password has been successfully reset.");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Please try again.");
        </script>
<?php
    }
}
?>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        if (password.type === "password") {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
        this.querySelector('i').classList.toggle('bi-eye');
    });
</script>
