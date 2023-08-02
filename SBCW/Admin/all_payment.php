<h3 class="text-center" style="color:#C65C81;">ALL Payments</h3>
<!---- payement table---->
<table class="table table-bordered mt-5 text-center">
    <thead style="background: #E799A3; color:white;">
        <tr>
            <th>SI no</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_payment = "SELECT * FROM user_payments";
        $result= mysqli_query($con, $get_payment);
        $number=0;
        while($row= mysqli_fetch_assoc($result)){
            $payment_id= $row['payment_id'];
            $invoice_number= $row['invoice_number'];
            $amount= $row['amount'];
            $payment_mode= $row['payment_mode'];
            $date= $row['date'];
            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number?></td>
            <td><?php echo $invoice_number?></td>
            <td><?php echo $amount?></td>
            <td><?php echo $payment_mode?></td>
            <td><?php echo $date?></td>
            <td><a onclick="checker()"href="profile.php?delete_payment=<?php echo $payment_id?>" class="text-light"><i class="fa fa-trash-o"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
function checker(){
    var result = confirm('Are you sure?');
    if(result == false){
        event.preventDefault();
    }
}
</script>