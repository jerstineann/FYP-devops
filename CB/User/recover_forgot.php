<?php 
session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
?>
<!doctype html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Login Form</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="#">User Password Recovery</a>
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
                    <div class="card-header">Password Recovery</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Recover" name="recover" style="background-color: #FF0000; color: white;  border: none;">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<?php 
    if(isset($_POST["recover"])){
        include('../indata/connect.php');
        $email = $_POST["email"];

        $sql = mysqli_query($con, "SELECT * FROM user_table WHERE user_email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($fetch["user_email_status"] == "Not verified"){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("../index.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            $mail = new PHPMailer(true);

            $mail->isSMTP();                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';           //Set the SMTP server to send through
            $mail->SMTPAuth = true;                     //Enable SMTP authentication
            $mail->Username = 'dammyfyp@gmail.com';       //SMTP username
            $mail->Password = 'xryymaffhaqzdlfg';                 //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465;  
            // h-hotel account
            $mail->setFrom('dammyfyp@gmail.com', 'Password Reset');
            $mail->addAddress($_POST["email"]);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/SBC%20v2/User/reset_psw.php
            <br><br>
            <p>With regrads,</p>
            <b>SBC</b>";
            $mail->send();
            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("notification.html");
                    </script>
                <?php
            }
        }
    }
?>