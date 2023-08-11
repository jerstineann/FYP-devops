<?php
if(isset($_GET['delete_user'])){
    $user_id = $_GET['delete_user'];
    $delete_user="DELETE FROM user_table WHERE user_id='$user_id'";
    $result=mysqli_query($con,$delete_user);
    if($result){
        echo"<script>alert('User Deleted Successfully')</script>";
        echo"<script>window.open('profile.php?list_user','_self')</script>";
    }
}
?>