<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/23/2019
 * Time: 3:51 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Colo Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
    <link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="../../styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="../../styles/responsive.css">
</head>

<body style="margin: 0 0 72px 0;">

<div class="super_container">

    <!-- Header -->

    <header class="header trans_300">

        <!-- Top Navigation -->

        <div class="top_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top_nav_left"></div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="top_nav_right">
                            <ul class="top_nav_menu">

                                <!-- Categories / Products / My Account -->

                                <li class="currency">
                                    <a href="#" style="text-transform: capitalize">
                                    Categories
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="currency_selection">
                                        <li><a href="viewCategories.php" style="text-transform: capitalize">View</a></li>
                                        <li><a href="addCategory.php" style="text-transform: capitalize">Add</a></li>
                                        <li><a href="updateCategory.php" style="text-transform: capitalize">Update</a></li>
                                        <li><a href="deleteCategory.php" style="text-transform: capitalize">Delete</a></li>
                                    </ul>
                                </li>
                                <li class="language">
                                    <a href="#">
                                        Products
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="language_selection">
                                        <li><a href="../products/viewProducts.php">View</a></li>
                                        <li><a href="../products/addProduct.php">Add</a></li>
                                        <li><a href="../products/updateProduct.php">Update</a></li>
                                        <li><a href="../products/deleteProduct.php">Delete</a></li>
                                    </ul>
                                </li>
                                <li class="account">
                                    <a href="#">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li><a href="../../login-register.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="../admin_main.php">colo<span>shop</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="../admin_main.php">home</a></li>
                                <li><a href="#">shop</a></li>
                                <li><a href="#">promotion</a></li>
                                <li><a href="#">pages</a></li>
                                <li><a href="#">blog</a></li>
                                <li><a href="#">contact</a></li>
                            </ul>
                            <ul class="navbar_user">
                                <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                <li class="checkout">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="checkout_items" class="checkout_items">2</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="fs_menu_overlay"></div>
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li class="menu_item has-children">
                    <a href="#">
                        Categories
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="viewCategories.php" style="text-transform: capitalize">View</a></li>
                        <li><a href="addCategory.php">Add Category</a></li>
                        <li><a href="updateCategory.php">Update Category</a></li>
                        <li><a href="deleteCategory.php">Delete Category</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        Products
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="../products/viewProducts.php">View Product</a></li>
                        <li><a href="../products/addProduct.php">Add Product</a></li>
                        <li><a href="../products/updateProduct.php">Update Product</a></li>
                        <li><a href="../products/deleteProduct.php">Delete Product</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        My Account
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="../../login-register.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign Out</a></li>
                    </ul>
                </li>
                <li class="menu_item"><a href="#">home</a></li>
                <li class="menu_item"><a href="#">shop</a></li>
                <li class="menu_item"><a href="#">promotion</a></li>
                <li class="menu_item"><a href="#">pages</a></li>
                <li class="menu_item"><a href="#">blog</a></li>
                <li class="menu_item"><a href="#">contact</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../styles/bootstrap4/popper.js"></script>
<script src="../../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../../plugins/easing/easing.js"></script>
<script src="../../js/custom.js"></script>
</body>

</html>
