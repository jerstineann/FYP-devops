<h3 class="text-center" style="color:#C65C81;">ALL Users</h3>
<table class="table table-bordered mt-5">
    <thead style="background: #E799A3; color:white;">
        <tr>
            <th>SI no</th>
            <th>Username</th>
            <th>User email</th>
            <th>User address</th>
            <th>User mobile</th>
            <th>User Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $get_users = "SELECT * FROM user_table";
        $result= mysqli_query($con, $get_users);
        $number=0;
        while($row= mysqli_fetch_assoc($result)){
            $user_id= $row['user_id'];
            $username= $row['username'];
            $user_email= $row['user_email'];
            $user_address=$row['user_address'];
            $user_mobile=$row['user_mobile'];
            $user_status=$row['user_status'];
            $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number?></td>
            <td><?php echo$username ?></td>
            <td><?php echo $user_email?></td>
            <td><?php echo $user_address?></td>
            <td><?php echo$user_mobile?></td>
            <td><?php echo$user_status?></td>
            <td><a href="profile.php?edit_user=<?php echo $user_id?>" class="text-light"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><a onclick="checker()"href="profile.php?delete_user=<?php echo $user_id?>"  class="text-light"><i class="fa fa-trash-o"></i></a></td>
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