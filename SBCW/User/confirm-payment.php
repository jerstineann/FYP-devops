<?php
	include('../indata/connect.php');
	session_start();
    if(isset($_GET['order_id'])){
        $order_id=$_GET['order_id'];
        $select_data="SELECT * FROM user_order WHERE order_id=$order_id";
        $result=mysqli_query($con,$select_data);
        $row_fetch=mysqli_fetch_assoc($result);
        $invoice_number=$row_fetch['invoice_number'];
        $amount_due=$row_fetch['amount_due'];
    }
    if(isset($_POST['confirm_payment'])){
        $invoice_number=$_POST['invoice-number'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['payment_mode'];
        $insert_query="INSERT INTO `user_payments`(`order_id`, `invoice_number`, `amount`, `payment_mode`) VALUES ('$order_id','$invoice_number','$amount','$payment_mode')";
        $result_payment=mysqli_query($con,$insert_query);
        if($result_payment){
            echo"<h3 class='text-center text-light'>Successfully completed the payment</h3>";
            echo"<script>window.open('profile.php?my-orders','_self')</script>";
        }
        $update_order="UPDATE user_order SET order_status='Complete' WHERE order_id='$order_id'";
        $result_update=mysqli_query($con,$update_order);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Payment Page </title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link rel="stylesheet" href="user-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-secondary d-flex align-items-center">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center">
                <label class="text-light">Invoice Number</label>
                <input type="text" class="form-control m-auto w-25" name="invoice-number" value="<?php echo $invoice_number?>">
            </div>
            <div class="form-outline my-4 text-center">
                <label class="text-light">Amount</label>
                <input type="text" class="form-control m-auto w-25" name="amount" value="<?php echo $amount_due?>">
            </div>
            <div class="form-outline my-4 text-center">
                <select name="payment_mode" class="form-select w-25 m-auto">
                    <option>Select Payment mode</option>
                    <option>UPI</option>
                    <option>Net Banking</option>
                    <option>Paypal</option>
                    <option>Cash on Delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center">
            <input type="submit" value="Confirm" class="py-2 px-3 border-0" style="background-color: #E799A3; color: white;" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>