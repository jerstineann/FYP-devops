<h3 class="text-center" style="color:#C65C81;">ALL Categories</h3>
<!-- category table --->
<table class="table table-bordered mt-5 text-center">
    <thead style="background: #E799A3; color:white;">
        <tr>
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_category = "SELECT * FROM categories";
        $result= mysqli_query($con, $get_category);
        while($row= mysqli_fetch_assoc($result)){
            $category_id= $row['category_id'];
            $category_title= $row['category_title'];
        ?>
        <tr class="text-center">
            <td><?php echo $category_id?></td>
            <td><?php echo $category_title ?></td>
            <td><a onclick="checker()"href="profile.php?delete_category=<?php echo $category_id?>"  class="text-light"><i class="fa fa-trash-o"></i></a></td>
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