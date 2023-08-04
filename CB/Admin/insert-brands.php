<?php
    include('../indata/connect.php');
    if(isset($_POST['insert_brand'])){
        $brand_title = $_POST['brand-title'];
		$select_query="Select * FROM brands WHERE brand_title='$brand_title'";
		$result_select=mysqli_query($con,$select_query);
		if(mysqli_num_rows($result_select) > 0){
			echo "<script>alert('This brand is present inside the database')</script>";
		}else{
        	$insert_query = "insert into brands (brand_title) values ('$brand_title')"; 
        	$result = mysqli_query($con,$insert_query);
        	if($result){
            	echo "<script>alert('Brand has been inserted')</script>";
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
	<title>Insert Brand</title>
	<link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
</head>
<body>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="ins">
<div class="input-group w-90">
	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-alt"></i></span>
	<input type="text" class="form-control" name="brand-title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10">
	<input type="submit" class="int-btn" name="insert_brand" value="Insert Brands">
</div>
</form>
</body>
</html>