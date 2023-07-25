<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Product Title -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required="required">
        </div>
        <!-- Product description -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control" required="required">
        </div>
        <!-- Product keywords -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keyword</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required">
        </div>
        <!-- Product categories -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-category" class="form-label">Product Categories</label>
            <select name="product-category" id="category-list" class="form-select">
                    <option value="" disabled selected>Select Category</option>
            </select>
        </div>
        <!-- Product Subcategory -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-subcategory" class="form-label">Product Subcategories</label>
            <select class="form-select" name="product-subcategory" id="subcategory-list" aria-label="subcategory" aria-describedby="basic-addon2">
                <option value="">Select a subcategory <i class="fa fa-caret-down"></i></option>
            </select>
        </div>
        <!-- Brands -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-brand" class="form-label">Product Brand</label>
            <select class="form-select" name="product-brand" aria-label="brand" aria-describedby="basic-addon2">
                    <option value="" disabled selected>Select a brand <i class="fa fa-caret-down"></i></option>    
            </select>
        </div>
        <!-- Product Image -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image" class="form-label">Product Image</label>
            <div class="d-flex">
                <input type="file" id="product_image" name="product_image" class="form-control" required="required">
                <img src="product_images/product-1.jpg" alt="">
            </div>
            
        </div>
        <!-- Product price -->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required">
        </div>
    </form>
</div>