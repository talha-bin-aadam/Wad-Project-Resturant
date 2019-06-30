<?php
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
if(isset($_GET['del_item'])){
    $del_id = $_GET['del_item'];
    $del_item = "delete from menu_items where item_id='$del_id'";
    $run_del = mysqli_query($con,$del_item);
    if($run_del){
        header('location: index.php?view_items');
    }
}