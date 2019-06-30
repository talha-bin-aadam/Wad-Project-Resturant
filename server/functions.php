<?php
require_once "db_connection.php";

function getCats(){
    global $con;
    $getCatsQuery = "select * from menu_category";
    $getCatsResult = mysqli_query($con,$getCatsQuery);
    while($row = mysqli_fetch_assoc($getCatsResult)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a class='sidebar-nav-link nav-link'  href='menu.php?cat=$cat_id'>$cat_title</a></li>";
    }
}

function getItems(){
    global $con;
    $getItemQuery = '';
    if(!isset($_GET['cat'])){
        $getItemQuery = "select * from menu_items order by RAND();";
    }
    else if(isset($_GET['cat'])){
        $item_cat_id = $_GET['cat'];
        $getItemQuery = "select * from menu_items where item_cat = '$item_cat_id'";
    }
    $getItemResult = mysqli_query($con,$getItemQuery);
    $count_item = mysqli_num_rows($getItemResult);
    if($count_item==0){
        echo "<h4 class='alert-warning align-center my-2 p-2'> No items found in selected criteria </h4>";
    }
    while($row = mysqli_fetch_assoc($getItemResult)){
        $item_id = $row['item_id'];
        $item_title = $row['item_title'];
        $item_price = $row['item_price'];
        $item_image = $row['item_image'];
        echo "
                <div class='col-sm-6 col-md-4 col-lg-3 text-center item-summary'>
                    <h5 class='text-capitalize'>$item_title</h5>
                    <img src='admin/item_images/$item_image'>
                    <p> <b> Rs $item_price/-  </b> </p>
                    <a href='detail.php' class='btn btn-info btn-sm'>Details</a>
                    <a href='#'>
                        <button class='btn btn-primary btn-sm'>
                            <i class='fas fa-cart-plus'></i> Add to Cart
                        </button>
                    </a>
                </div>
        ";
    }
}