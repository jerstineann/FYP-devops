<?php
include('connect.php');
    function getproducts(){
        global $con;
        if(!isset($_GET['subcategory']) || !isset($_GET['brand']) || !isset($_GET['onSales']) ){
            $select_query="SELECT * FROM product;";
            $result_query=mysqli_query($con, $select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image=$row['product_image'];
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
                                <a href='product.php?add_to_cart=$product_id' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
                                <a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";	
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
                                    <a href='product.php?add_to_cart=$product_id' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
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
                                    <a href='product.php?add_to_cart=$product_id' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
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
                                <a href='product.php?add_to_cart=$product_id' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
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
                                        <a href='product.php?add_to_cart=$product_id' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
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
					  <a href='product.php?add_to_cart=$product_id' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
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
					<a href='product.php?add_to_cart=$product_id' class='btn btn-info' style='background-color: #E799A3; color: white;'>Add to cart</a> 
					<a href='product-details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
				</div>
			</div>
		</div>";
	}			
}
// view details finction 
function viewDetails()
{
    global $con;
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM product WHERE product_id = $product_id;";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            echo"
            <style>
                .product-container {
                    display: flex;
                    max-width: 1000px;
                    margin: 0 auto;
                }
                .product-image {
                    flex: 0 0 200px;
                    padding: 0;
                    margin-right: 40px;
                }
                .product-details {
                    flex: 1;
                }
                h1 {
                    font-size: 30px;
                    margin-bottom: 10px;
                }
                h4 {
                    font-size: 22px;
                    font-weight: bold;
                }
                .product-description {
                    margin-bottom: 20px;
                }
                .custom-button {
                    display: inline-block;
                    background-color: #C65C81;
                    color: #fff;
                    padding: 10px 20px;
                    border-radius: 4px;
                    text-decoration: none;
                    margin-top: 10px;
                }
                .go-back a {
                    color: #E799A3;
                    text-decoration: none;
                }
                .go-back a:hover {
                    color: #C65C81;
                }
            </style>
            <div class='product-container'>
                <div class='product-image'>
                    <img src='./Admin/product_images/$product_image' class='card-img-top product-image' alt='$product_title'>
                </div>
                <div class='product-details'>
                    <h1>$product_title</h1>
                    <h4>$$product_price</h4>
                    <div class='product-description'>
                        <h3>Product Details</h3>
                        <p>$product_description</p>
                    </div>
                    <div>
                        <a href='product.php?add_to_cart=$product_id' class='btn custom-button'>Add to cart</a> 
                        <a href='product.php' class='btn custom-button go-back'>Go back</a>
                    </div>
                </div>
            </div>";
        }
    }
}
// get ip function 
function getIPAddress() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    //whether ip is from the remote address  
    else {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  
// cart function 
function cart() {
    global $con;
    if(isset($_GET['add_to_cart'])){
        $get_ip = getIPAddress(); 
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip' AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('product.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO cart_details (product_id,ip_address,quantity) VALUES ($get_product_id,'$get_ip',1)";
            $result = mysqli_query($con, $insert_query);
            echo "<script>alert('This item is added to cart')</script>";
            echo "<script>window.open('product.php','_self')</script>";
        }
    }
}
// function to get cart item numbers 
function cart_items(){
    if(isset($_GET['add_to_cart'])){
		global $con;
        	$get_ip = getIPAddress(); 
        	$select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
        	$result_query = mysqli_query($con, $select_query);
        	$count_cart_items = mysqli_num_rows($result_query);
    }else {
        	global $con;
        	$get_ip = getIPAddress(); 
        	$select_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
        	$result_query = mysqli_query($con, $select_query);
        	$count_cart_items = mysqli_num_rows($result_query);
    }
	echo $count_cart_items;
}
// total price function
function total_cart_price(){
	global $con;
	$get_ip = getIPAddress(); 
	$subtotal_price=0;
    $tax_price=0;
    $total_price=0;
	$cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip'";
    $result= mysqli_query($con, $cart_query);
	while($row=mysqli_fetch_array($result)){
        $quantities = $row['quantity'];
		$product_id=$row['product_id'];
		$select_products="SELECT * FROM product WHERE product_id=$product_id";
		$result_product= mysqli_query($con, $select_products);
		while($row_product_price=mysqli_fetch_array($result_product)){
			$product_price=array($row_product_price['product_price'] * $quantities);
			$product_value=array_sum($product_price);
			$subtotal_price+=$product_value;
		}
	}
    $tax_price = $subtotal_price * 0.07;
    $total_price = $subtotal_price + $tax_price;
    echo "<table>
        <tr>
            <td>Subtotal</td>
            <td>$$subtotal_price</td>
        </tr>
        <tr>
            <td>Tax</td>
            <td>$$tax_price</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>$$total_price</td>
        </tr>
    </table>"; 
}
// get user order details
function get_user_order_details() {
	global $con;
	$username = $_SESSION['username'];
	$get_details = "SELECT * FROM user_table WHERE username='$username'";
	$result_query = mysqli_query($con, $get_details);
	while ($row_query = mysqli_fetch_array($result_query)) {
		$user_id = $row_query['user_id'];
		if (!isset($_GET['edit-account']) || !isset($_GET['my-orders']) || !isset($_GET['delete-account'])) {
			$get_orders = "SELECT * FROM user_order WHERE user_id=$user_id AND order_status='pending'";
			$result_orders_query = mysqli_query($con, $get_orders);
			$row_count = mysqli_num_rows($result_orders_query);
			if ($row_count > 0) {
				echo "<h3 class='text-center my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
			}else{
                echo "<h3 class='text-center my-5'>You have zero pending orders</h3>
                <p class='text-center'><a href=../index.php' class='text-dark'>Explore Products</a></p>";
			}
		}
	}
}
?>