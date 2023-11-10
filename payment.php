<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b29483ad5.js" crossorigin="anonymous"></script>
</head>
<style>
      <style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
    body{
      overflow-x:hidden;
      font-family: 'Ubuntu', sans-serif;
    }
    .logo{
    width:4%;
    height:30%;
}
.navbar-expand{
  background-color: white
}
.nav-item{
  font-weight: bolder;
}


.nav-link:hover{
  color:#e24938;
}
#hover:hover{
  color:#e24938;
}
#welcome:hover{
  color:white;
}
#guest:hover{
  color:white;
}

   .payment_img{
        width:70%;
        display:block;
        margin:auto;

    }

</style>
<body>
    <!-- php code to access user id -->
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
   <div class="container">
    <h2 class="text-center text-info">Payment option</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
        <a href="https://www.paypal.com" target="_blank"><img src="../images/upi.jpg" class="payment_img" alt=""></a>
        </div>

        <div class="col-md-6">
        <a href="order.php?user_id=<?php echo $user_id ?>"><h2>Pay offline</h2></a>
        </div>

    </div>
   </div>
</body>
</html>