<?php
include('../includes/connect.php');

if (isset($_POST['insert_subcat'])) {
    $subcat_title = $_POST['subcat-title'];
    $category_id = $_POST['category-id'];

    $select_query = "SELECT * FROM subcategories WHERE subCategory_title='$subcat_title' AND category_id='$category_id'";
    $result_select = mysqli_query($con, $select_query);

    if (mysqli_num_rows($result_select) > 0) {
        echo "<script>alert('This subcategory already exists in the database for the selected category')</script>";
    } else {
        $insert_query = "INSERT INTO subcategories (subCategory_title, category_id) VALUES ('$subcat_title', '$category_id')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('Subcategory has been inserted')</script>";
        }
    }
}
?>

<h2 class="text-center">Insert Subcategory</h2>
<form action="" method="post" class="ins">
    <div class="input-group w-90">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-list-alt"></i></span>
        <input type="text" class="form-control" name="subcat-title" placeholder="Insert Subcategory" aria-label="subcategory" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-90">
        <span class="input-group-text" id="basic-addon2"><i class="fa fa-list"></i></span>
        <select class="form-control" name="category-id" aria-label="category" aria-describedby="basic-addon2">
            <?php
            $select_categories = "SELECT * FROM categories";
            $result_categories = mysqli_query($con, $select_categories);
            while ($row_data = mysqli_fetch_assoc($result_categories)) {
                $category_title = $row_data['category_title'];
                $category_id = $row_data['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
            }
            ?>
        </select>
    </div>
    <div class="input-group w-10">
        <input type="submit" class="int-btn" name="insert_subcat" value="Insert Subcategory">
    </div>
</form>
