<h3 class="text-center" style="color:#C65C81;">ALL Products</h3>
<table class="table table-bordered mt-5">
    <thead style="background: #E799A3; color:white;">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Product Sale</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_product = "SELECT * FROM product";
        $result= mysqli_query($con, $get_product);
        while($row= mysqli_fetch_assoc($result)){
            $product_id= $row['product_id'];
            $product_title= $row['product_title'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            $product_sale=$row['product_sale'];
        ?>
        <tr class="text-center">
            <td><?php echo $product_id?></td>
            <td><?php echo$product_title ?></td>
            <td><img src="product_images/<?php echo $product_image?>"alt="<?php echo $product_title?>" class="product_img"></td>
            <td><?php echo $product_price?></td>
            <td><?php
            $get_count="SELECT * FROM orders_pending WHERE product_id=$product_id";
            $result_count= mysqli_query($con, $get_count);
            $rows_count=mysqli_num_rows($result_count);
            echo"$rows_count";
            ?>
            </td>
            <td><?php echo$status?></td>
            <td><?php echo$product_sale?></td>
            <td><a href="index.php?edit_products" class="text-light"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><a href=""  class="text-light"><i class="fa fa-trash-o"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>