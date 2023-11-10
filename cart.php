<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b29483ad5.js" crossorigin="anonymous"></script>
     
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
    body{
      overflow-x:hidden;
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
body {
    font-family: 'Ubuntu', sans-serif;
    /* background: url('https://source.unsplash.com/collection/190727/1600x900') no-repeat center center/cover; */
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
.cart_image{
  width:60px;
  height:50px;
  object-fit:contain;
}
</style>

</head>
<body>
  <!-- navbar -->
<nav class="navbar navbar-expand">
<!-- navbar-expand-lg bg-body-tertiary -->
  <div class="container-fluid">
    <img src="./images/logo5.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active"  id="hover" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin_area/index.php">Admin Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_number();?></sup></a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>


<!-- second child -->

<nav class="navbar navbar-expand navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
<?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' id='guest' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
        </li>";
        }
?>
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' id='welcome' href='./users_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
        </li>";
        }
        ?>
</ul>
</nav>


<!-- third child -->

<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communication is at the heart of community</p>
</div>


<!--fourt child -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
           
              <!-- php code to display dynamic data -->

              <?php
            // global $con;
           $get_ip_add = getIPAddress(); 
             $total=0;
              $cart_query="Select * from `cart_details` where ip_address= '$get_ip_add'";
           $result=mysqli_query($con,$cart_query);
           $result_count=mysqli_num_rows($result);
           if($result_count>0){
             echo "<thead>
                <tr>
                    <th>Produvt Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price </th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";
           
                while($row=mysqli_fetch_array($result)){
                   $product_id=$row['product_id'];
                   $select_products="Select * from `products` where product_id='$product_id'";
                   $result_products=mysqli_query($con,$select_products);
                   while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image1=$row_product_price['product_image1'];
                    $product_values=array_sum($product_price);
                    $total+=$product_values;
                  
              ?>
   
                <tr>
                 <td><?php echo $product_title?></td>
                 <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart_image"></td>
                 <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                 <?php
$get_ip_add = getIPAddress(); 
if(isset($_POST['update_cart'])){
    $quantities=$_POST['qty'];
    $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
    $result_quantity=mysqli_query($con,$update_cart);
    $total= $total*$quantities;
      }
      ?>
                
                   
                 <td><?php echo  $price_table?>/-</td>
                 <td><input type="checkbox" class="bg-info px-3 border-0 mx-3" name="removeitem[]" value="<?php echo $product_id?>"></td>
                 <td>
                    <input type="submit" value="Update cart" class="bg-info px-3 border-0 mx-3" name="update_cart">
                    <input type="submit" value="Remove cart" class="bg-info px-3 border-0 mx-3" name="remove_cart">
      </td>

</tr>
       <?php }}}
       
      else{
        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
       }
       ?>          

</tbody>
</table>
                

                       
         <!-- subtotal -->
        <div class="d-flex mb-5">
          <?php
          $get_ip_add = getIPAddress(); 
           $cart_query="Select * from `cart_details` where ip_address= '$get_ip_add'";
        $result=mysqli_query($con,$cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
          echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$total/-</strong></h4>
          <input type='submit' value='Continue Shopping' class='bg-info p-1 border-0 mx-3' name='continue_shopping'>
          <button class='bg-secondary text-light p-1 border-0 text-light mx-2'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Chekout</a></button>";
        }else{
          echo "<input type='submit' value='Continue Shopping' class='bg-info p-1 border-0 mx-3' name='continue_shopping'>";
        }
        if(isset($_POST['continue_shopping'])){
          echo "<script>window.open('index.php','_self')</script>";
        }
          ?>
        </div>
    </div>
</div>
</form>

<!-- function to remove items from cart -->
<?php
function remove_cart_items(){
global $con;
if(isset($_POST['remove_cart'])){
  foreach($_POST['removeitem'] as $remove_id){
    echo $remove_id;
    $delete_query="Delete  from `cart_details` where product_id=$remove_id";
    $run_delete=mysqli_query($con,$delete_query);
    if($run_delete){
      echo "<script>window.open('cart.php','_self')</script>";
    }
  }
}
}
echo $remove_item=remove_cart_items();
?>

<div class="p-3 text-center">
  <p>All rights reserved @ 2023</p>
</div>
</div>
<!-- js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


<!-- http://localhost/phpmyadmin/index.php?route=/table/recent-favorite&db=mystore&table=categories -->
