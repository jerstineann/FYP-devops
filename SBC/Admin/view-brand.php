<h3 class="text-center" style="color:#C65C81;">ALL Brands</h3>
<!-- Brand table-->
<table class="table table-bordered mt-5 text-center">
    <thead style="background: #00FF00; color:white;">
        <tr>
            <th>Brand ID</th>
            <th>Brand Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_brand = "SELECT * FROM brands";
        $result= mysqli_query($con, $get_brand);
        while($row= mysqli_fetch_assoc($result)){
            $brand_id= $row['brand_id'];
            $brand_title= $row['brand_title'];
        ?>
        <tr class="text-center">
            <td><?php echo $brand_id?></td>
            <td><?php echo $brand_title ?></td>
            <td><a onclick="checker()"href="profile.php?delete_brand=<?php echo $brand_id?>"  class="text-light"><i class="fa fa-trash-o"></i></a></td>
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