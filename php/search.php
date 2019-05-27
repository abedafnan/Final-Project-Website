<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/27/2019
 * Time: 10:56 AM
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
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
    <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/responsive.css">
</head>
<body>
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Search Results</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid"
                     data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                    <?php
                    include "DBConnection.php";

                    // Prevent HTML injection
                    $newText = htmlspecialchars($_GET['search_text']);
                    // Query the product info that's been searched for
                    $param = "%{$newText}%";
                    $query = $mysqli->prepare("SELECT * FROM products WHERE name LIKE ?");
                    $query->bind_param("s", $param);
                    $query->execute();
                    $result = $query->get_result();

                    // Check if no results where found
                    if (!($row1 = $result->fetch_assoc())) { ?>
                        <div class="col text-center">
                            <div class="new_arrivals_title">
                                <h2>No results have been found!</h2>
                            </div>
                        </div>
                        <? die();
                    } else {
                        do { ?>
                            <div class="product-item ">
                                <div class="product discount product_filter" style="margin-top: 0">
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
                        } while ($row1 = $result->fetch_assoc());
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>

</html>