<?php
include('../indata/connect.php');

if (isset($_GET['edit-account'])) {
    $user_session_name = $_SESSION['username'];

    $select_query = "SELECT * FROM user_table WHERE username=?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $user_session_name);
    mysqli_stmt_execute($stmt);
    $result_query = mysqli_stmt_get_result($stmt);
    $row_fetch = mysqli_fetch_assoc($result_query);

    if ($row_fetch) {
        $user_id = $row_fetch['user_id'];
        $username = $row_fetch['username'];
        $user_email = $row_fetch['user_email'];
        $user_mobile = $row_fetch['user_mobile'];
        $user_address = $row_fetch['user_address'];
    }
}

if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_mobile = $_POST['user_mobile'];
    $user_address = $_POST['user_address'];

    $update_data_query = "UPDATE user_table SET username=?, user_email=?, user_address=?, user_mobile=? WHERE user_id=?";
    $stmt = mysqli_prepare($con, $update_data_query);
    mysqli_stmt_bind_param($stmt, "ssssi", $username, $user_email, $user_address, $user_mobile, $update_id);
    $result_query_update = mysqli_stmt_execute($stmt);

    if ($result_query_update) {
        echo "<script>alert('Data updated successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    } else {
        echo "<script>alert('Data has not been updated')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SBC | Edit Account</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link rel="stylesheet" href="user-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<h3 class="text-center my-5" style="color:#C65C81;">Edit Account</h3>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo isset($username) ? $username : ''; ?>"
               name="username">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"
               value="<?php echo isset($user_email) ? $user_email : ''; ?>" name="user_email">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"
               value="<?php echo isset($user_mobile) ? $user_mobile : ''; ?>" name="user_mobile">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"
               value="<?php echo isset($user_address) ? $user_address : ''; ?>" name="user_address">
    </div>
    <input type="submit" value="Update" class="py-2 px-3 border-0" name="user_update"
           style="background-color: #E799A3; color: white;">
</form>
</body>
</html>
