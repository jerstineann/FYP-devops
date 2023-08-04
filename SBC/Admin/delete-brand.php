<?php
if(isset($_GET['delete-brand'])){
    $brand_id = $_GET['delete-brand'];
    $delete_brand="DELETE FROM brands WHERE brand_id='$brand_id'";
    $result=mysqli_query($con,$delete_brand);
    if($result){
        echo"<script>alert('Brand Deleted Successfully')</script>";
        echo"<script>window.open('profile.php?view-brand','_self')</script>";
    }
}
?>