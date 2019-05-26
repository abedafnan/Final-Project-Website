<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/24/2019
 * Time: 1:11 AM
 */

session_start();
require_once("../check_logged_in.php");
check_logged_in();
?>
<html>
<head>
    <title>Delete Category</title>
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
$query = $mysqli->prepare("SELECT * FROM categories");
$query->execute();
$result = $query->get_result();
?>

<div class="row" style="margin-top: 160px">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <h2>Delete Category</h2>
    </div>
</div>
<form class="form-inline" action="" method="post" style="margin-top: 30px">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Path</th>
            <th scope="col">Description</th>
            <th scope="col">To-Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['path']?></td>
                <td><?php echo $row['description']?></td>
                <td>
                    <div class="form-check">
                        <input type="checkbox" name="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>"
                               class="form-check-input">
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <button type="submit" name="submit" class="btn btn-start-order" style="margin-right: auto; margin-left: auto">Delete Category</button>
</form>
</body>

<?php

if (isset($_POST['submit'])) {
    // Loop on the submitted elements and delete them
    for (reset($_POST); $k = key($_POST); next($_POST)) {
        echo $_POST[$k];
        $query = $mysqli->prepare("DELETE FROM categories WHERE id = ?");
        $query->bind_param("i", $_POST[$k]);
        $result = $query->execute();
    }

    if ($result === false) {
        die("Couldn't Delete Category.. " . $mysqli->error);
    } else { ?>
        <script type="text/javascript"> alert('Category was deleted successfully'); </script>
    <?php }
} ?>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../styles/bootstrap4/popper.js"></script>
<script src="../../styles/bootstrap4/bootstrap.min.js"></script>
</html>
