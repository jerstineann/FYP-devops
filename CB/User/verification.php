<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="icon" href="Favicon.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        .navbar-secondary {
            background-color: #6c757d;
        }
        .btn-custom {
            background-color: #FF0000;
            color: white;
        }
        .btn-custom:hover {
            background-color: #C65C81;
        }
    </style>
    <title>Verification</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary navbar-laravel">
    <div class="container">
        <span class="navbar-brand text-white">Verification Account</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<main class="login-form">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verification Account</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="otp" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" name="verify" class="btn btn-custom">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
    include('../indata/connect.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            $select_query = "UPDATE user_table SET user_email_status = 'Verified' WHERE user_email = '$email'";
            $result = mysqli_query($con, $select_query);
            ?>
             <script>
                 alert("Verify account done, you may sign in now");
                 window.location.replace("user_login.php");
             </script>
             <?php
        }
    }
?>
</body>
</html>