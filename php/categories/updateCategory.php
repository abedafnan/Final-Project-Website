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
    <link rel="stylesheet" type="text/css" href="../cp_style.css">
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include "header.php";
include "../DBConnection.php";
$name = null;
$path = null;
$desc = null;
$disabled = 1;

if (isset($_GET['search'])) {
    $query = $mysqli->prepare("SELECT * FROM categories WHERE id = ?");
    $query->bind_param("i", $_GET['id']);
    $query->execute();

    $result = $query->get_result();
    if ($row = $result->fetch_assoc()) {
        // store the id in session to use it in the update statement
        $_SESSION['id'] = $_GET['id'];
        // store queried values in variables to show in input fields
        $name = $row['name'];
        $desc = $row['description'];
        $path = $row['path'];
        // Change the disabled state to enable editing fields
        $disabled = 0;

    } else { ?>
        // Show alert if the id searched for doesn't exist
        <script type="text/javascript"> alert("ID Doesn't Exist!"); </script>

    <?php }
} if (isset($_POST['submit'])) {
    $query = $mysqli->prepare("UPDATE categories SET name = ?, description = ?, path = ? WHERE id = ?");
    $query->bind_param("sssi", $_POST['name'], $_POST['desc'], $_POST['path'], $_SESSION['id']);
    $result = $query->execute();

    if ($result === false) {
        die("Couldn't Update Category.. " . $mysqli->error);
    } else { ?>
        <script type="text/javascript"> alert('Category was updated successfully'); </script>
    <?php }
} ?>

<div class="container" style="margin-top: 160px">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>Update Category</h2>
        </div>
    </div>
    <!--Search Section Start-->
    <div class="container">
        <form class="form-inline" action="#" method="GET" role="form" style="margin-top: 30px">
            <label for="searchId" class="mb-2 mr-sm-2" style="margin-left: auto">Category ID:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="searchId" placeholder="Enter Search ID.."
                   name="id" style="width: 300px">
            <button type="submit" name="search" class="btn btn-primary mb-2 search_button">Search</button>
        </form>
    </div>
    <!--Search Section Start-->
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3">
            <form id="contact-form" class="form" action="#" method="POST" role="form">

                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <?php if ($disabled) { ?>
                        <input type="text" class="form-control" id="name" name="name" placeholder="category name"
                               tabindex="1" required disabled>
                    <?php } else { ?>
                        <input type="text" class="form-control" id="name" name="name" placeholder="category name"
                               tabindex="1" required value="<? echo $name ?>">
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="path">Image Path</label>
                    <?php if ($disabled) { ?>
                        <input type="text" class="form-control" id="path" name="path" placeholder="category image path"
                               tabindex="2" required disabled>
                    <?php } else { ?>
                        <input type="text" class="form-control" id="path" name="path" placeholder="category image path"
                               tabindex="2" required value="<? echo $path ?>">
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="desc">Description</label>
                    <?php if ($disabled) { ?>
                        <textarea rows="5" cols="50" name="desc" class="form-control" id="desc"
                                  placeholder="Category Description..." tabindex="4" required disabled></textarea>
                    <?php } else { ?>
                        <textarea rows="5" cols="50" name="desc" class="form-control" id="desc"
                                  placeholder="Category Description..." tabindex="4"
                                  required><? echo $desc ?></textarea>
                    <?php } ?>
                </div>

                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-start-order">Update Category</button>
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
