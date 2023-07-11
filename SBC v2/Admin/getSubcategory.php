<?php
    require_once("../includes/dbcontroller.php");
    $db_handle = new DBController();

    if (!empty($_POST["category_id"])) {
        $query = "SELECT * FROM subcategories WHERE category_id = '" . $_POST["category_id"] . "' ORDER BY subcategory_title ASC";
        $results = $db_handle->runQuery($query);
?>
        <option value="" disabled selected>Select Subcategory</option>
<?php
        foreach ($results as $subcategories) {
?>
            <option value="<?php echo $subcategories["subcategory_id"]; ?>"><?php echo $subcategories["subcategory_title"]; ?></option>
<?php
        }
    }
?>