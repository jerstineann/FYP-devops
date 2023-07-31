<?php
    require_once("../indata/dbcontroller.php");
    include('../indata/connect.php');
    $db_handle = new DBController();
    $query = "SELECT * FROM categories";
    $results = $db_handle->runQuery($query);
    if (isset($_POST['insert-product'])) {
        $product_title = $_POST['product-title'];
        $product_description = $_POST['product-description'];
        $product_keywords = $_POST['product-keywords'];
        $product_category = $_POST['product-category'];
        $product_subcategory = $_POST['product-subcategory'];
        $product_brand = $_POST['product-brand'];
        $product_image = $_FILES['product-image']['name'];
        $temp_image = $_FILES['product-image']['tmp_name'];
        $product_price = $_POST['product-price'];
        if (isset($_POST['product-sales'])){
            $product_sale ='Yes';
        }else{
           $product_sale ='No';
        }
        $product_status ='true';
        if (empty($product_title) || empty($product_description) || empty($product_keywords) || empty($product_category) || empty($product_subcategory) || empty($product_brand) || empty($product_image) || empty($product_price) || empty($product_sale)) {
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        } else {
            $insert_products= "INSERT INTO product (product_title, product_description, product_keywords, category_id, subcategory_id, brand_id , product_image, product_price, date, status, product_sale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)";
            
            $stmt = mysqli_prepare($con, $insert_products);
            mysqli_stmt_bind_param($stmt, 'sssisdsiss', $product_title, $product_description, $product_keywords, $product_category, $product_subcategory, $product_brand, $product_image, $product_price, $product_status, $product_sale);
            $result = mysqli_stmt_execute($stmt);

            if($result){
                move_uploaded_file($temp_image,"./product_images/$product_image");
                echo "<script>alert('Successfully inserted the products')</script>";
            }
            else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <title>Admin Dashboard | Insert Products</title>
    <link rel="icon" type="image/jpg" href="../images/logo-dark.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin-style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script type="text/javascript">
        function getSubcategory(val) {
            $.ajax({
                type: "POST",
                url: "getSubcategory.php",
                data: 'category_id=' + val,
                success: function(data) {
                    $("#subcategory-list").html(data);
                }
            });
        }
    </script>
</head>
<body class="bg-light">
    <div class="container-fluid p-0">
	    <nav class="navbar navbar-expand-lg navbar-light">
		    <div class="container-fluid">
			    <a href="profile.php"><img src="../images/logo-dark.jpg" class="logo" alt=""></a>
		</nav>
	</div>
    <div class="container int-pro">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline ins-pro">
                <label for="product-title" class="form-label">Product title</label>
                <input type="text" name="product-title" id="product-title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline ins-pro">
                <label for="product-description" class="form-label">Product description</label>
                <input type="text" name="product-description" id="product-description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>
            <!-- keywords -->
            <div class="form-outline ins-pro">
                <label for="product-keywords" class="form-label">Product keyword</label>
                <input type="text" name="product-keywords" id="product-keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <!-- category -->
            <div class="form-outline ins-pro">
                <select name="product-category" id="category-list" class="form-select" onchange="getSubcategory(this.value);">
                    <option value="" disabled selected>Select Category</option>
                    <?php
                        foreach ($results as $category) {
                            $category_id = $category["category_id"];
                            $category_title = $category["category_title"];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- sub-category -->
            <div class="form-outline ins-pro">
                <select class="form-select" name="product-subcategory" id="subcategory-list" aria-label="subcategory" aria-describedby="basic-addon2">
                    <option value="">Select a subcategory <i class="fa fa-caret-down"></i></option>
                </select>
            </div>
            <!-- Brands -->
            <div class="form-outline ins-pro">
                <select class="form-select" name="product-brand" aria-label="brand" aria-describedby="basic-addon2">
                    <option value="" disabled selected>Select a brand <i class="fa fa-caret-down"></i></option>
                    <?php
                        $select_brands = "SELECT * FROM brands";
                        $result_brands = mysqli_query($con, $select_brands);
                        while ($row_data = mysqli_fetch_assoc($result_brands)) {
                            $brand_title = $row_data['brand_title'];
                            $brand_id = $row_data['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Images -->
            <div class="form-outline ins-pro">
                <label for="product-image" class="form-label">Product image</label>
                <input type="file" name="product-image" id="product-image" class="form-control" required="required">
            </div>
            <!-- price -->
            <div class="form-outline ins-pro">
                <label for="product-price" class="form-label">Product price</label>
                <input type="text" name="product-price" id="product-price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>
            <!-- on sales  -->
            <div class="form-outline ins-pro">
                <input type="checkbox" name="product-sales">
                <label> Is it on Sale?</label>
            </div>
            <!-- submit button -->
            <div class="form-outline ins-pro">
                <input type="submit" name="insert-product" class="int-btn" value="Insert Products">
            </div>
        </form>
    </div>
</body>
</html>
