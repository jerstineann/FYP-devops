<h3 class="text-center" style="color:#C65C81;">ALL Orders</h3>
<!----- Order table--->
<table class="table table-bordered mt-5 text-center">
    <thead style="background: #E799A3; color:white;">
        <tr>
            <th>SI no</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_orders = "SELECT * FROM user_order";
        $result= mysqli_query($con, $get_orders);
        $number=0;
        while($row= mysqli_fetch_assoc($result)){
            $order_id= $row['order_id'];
            $amount_due= $row['amount_due'];
            $invoice_number= $row['invoice_number'];
            $total_products= $row['total_products'];
            $order_date= $row['order_date'];
            $order_status= $row['order_status'];
            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number?></td>
            <td><?php echo $amount_due?></td>
            <td><?php echo $invoice_number?></td>
            <td><?php echo $total_products?></td>
            <td><?php echo $order_date?></td>
            <td><?php echo $order_status?></td>
            <td><a onclick="checker()"href="profile.php?delete_order=<?php echo $order_id?>"  class="text-light"><i class="fa fa-trash-o"></i></a></td>
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
