<style>
    .users_img{
        width: 80px;
        height:80px;
        object-fit:contain;
  
    }
</style>

<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
$get_users="Select * from `user_table`";
$result=mysqli_query($con,$get_users);
$row_count=mysqli_num_rows($result);


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
}else{
    echo "<tr>
<th>Sl no</th>
<th>User name</th>
<th>User email</th>
<th>User image</th>
<th>User address</th>
<th>User mobile</th>
<th>Delete</th>
</tr>
</thead>
<tbody class=bg-secondary text-light text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id =$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_password=$row_data['user_password'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo "<tr class='text-center'>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image'  class='users_img' alt='$username'/></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
        <td><a href='index.php?delete_list_payments=<?php echo $user_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";


    }
}
        ?>
       
    </tbody>
</table>