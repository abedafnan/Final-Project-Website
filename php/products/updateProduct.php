<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/24/2019
 * Time: 1:10 AM
 */
?>
<html>
<head>
    <title>Update Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../cp_style.css">
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "header.php"?>

<div class="container" style="margin-top: 160px">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>Update Product</h2>
        </div>
    </div>
    <!--Search Section Start-->
    <div class="container">
        <form class="form-inline" action="" style="margin-top: 30px">
            <label for="searchId" class="mb-2 mr-sm-2" style="margin-left: auto">Product ID:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="searchId" placeholder="Enter Search ID.."
                   name="id" style="width: 300px">
            <button type="submit" class="btn btn-primary mb-2 search_button">Search</button>
        </form>
    </div>
    <!--Search Section Start-->
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
            <form id="contact-form" class="form" action="#" method="POST" role="form">
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="product name"
                           tabindex="1" required disabled>
                </div>
                <div class="form-group">
                    <label class="form-label" for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="product price"
                           tabindex="2" required disabled>
                </div>
                <div class="form-group">
                    <label class="form-label" style="margin-bottom: 5px">Type</label>
                    <div class="form-check" style="padding-left: 20px;">
                        <input type="radio" class="form-check-input" id="type" name="type" value="normal" disabled>
                        <label class="form-check-label" for="type">Normal</label>
                    </div>
                    <div class="form-check" style="padding-left: 20px;">
                        <input type="radio" class="form-check-input" id="type2" name="type" value="discount" disabled>
                        <label class="form-check-label" for="type2">Discount</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="disc">Discount</label>
                    <input type="text" class="form-control" id="disc" name="discount" placeholder="price discount"
                           tabindex="2" required disabled>
                </div>
                <div class="form-group">
                    <label class="form-label" for="catg_ids">Category</label>
                    <select class="browser-default custom-select" id="catg_ids" name="catg_select" style="width: 500px" disabled>
                        <option selected>select category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-start-order">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

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
