<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | My Orders</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM user_table WHERE username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
?>
<h3 class="text-center my-5" style="color:#C65C81;">ALL My Orders</h3>
<div class="container">
    <table class="table table-bordered mt-5 mx-auto">
        <thead style="background: #00BFFF; color:white;">
            <tr>
                <th>SI No</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $get_order_details = "SELECT * FROM user_order WHERE user_id=$user_id";
                $result_order = mysqli_query($con, $get_order_details);
                $number = 1;
                while($row_order = mysqli_fetch_assoc($result_order)) {
                    $order_id = $row_order['order_id'];
                    $amount_due = $row_order['amount_due'];
                    $invoice_number = $row_order['invoice_number'];
                    $total_products = $row_order['total_products'];
                    $order_date = $row_order['order_date'];
                    $order_status = $row_order['order_status'];
                    if($order_status == 'pending') {
                        $order_status = 'Incomplete';
                    } else {
                        $order_status = 'Complete';
                    }
                    echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>";
                    if($order_status == 'Complete') {
                        echo "<td>Paid</td>
                        </tr>";
                    } else {
                        echo "<td><a href='confirm-payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                        </tr>";
                    }
                    $number++;
                }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>