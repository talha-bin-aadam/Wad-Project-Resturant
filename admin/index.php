<?php
session_start();
if(!isset($_SESSION['user_email'])){
    header('location: login.php?not_admin=You are not Admin!');
}
require_once "db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Old+Standard+TT">
    <title>FoodFactory Admin Panel</title>
    <style>
        * {
            font-family: 'Old Standard TT', serif;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><img src="../media/logo.png" style="background-color: chocolate; width: 110%; height: 110%"> Admin Panel</h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="index.php?insert_item">
                    <i class="fas fa-plus"></i> Insert New Item
                </a>
            </li>
            <li>
                <a href="index.php?view_items">
                    <i class="fas fa-sitemap"></i> View All Items
                </a>
            </li>
            <li>
                <a href="index.php?insert_category">
                    <i class="fas fa-plus"></i> Insert New Category
                </a>
            </li>
            <li>
                <a href="index.php?view_categories">
                    <i class="fas fa-band-aid"></i> View All Categories
                </a>
            </li>
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-shopping-bag"></i> View Orders</a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-credit-card"></i> View Payments</a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out-alt"></i> Admin logout</a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info" style="background-color: chocolate; border: 0px">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <div class="container">
            <h2 class="text-center text-primary"><?php echo @$_GET['logged_in']?></h2>
            <?php
            if(isset($_GET['insert_item'])){
                include ('insert_item.php');
            }
            else if(isset($_GET['view_items'])){
                include ('view_items.php');
            }
            else if(isset($_GET['edit_item'])){
                include ('edit_item.php');
            }
            else if(isset($_GET['del_item'])){
                include ('del_item.php');
            }
            else if(isset($_GET['view_categories'])){
                include ('view_categories.php');
            }
            else if(isset($_GET['insert_category'])){
                include ('insert_category.php');
            }
            else if(isset($_GET['edit_cat'])){
                include ('edit_cat.php');
            }
            else if(isset($_GET['del_cat'])){
                include ('del_cat.php');
            }
            else if(isset($_GET['view_customers'])){
                include ('view_customers.php');
            }
            else if(isset($_GET['del_customer'])){
                include ('del_customer.php');
            }
            ?>
        </div>
    </div>
</div>
<script src="../js/jquery-3.3.1.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</script>
</body>
</html>