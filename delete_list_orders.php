<?php
if(isset($_GET['delete_list_orders'])){
    $delete_list_orders=$_GET['delete_list_orders'];
   
// delete query
$delete_query="Delete from `user_orders` where order_id=$delete_list_orders";
$result_delete_list_orders=mysqli_query($con,$delete_query);
if($result_delete_list_orders){
    echo "<script>alert('Orders deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
}
}
?>