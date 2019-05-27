<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/24/2019
 * Time: 12:16 AM
 */

session_start();
require_once("../check_logged_in.php");
check_logged_in();
?>
<html>
<head>
    <title>Add Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../cp_style.css">
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
</head>
<body>

<?php
include "header.php";
include "../DBConnection.php";

// Query all categories' info from the database to put into the table
$query = $mysqli->prepare("SELECT id, name FROM categories");
$query->execute();
$result = $query->get_result();
?>

<div class="container" style="margin-top: 160px">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>Add Product</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
            <form id="contact-form" class="form" action="#" method="POST" role="form">
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="product name"
                           tabindex="1" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="price">Price($)</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="product price"
                           tabindex="2" required>
                </div>
                <div class="form-group">
                    <label class="form-label" style="margin-bottom: 5px">Type</label>
                    <div class="form-check" style="padding-left: 20px;">
                        <input type="radio" class="form-check-input" id="type" name="type" value="normal" checked>
                        <label class="form-check-label" for="type">Normal</label>
                    </div>
                    <div class="form-check" style="padding-left: 20px;">
                        <input type="radio" class="form-check-input" id="type2" name="type" value="discount">
                        <label class="form-check-label" for="type2">Discount</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="disc">Discount(%)</label>
                    <input type="text" class="form-control" id="disc" name="discount" placeholder="price discount"
                           tabindex="2">
                </div>
                <div class="form-group">
                    <label class="form-label" for="img">Image</label>
                    <input type="text" class="form-control" id="img" name="img" placeholder="image path"
                           tabindex="2" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="catg_ids">Category</label>
                    <select class="browser-default custom-select" id="catg_ids" name="catg_id" style="width: 500px">
                        <option value="select" selected>select category</option>

                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php } ?>

                    </select>
                    <?php if (isset($_POST['submit']) and !strcmp($_POST['catg_id'], "select")) { ?>
                        <span style="color: #fe4c50">* Must Choose Category!</span>
                    <? die(); } ?>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-start-order">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
include "../DBConnection.php";
extract($_POST);

if (isset($_POST['submit'])) {
    $query = $mysqli->prepare("INSERT INTO products(name, type, price, discount, img, catg_id) VALUES (?,?,?,?,?,?)");
    $newName = htmlspecialchars($name);
    $newType = htmlspecialchars($type);
    $newImg = htmlspecialchars($img);
    $query->bind_param("ssddsi", $newName,$newType , $price, $discount, $newImg, $catg_id);
    $result = $query->execute();

    if ($result === false) {
        die("Couldn't Insert Product.. " . $mysqli->error);
    } else { ?>
        <script type="text/javascript"> alert('New Product was inserted successfully'); </script>
    <?php }
} ?>

<script>
    $(document).ready(function() {
        // Test for placeholder support
        $.support.placeholder = (function(){
            var i = document.createElement('input');
            return 'placeholder' in i;
        })();

        // Hide labels by default if placeholders are supported
        if($.support.placeholder) {
            $('.form-label').each(function(){
                $(this).addClass('js-hide-label');
            });

            // Code for adding/removing classes here
            $('.form-group').find('input, textarea').on('keyup blur focus', function(e){

                // Cache our selectors
                var $this = $(this),
                    $label = $this.parent().find("label");

                switch(e.type) {
                    case 'keyup': {
                        $label.toggleClass('js-hide-label', $this.val() == '');
                    } break;
                    case 'blur': {
                        if( $this.val() == '' ) {
                            $label.addClass('js-hide-label');
                        } else {
                            $label.removeClass('js-hide-label').addClass('js-unhighlight-label');
                        }
                    } break;
                    case 'focus': {
                        if( $this.val() !== '' ) {
                            $label.removeClass('js-unhighlight-label');
                        }
                    } break;
                    default: break;
                }
            });
        }
    });
</script>
