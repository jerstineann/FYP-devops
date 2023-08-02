<?php
if(isset($_GET['delete_subcategory'])){
    $subcategory_id = $_GET['delete_subcategory'];
    $delete_subcategory="DELETE FROM subcategories WHERE subcategory_id='$subcategory_id'";
    $result=mysqli_query($con,$delete_subcategory);
    if($result){
        echo"<script>alert('Subcategory Deleted Successfully')</script>";
        echo"<script>window.open('profile.php?view-subcategory','_self')</script>";
    }
}
?>