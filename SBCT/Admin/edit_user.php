<?php
if(isset($_GET['edit_user'])){
    $user_id = $_GET['edit_user'];
    $select_query = "SELECT * FROM user_table WHERE user_id = $user_id";
    $result = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_status = $row['user_status'];
}
?>

<style>
    .product_img {
        width: 100px;
        object-fit: contain;
    }
    
    .form-outline {
        width: 50%;
        margin: auto;
        margin-bottom: 20px;
    }
    
    .form-label {
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    .form-control {
        width: 100%;
        height: calc(1.5em + 0.75rem + 8px);
    }
    
    .int-btn {
        background-color: #E799A3;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }
    
    .int-btn:hover {
        background-color: #BD685F;
    }
</style>

<div class="container mt-4">
    <h1 class="text-center">Edit Users</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Username -->
        <div class="form-outline">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" value="<?php echo $username?>" required="required">
        </div>

        <!-- User email -->
        <div class="form-outline">
            <label for="user_email" class="form-label">User Email</label>
            <input type="text" id="user_email" name="user_email" class="form-control" value="<?php echo $user_email?>" required="required">
        </div>
        
        <!-- Status -->
        <div class="form-outline">
            <label for="user_status" class="form-label">User Status</label>
            <input type="text" id="user_status" name="user_status" class="form-control" required="required" value="<?php echo $user_status?>">
        </div>
        
        <!-- Submit Button -->
        <div class="form-outline text-center">
            <input type="submit" name="update-user" class="int-btn" value="Update User">
        </div>
    </form>
</div>

<?php
if(isset($_POST['update-user'])){
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_status = $_POST['user_status'];
    
    if(empty($username) || empty($user_email) || empty($user_status)){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    } else {
        $update_query = "UPDATE user_table SET username = '$username', user_email = '$user_email', user_status = '$user_status'";
        $update_result = mysqli_query($con, $update_query);
        
        if($update_result){
            echo "<script>alert('User updated successfully')</script>";
            echo "<script>window.open('profile.php?list_user', '_self')</script>";
        } else {
            echo "<script>alert('Failed to update user')</script>";
        }
    }
}
?>