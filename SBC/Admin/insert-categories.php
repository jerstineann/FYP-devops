<?php
    include('../indata/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title = $_POST['cat-title'];
		$select_query="Select * from categories where category_title='$category_title'";
		$result_select=mysqli_query($con,$select_query);
		if(mysqli_num_rows($result_select) > 0){
			echo "<script>alert('This category is present inside the database')</script>";
		}else{
        	$insert_query = "insert into categories (category_title) values ('$category_title')"; 
        	$result = mysqli_query($con,$insert_query);
        	if($result){
            	echo "<script>alert('Category has been inserted')</script>";
        	}
    	}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="admin-style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<title>Insert Categroy</title>
	<link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
</head>
<body>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="ins">
<div class="input-group w-90">
	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-alt"></i></span>
	<input type="text" class="form-control" name="cat-title" placeholder="Insert Categories" aria-label="categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10">
	<input type="submit" class="int-btn" name="insert_cat" value="Insert Categories">
</div>
</form>
</body>
</html>