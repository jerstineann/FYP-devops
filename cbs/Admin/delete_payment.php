<?php
if(isset($_GET['delete_payment'])){
    $payment_id = $_GET['delete_payment'];
    $delete_payment="DELETE FROM user_payments WHERE order_id='$payment_id'";
    $result=mysqli_query($con,$delete_payment);
    if($result){
        echo"<script>alert('Payment Deleted Successfully')</script>";
        echo"<script>window.open('profile.php?all_payment','_self')</script>";
    }
}
?>