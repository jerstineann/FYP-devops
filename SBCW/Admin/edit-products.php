<?php
if(isset($_GET['edit_products'])){
    $product_id = $_GET['edit_products'];
    $select_query = "SELECT * FROM product WHERE product_id = $product_id";
    $result = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $status = $row['status'];
    $product_image = $row['product_image'];
    $product_price = $row['product_price'];
    $product_sale = $row['product_sale'];
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
        background-color: #00BFFF;
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
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Product Title -->
        <div class="form-outline">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title?>" required="required">
        </div>
        <!-- Product Description -->
        <div class="form-outline">
            <label for="product_desc" class="form-label">Product Description</label>
            <textarea id="product_desc" name="product_desc" class="form-control" rows="4" required="required"><?php echo $product_description?></textarea>
        </div>
        <!-- Product Status -->
        <div class="form-outline">
            <label for="product_status" class="form-label">Product Status</label>
            <input type="text" id="product_status" name="product_status" class="form-control" value="<?php echo $status?>" required="required">
        </div>
        <!-- Product Keywords -->
        <div class="form-outline">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <textarea id="product_keywords" name="product_keywords" class="form-control" rows="3" required="required"><?php echo $product_keywords?></textarea>
        </div>
        <!-- Product Price -->
        <div class="form-outline">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required" value="<?php echo $product_price?>">
        </div>
        <!-- Product Sale -->
        <div class="form-outline">
            <label for="product_sale" class="form-label">Product Sale</label>
            <input type="text" id="product_sale" name="product_sale" class="form-control" required="required" value="<?php echo $product_sale?>">
        </div>
        
        <!-- Submit Button -->
        <div class="form-outline text-center">
            <input type="submit" name="update-product" class="int-btn" value="Update Product">
        </div>
    </form>
</div>
<?php
if(isset($_POST['update-product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $status = $_POST['product_status'];
    $product_price = $_POST['product_price'];
    $product_sale = $_POST['product_sale'];
    
    if(empty($product_title) || empty($product_description) || empty($product_keywords) || empty($status) || empty($product_price) || empty($product_sale)){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    } else {
        $update_query = "UPDATE product SET product_title = '$product_title', product_description = '$product_description', product_keywords = '$product_keywords', status = '$status', product_price = '$product_price', product_sale = '$product_sale' WHERE product_id = $product_id";
        $update_result = mysqli_query($con, $update_query);
        
        if($update_result){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('profile.php?view-product', '_self')</script>";
        } else {
            echo "<script>alert('Failed to update product')</script>";
        }
    }
}
?>
