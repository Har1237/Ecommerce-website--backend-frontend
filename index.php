<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 p-1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">


   <!-- fontawesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<style>
  .product_img{
    width: 100px;
    object-fit: contain;
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
    overflow-x:hidden;
    background: url('https://source.unsplash.com/collection/190727/1600x900');
    background-image: cover;
       
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
.navbar{
  background-color:white;
}
.cart{
  margin-top:7px;
  margin-left:5px;
  cursor:pointer;
}
.cart:hover{
  color:#e24938;
}
</style>


    </head>
<body>
 <!-- navbar -->
 <nav class="navbar navbar-expand">
    <!-- first child -->
  <div class="container-fluid">
    <img src="../images/logo5.png" alt="" class="logo">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active"  id="hover" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_number();?></sup></a>
        </li>

  <li class="nav-item">
         <h5 class="cart d-flex">View all products and categories</h5>
        </li>
      </ul>


</nav>

<!-- second child -->

<div class="">
    <h3 class="text-center">Manage Details</h3>
</div>

<!-- third-child -->
<div class="row">
    <div class="col-md-11 p-1 d-flex text-items-center">
        <!-- <div class="p-3">
            <a href=""><img src="../images/plant1.jpeg" alt="" class="admin_image"></a>

        </div> -->
        <div class="button text-center align-items-center">
           <button class="my-4"><a href="insert_products.php" class="nav-link text-light bg-info my-1 p-1">Insert Products</a></button>     <!-- button*10>a.nav-link.text-light.bg-info.my-1 p-1-->
           <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 p-1">View Products</a></button>
           <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 p-1">Insert Categories</a></button>
           <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1 p-1">View Categories</a></button>
           <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 p-1">Insert Brands</a></button>
           <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1 p-1">View Brands</a></button>
           <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 p-1">All Orders</a></button>
           <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1 p-1">All Payments</a></button>
           <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1 p-1">List users</a></button>
           <button class="my-4"><a href="index.php?admin_logout" class="nav-link text-light bg-info my-1 p-1">Logout</a></button>
        </div>
    </div>
 </div>

 <!-- fourth child -->

 <div class="container my-3">                     <!-- get variable use here -->
<?php
if(isset($_GET['insert_category'])){            
     include('insert_categories.php');
}
if(isset($_GET['insert_brand'])){
  include('insert_brands.php');
}
if(isset($_GET['view_products'])){
  include('view_products.php');
}
if(isset($_GET['edit_products'])){
  include('edit_products.php');
}
if(isset($_GET['delete_product'])){
  include('delete_product.php');
}
if(isset($_GET['view_categories'])){
  include('view_categories.php');
}
if(isset($_GET['view_brands'])){
  include('view_brands.php');
}
if(isset($_GET['edit_category'])){
  include('edit_category.php');
}
if(isset($_GET['edit_brands'])){
  include('edit_brands.php');
}
if(isset($_GET['delete_category'])){
  include('delete_category.php');
}
if(isset($_GET['delete_brand'])){
  include('delete_brand.php');
}
if(isset($_GET['list_orders'])){
  include('list_orders.php');
}
if(isset($_GET['delete_list_orders'])){
  include('delete_list_orders.php');
}
if(isset($_GET['list_payments'])){
  include('list_payments.php');
}
if(isset($_GET['list_users'])){
  include('list_users.php');
}
if(isset($_GET['admin_logout'])){
  include('admin_logout.php');
}
?>
 </div>

<!-- last child -->
 <!-- <div class="bg-info footer p-3 text-center">
  <p>All rights reserved @ 2023</p>
</div>
</div> -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>