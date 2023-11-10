<!-- connect file -->
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
    <title>Shopping Website</title>
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
        <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="" method="get">        <!--important step for searching function-->
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
      </form>
    </div>
  </div>
</nav>


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


<!-- fourth child -->

<div class="row px-1">
  <div class="col-md-10">      <!-- md-medium screen-->
     <!-- products-->
     <div class="row">

     <!-- fetching products -->
     <?php
    search_products();
     get_unique_categories();
     get_unique_brands();
    ?>
     
<!-- row end -->
  </div> 

  <!-- col end -->
</div>
           
  <div class="col-md-2 bg-secondary p-0">  
    <!-- sidenav -->
    <!-- brands to be displayed -->
   <ul class=navbar-nav me-auto>
   <li class="nav-item bg-info">
          <a class="nav-link text-center text-light" href="#"><h4>Delivery Brands</h4></a>
        </li>
        <?php
      getbrands();
        ?>
</ul>
   
   <!-- categories to be displayed -->
   <ul class=navbar-nav me-auto>
   <li class="nav-item bg-info">
          <a class="nav-link text-center text-light" href="#"><h4>Categories</h4></a>
        </li>
        <?php
         getcategories();
        ?>
      </ul>
   </div>
</div>


<div class="p-3 text-center">
  <p>All rights reserved @ 2023</p>
</div>
</div>
<!-- js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


<!-- http://localhost/phpmyadmin/index.php?route=/table/recent-favorite&db=mystore&table=categories -->