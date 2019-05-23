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
    <title>Update Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="ctg_style.css">
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>Update Category</h2>
        </div>
    </div>
    <!--Search Section Start-->
    <div class="container">
        <form class="form-inline" action="" style="margin-top: 30px">
            <label for="searchId" class="mb-2 mr-sm-2" style="margin-left: auto">Category ID:</label>
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
                    <input type="text" class="form-control" id="name" name="name" placeholder="category name"
                           tabindex="1" required disabled>
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Image Path</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="category image path"
                           tabindex="2" required disabled>
                </div>
                <div class="form-group">
                    <label class="form-label" for="message">Description</label>
                    <textarea rows="5" cols="50" name="message" class="form-control" id="message"
                              placeholder="Category Description..." tabindex="4" required disabled></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-start-order">Update Category</button>
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