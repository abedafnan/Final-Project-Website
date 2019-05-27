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
    <title>Add Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../cp_style.css">
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
</head>
<body>

<?php include "header.php" ?>

<div class="container" style="margin-top: 160px">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>Add Category</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
            <form id="contact-form" class="form" action="#" method="POST" role="form">
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="category name"
                           tabindex="1" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="img_path">Image Path</label>
                    <input type="text" class="form-control" id="img_path" name="path" placeholder="category image path"
                           tabindex="2" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="catg_desc">Description</label>
                    <textarea rows="5" cols="50" name="desc" class="form-control" id="catg_desc"
                              placeholder="Category Description..." tabindex="4" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-start-order">ADD CATEGORY</button>
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
    $query = $mysqli->prepare("INSERT INTO categories(name, description, path) VALUES (?,?,?)");
    $newName = htmlspecialchars($name);
    $newDesc = htmlspecialchars($desc);
    $newPath = htmlspecialchars($path);
    $query->bind_param("sss", $newName, $newDesc, $newPath);
    $result = $query->execute();

    if ($result === false) {
        die("Couldn't Insert Category.. " . $mysqli->error);
    } else { ?>
        <script type="text/javascript"> alert('New category was inserted successfully'); </script>
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
