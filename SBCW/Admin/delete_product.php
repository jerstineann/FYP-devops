<?php
if(isset($_GET['delete_product'])){
    $product_id = $_GET['delete_product'];
    $delete_product="DELETE FROM product WHERE product_id='$product_id'";
    $result=mysqli_query($con,$delete_product);
    if($result){
        echo"<script>alert('Product Deleted Successfully')</script>";
        echo"<script>window.open('profile.php?view-product','_self')</script>";
    }
}
?>


