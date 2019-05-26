<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/23/2019
 * Time: 3:51 PM
 */

session_start();
if(!isset($_SESSION['logged_in'])) {
    header("location:../login-register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Colo Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
    <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/responsive.css">
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
                        <div class="top_nav_left">Welcome <?php echo $_SESSION['username']; ?>,
                            <?php
                            $year = 31536000 + time();
                            // If the cookie isn't set, set it with the current time
                            if (!isset($_COOKIE['lastVisit'])) {
                                //this adds one year to the current time, for the cookie expiration
                                setcookie('lastVisit', time(), $year);
                                echo "This is your first visit!";

                            } else {
                                // If it is set, retrieve the time of the last visit
                                $last = $_COOKIE['lastVisit'];

                                // Format the retrieved time and view it in the main page
                                $datetimeFormat = 'Y-m-d H:i:s';
                                $date = new \DateTime('now', new \DateTimeZone('Asia/Gaza'));
                                $date->setTimestamp($last);
                                echo "You last visited in " . $date->format($datetimeFormat);
                            }
                            ?> </div>
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
                                        <li><a href="categories/viewCategories.php" style="text-transform: capitalize">View</a></li>
                                        <li><a href="categories/addCategory.php" style="text-transform: capitalize">Add</a></li>
                                        <li><a href="categories/updateCategory.php" style="text-transform: capitalize">Update</a></li>
                                        <li><a href="categories/deleteCategory.php" style="text-transform: capitalize">Delete</a></li>
                                    </ul>
                                </li>
                                <li class="language">
                                    <a href="#">
                                        Products
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="language_selection">
                                        <li><a href="products/viewProducts.php">View</a></li>
                                        <li><a href="products/addProduct.php">Add</a></li>
                                        <li><a href="products/updateProduct.php">Update</a></li>
                                        <li><a href="products/deleteProduct.php">Delete</a></li>
                                    </ul>
                                </li>
                                <li class="account">
                                    <a href="#">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li>
                                            <form method="get" action="#">
                                                <button type="submit" name="logout">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i>Sign Out
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_GET['logout'])) {
            // set the current time for the lastVisit cookie
            setcookie('lastVisit', time(), $year);
            session_destroy();
            header("location:../login-register.php");
        }
        ?>

        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="#">colo<span>shop</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="#">home</a></li>
                                <li><a href="#">shop</a></li>
                                <li><a href="#">promotion</a></li>
                                <li><a href="#">pages</a></li>
                                <li><a href="#">blog</a></li>
                                <li><a href="../contact.html">contact</a></li>
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
                        <li><a href="categories/viewCategories.php">View Categories</a></li>
                        <li><a href="categories/addCategory.php">Add Category</a></li>
                        <li><a href="categories/updateCategory.php">Update Category</a></li>
                        <li><a href="categories/deleteCategory.php">Delete Category</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        Products
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="products/viewProducts.php">View Products</a></li>
                        <li><a href="products/addProduct.php">Add Product</a></li>
                        <li><a href="products/updateProduct.php">Update Product</a></li>
                        <li><a href="products/deleteProduct.php">Delete Product</a></li>
                    </ul>
                </li>
                <li class="menu_item has-children">
                    <a href="#">
                        My Account
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="menu_selection">
                        <li><a href="../login-register.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Sign
                                Out</a></li>
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

    <!-- Slider -->

    <div class="main_slider" style="background-image:url(../images/slider_1.jpg)">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6>Spring / Summer Collection 2017</h6>
                        <h1>Get up to 30% Off New Arrivals</h1>
                        <div class="red_button shop_now_button"><a href="#">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Our Products</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                                data-filter="*">all
                            </li>

                            <?php include "DBConnection.php";

                            // Query all categories' name from the database
                            $query = $mysqli->prepare("SELECT name FROM categories");
                            $query->execute();
                            $result = $query->get_result();

                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <!--Use the fetched category name as a filter for filtering products-->
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                                    data-filter=".<?php echo $row['name'] ?>"><?php echo $row['name'] ?>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid"
                         data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        <?php
                        // Query all products' info from the database to view them in the main page
                        $query1 = $mysqli->prepare("SELECT * FROM products");
                        $query1->execute();
                        $result1 = $query1->get_result();

                        while ($row1 = $result1->fetch_assoc()) {

                            // Query all categories' id/name from the database
                            $query2 = $mysqli->prepare("SELECT id, name FROM categories");
                            $query2->execute();
                            $result2 = $query2->get_result();
                            while ($row2 = $result2->fetch_assoc()) {
                                // check if the catg_id is the same as the id queried from the categories table
                                if ($row1['catg_id'] == $row2['id']) {
                                    ?>
                                    <!--put the category name as a filter for the product-->
                                    <div class="product-item <?php echo $row2['name'] ?>">
                                    <? }
                            } ?>
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <img src="<?php echo $row1['img'] ?>" alt="product is here">
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="#"><?php echo $row1['name'] ?></a>
                                    </h6>
                                    <div class="product_price">$
                                        <?php
                                        if ($row1['type'] == 'discount') {
                                            $disc_price = $row1['price'] - ($row1['price'] * ($row1['discount'] / 100));
                                            echo $disc_price;
                                            echo "<span>$" . $row1['price'] . "</span>";
                                        } else {
                                            echo $row1['price'];
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div>
                            <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Deal of the week -->

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="../images/deal_ofthe_week.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                    <h2>Best Sellers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product_slider_container">
                        <div class="owl-carousel owl-theme product_slider">

                            <!-- Slide 1 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <img src="../images/product_1.png" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                            <div class="product_price">$520.00<span>$590.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_2.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
                                            <div class="product_price">$610.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_3.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
                                            <div class="product_price">$120.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_4.png" alt="">
                                        </div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
                                            <div class="product_price">$410.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_5.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                            <div class="product_price">$180.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 6 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <img src="../images/product_6.png" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                            <div class="product_price">$520.00<span>$590.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 7 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_7.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
                                            <div class="product_price">$610.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 8 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_8.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
                                            <div class="product_price">$120.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 9 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_9.png" alt="">
                                        </div>
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
                                            <div class="product_price">$410.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 10 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="../images/product_10.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="../single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                            <div class="product_price">$180.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slider Navigation -->

                        <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blogs -->

    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title">
                        <h2>Latest Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row blogs_container">
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(../images/blog_1.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(../images/blog_2.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(../images/blog_3.jpg)"></div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../js/custom.js"></script>
</body>

</html>
