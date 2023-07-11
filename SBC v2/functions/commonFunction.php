<?php
    include('./includes/connect.php');
    function getproducts(){
        global $con;
        if(!isset($_GET['subcategory'])){
            if(!isset($_GET['brand'])){
                if(!isset($_GET['onSales'])){
                    $select_query="SELECT * FROM product;";
                    $result_query=mysqli_query($con, $select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_image=$row['product_image'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        echo"<style>
                        .product-image {
                            height: 200px !important; 
                        }
                        .product-card {
                            height: 100px !important; 
                        }
                        </style>
                        <div class='col-md-4 mb-2'>
                            <div class='card h-100' style='width: 18rem;'>
                                <img src='./Admin/product_images/$product_image' class='card-img-top  product-image' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='#' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
                                    <a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                        </div>";
                    }
                }   	
            }
        }
    }	
    // getting unique categories
    function get_uniquecategories(){
        global $con;
        if(isset($_GET['subcategory'])){
            $subcategory_id = $_GET['subcategory'];
            $select_query = "SELECT * FROM product WHERE subcategory_id = $subcategory_id;";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
	            echo"<h2 class='text-center text-danger'>No stock for this category</h2>";
            }else{
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo"<style>
                            .product-image {
                                height: 200px !important; 
                            }
                            .product-card {
                                height: 100px !important; 
                            }
                        </style>
                        <div class='col-md-4 mb-2'>
                            <div class='card h-100' style='width: 18rem;'>
                                <img src='./Admin/product_images/$product_image' class='card-img-top  product-image' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='#' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
                                    <a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                        </div>";
                }
            }
        }
    }   
    // getting categories
    function getCategories(){
        global $con;
        $select_categories = "SELECT * FROM categories";
        $result_categories = mysqli_query($con, $select_categories);
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li class='nav-item'><a href='index.php?category=$category_id' style='color: #000000; text-decoration: none;'>$category_title<i class='fa fa-angle-right'></i></a>";
            // Retrieve subcategories for the current category
            $select_subcategories = "SELECT * FROM subcategories WHERE category_id='$category_id'";
            $result_subcategories = mysqli_query($con, $select_subcategories);
            // Check if any subcategories exist for the current category
            if (mysqli_num_rows($result_subcategories) > 0) {
                echo "<ul>";
                while ($row_subcategory = mysqli_fetch_assoc($result_subcategories)) {
                    $subcategory_title = $row_subcategory['subcategory_title'];
                    $subcategory_id = $row_subcategory['subcategory_id'];
                    echo "<li><a href='product.php?subcategory=$subcategory_id' style='color: #E799A3; text-decoration: none;'>$subcategory_title</a></li>";
                }
                echo "</ul>";
            }
            echo "</li>";
        }
    }   
    // getting onsale products
    function get_onsaleproduct(){
        global $con;
        if(isset($_GET['onSales'])){
            $onSales_id = $_GET['onSales'];
            if($onSales_id == 1){
                $select_query = "SELECT * FROM product JOIN subcategories ON product.subcategory_id = subcategories.subcategory_id
                WHERE product.product_sale = 'Yes' AND subcategory_title = 'Accessory';";  
            } else if($onSales_id == 2){
                $select_query = "SELECT * FROM product JOIN subcategories ON product.subcategory_id = subcategories.subcategory_id
                WHERE product.product_sale = 'Yes' AND subcategory_title = 'Beds';";  
            } else if($onSales_id == 3){
                $select_query = "SELECT * FROM product JOIN subcategories ON product.subcategory_id = subcategories.subcategory_id
                WHERE product.product_sale = 'Yes' AND subcategory_title = 'Clothing';";  
            } else if($onSales_id == 4){
                $select_query = "SELECT * FROM product JOIN subcategories ON product.subcategory_id = subcategories.subcategory_id
                WHERE product.product_sale = 'Yes' AND subcategory_title = 'Food';";  
            } else if($onSales_id == 5){
                $select_query = "SELECT * FROM product JOIN subcategories ON product.subcategory_id = subcategories.subcategory_id
                WHERE product.product_sale = 'Yes' AND subcategory_title = 'Toys';";  
            }
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
	            echo"<h2 class='text-center text-danger'>No stock for this category</h2>";
            }else{
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo"<style>
                            .product-image {
                                height: 200px !important; 
                            }
                            .product-card {
                                height: 100px !important; 
                            }
                        </style>
                        <div class='col-md-4 mb-2'>
                            <div class='card h-100' style='width: 18rem;'>
                                <img src='./Admin/product_images/$product_image' class='card-img-top  product-image' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='#' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
                                    <a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                            </div>
                        </div>";
                }
            }
        }
    }   
     // getting unique brand
     function get_uniquebrands(){
        global $con;
        if(isset($_GET['brand'])){
            $brand_id = $_GET['brand'];
            $select_query = "SELECT * FROM product WHERE brand_id = $brand_id;";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
	            echo"<h2 class='text-center text-danger'>No stock for this brand</h2>";
            }else{
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo"<style>
                    .product-image {
                        height: 200px !important; 
                    }
                    .product-card {
                        height: 100px !important; 
                    }
                    </style>
                    <div class='col-md-4 mb-2'>
                        <div class='card h-100' style='width: 18rem;'>
                            <img src='./Admin/product_images/$product_image' class='card-img-top  product-image' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='#' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
                                <a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }   
    // getting brands         
    function getBrands(){
        global $con;
        $select_brands="Select * from brands";
		$result_brands=mysqli_query($con,$select_brands);
        echo "<ul>";
		while($row_data=mysqli_fetch_assoc($result_brands)){
			$brand_title=$row_data['brand_title'];
			$brand_id=$row_data['brand_id'];
			echo "
            <li class='nav-item'><a href='product.php?brand=$brand_id' style='color: #E799A3; text-decoration: none;'>$brand_title</a></li>";
		}
        echo "</ul>";
    }
    // searching product function 
    function searchProducts(){
        global $con;
        if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
            $search_query="SELECT * FROM product WHERE product_keywords LIKE '%$search_data_value%';";
            $result_query=mysqli_query($con, $search_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
	            echo"<h2 class='text-center text-danger'>No results match. No products found on this catgeory </h2>";
            }else{
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image=$row['product_image'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $brand_id=$row['brand_id'];
                    echo"<style>
                                .product-image {
                                    height: 200px !important; 
                                }
                                .product-card {
                                    height: 100px !important; 
                                }
                            </style>
                            <div class='col-md-4 mb-2'>
                                <div class='card h-100' style='width: 18rem;'>
                                    <img src='./Admin/product_images/$product_image' class='card-img-top  product-image' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <a href='#' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
                                        <a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                                </div>
                            </div>";
                }
            }
        }
    }   	
 // on sale products
    function getsaleProducts(){
        global $con;
        $select_query="SELECT * FROM `product` WHERE product_sale='yes' LIMIT 0,9";
		$result_query=mysqli_query($con, $select_query);
		while($row=mysqli_fetch_assoc($result_query)){
			$product_id=$row['product_id'];
			$product_title=$row['product_title'];
			$product_description=$row['product_description'];
			$product_image=$row['product_image'];
			$product_price=$row['product_price'];
			$category_id=$row['category_id'];
			$brand_id=$row['brand_id'];
			echo"<style>
				.product-image {
					height: 200px !important; 
				}
				.product-card {
					height: 100px !important; 
				}
			</style>
			<div class='col-md-4 mb-2'>
				<div class='card h-100' style='width: 18rem;'>
					<img src='./Admin/product_images/$product_image' class='card-img-top  product-image' alt='$product_title'>
					<div class='card-body'>
					  <h5 class='card-title'>$product_title</h5>
					  <p class='card-text'>$product_description</p>
					  <a href='#' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
					  <a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
					</div>
				</div>
			</div>";
		}		
    }   
// new products
function getnewProduct(){
    global $con;
    $select_query="SELECT * FROM product ORDER BY date DESC LIMIT 6;";
	$result_query=mysqli_query($con, $select_query);
	while($row=mysqli_fetch_assoc($result_query)){
		$product_id=$row['product_id'];
		$product_title=$row['product_title'];
		$product_description=$row['product_description'];
		$product_image=$row['product_image'];
		$product_price=$row['product_price'];
		$category_id=$row['category_id'];
		$brand_id=$row['brand_id'];
		echo"<style>
			.product-image {
				height: 200px !important; 
			}
			.product-card {
				height: 100px !important; 
			}
		</style>
		<div class='col-md-4 mb-2'>
			<div class='card h-100' style='width: 18rem;'>
				<img src='./Admin/product_images/$product_image' class='card-img-top  product-image' alt='$product_title'>
				<div class='card-body'>
					<h5 class='card-title'>$product_title</h5>
					<p class='card-text'>$product_description</p>
					<a href='#' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
					<a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
				</div>
			</div>
		</div>";
	}			
}
?>