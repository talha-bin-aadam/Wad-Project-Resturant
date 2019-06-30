<!DOCTYPE html>

<?php
require "server/functions.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>menu</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<div class="menu-bar">
    <!--    <div class="container">-->
    <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm">
        <a class="navbar-brand" href="index.php"><img src="media/logo.png" style="width: 200px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <!--        <span class="navbar-toggler-icon"></span>-->
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto text-right">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="table.php">Book a Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--    </div>-->
</div>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <ul class="list-unstyled components">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle nav-link">
                    <i class="fas fa-sitemap"></i>
                    Categories
                </a>
                <ul class="collapse show list-unstyled" id="homeSubmenu">
                    <?php getCats(); ?>
                </ul>
            </li>
        </ul>
    </nav>
    <article id="content" class="container-fluid bg-white">
        <div class="row">
            <?php getitems(); ?>
        </div>
    </article>
</div>

<div class ="menu">
    <h1> Food taste better when you eat with your family</h1>
    <h3>veg,non-veg and all kind of snacks are available</h3>
    <div class =category>
        <div class =thai>
            <img src="media/thai.jpg">
            <h4>Thai tanic</h4>
            <p>Thailand’s food needs little introduction.
                From San Francisco to Sukhothai, its profusion of exotic flavours and fragrances make it among the most coveted of international cuisines.
                As a walk through Bangkok forcefully reminds, these flavours and fragrances are seemingly inexhaustible.

            </p>
        </div>
        <div class =snacks>
            <img src="media/snacks.jpg">
            <h4>Evening Snacks</h4>
            <p>Consider this your one-stop shop for the newest and most innovative snacks that you’ve never heard of.
                You haven’t heard of them (yet!) because they’re totally new products made by a small family-owned company in pakistan that specializes in finding holes in the market and filling them.
                That’s how we bring you the latest and greatest trends in snack time — time and time again.</p>
        </div>
        <div class="grill">
            <img src="media/grill.jpg">
            <h4>Gochew Grill</h4>
            <p>
                The best part of healthy grilling recipes? There’s no need to make the same boring dishes over and over again.
                Skip the hot dogs and overcooked burger patties and try some of these delicious grilled recipes instead.
            </p>
        </div>
    </div>


</div>
<a href="#"><button class = btn >Read More</button></a>
<div class="video">
    <center><iframe width="560" height="315" src="https://www.youtube.com/embed/sg9H2x00wyg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
</div>


<div class="row container-fluid footer">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
        <h1> About Us </h1>
        <a href="index.php"><img src="media/logo.png" style="width: 200px"></a>
        <p> © 2019 developed by <b>Talha Bin Adam</b> and <b>Zeeshan Sabir</b>. All Rights Reserved.</p>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
        <h1> Links </h1>
        <div>
            <ul style="list-style-type: none">
                <li>
                    <a class="nav-link active" href="index.php">Home </a>
                </li>
                <li>
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li>
                    <a class="nav-link" href="menu.php">menu</a>
                </li>
                <li>
                    <a class="nav-link" href="table.php">Book a Table</a>
                </li>
                <li>
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li>
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
        <h1> Follow Us </h1>
        <a href="https://www.facebook.com/">
            <i class="fab fa-facebook-f"></i>
        </a>facebook
        <br><br>
        <a href="https://www.twitter.com">
            <i class="fab fa-twitter"></i>
        </a>twitter
        <br><br>
        <a href="https://www.instagram.com">
            <i class="fab fa-instagram"></i>
        </a>instagram
    </div>
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6">
        <h1> Contact Us </h1>
        <i class="far fa-envelope"></i> Email:
        <p> foodfactory@ff.com.pk</p>
        <i class="fas fa-phone"></i> phone:
        <p> 03330478220 <br> 03164664268 </p>
        <i class="fas fa-map-marker-alt"></i> Address:
        <p> <b>FOOD FACTORY</b>, liberty market, main gulbarg, lahore</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>