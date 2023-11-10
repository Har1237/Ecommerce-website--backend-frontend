
    
    <style>
      body{
            background: url('https://source.unsplash.com/collection/190727/1600x900');
            /* background-image: cover; */
        }
    </style>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
      <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
      </div>
      <div class="form-outline">
        <input type="submit" class="form-control w-50 m-auto" name="dont delete" value="Don't Delete Account">
      </div>
    </form>





<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="Delete from `user_table` where username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account deleted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont delete'])){
    echo "<script>window.open('profile.php')</script>";
}
?>