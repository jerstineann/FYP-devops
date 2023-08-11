<h3 class="text-center" style="color:#C65C81;">ALL Sub Categories</h3>
<!--- Subcategory table-->
<table class="table table-bordered mt-5 text-center">
    <thead style="background: #E799A3; color:white;">
        <tr>
            <th>Subcategory ID</th>
            <th>Subcategory Title</th>
            <th>Category Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_subcategory = "SELECT * FROM subcategories JOIN categories ON subcategories.category_id = categories.category_id;";
        $result= mysqli_query($con, $get_subcategory);
        while($row= mysqli_fetch_assoc($result)){
            $subcategory_id= $row['subcategory_id'];
            $subcategory_title= $row['subcategory_title'];
            $category_title= $row['category_title'];
        ?>
        <tr class="text-center">
            <td><?php echo $subcategory_id?></td>
            <td><?php echo $subcategory_title ?></td>
            <td><?php echo $category_title ?></td>
            <td><a onclick="checker()"href="profile.php?delete_subcategory=<?php echo $subcategory_id?>"  class="text-light"><i class="fa fa-trash-o"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
function checker(){
    var result = confirm('Are you sure?');
    if(result == false){
        event.preventDefault();
    }
}
</script>