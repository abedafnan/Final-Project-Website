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
    <title>Update Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../cp_style.css">
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
</head>
<body>

<?php
include "header.php";
include "../DBConnection.php";

if (isset($_POST['submit'])) {
    // Loop on the submitted elements and delete them
    for (reset($_POST); $k = key($_POST); next($_POST)) {
        echo $_POST[$k];
        $query = $mysqli->prepare("DELETE FROM products WHERE id = ?");
        $query->bind_param("i", $_POST[$k]);
        $result = $query->execute();
    }

    if ($result === false) {
        die("Couldn't Delete Product.. " . $mysqli->error);
    } else { ?>
        <script type="text/javascript"> alert('Product was deleted successfully'); </script>
    <?php }
}

// Query all products' info from the database to put into the table
$query = $mysqli->prepare("SELECT * FROM products");
$query->execute();
$result = $query->get_result();
?>

<div class="row" style="margin-top: 160px">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <h2>Delete Product</h2>
    </div>
</div>
<form class="form-inline" action="#" method="post" style="margin-top: 30px">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            <th scope="col">Discount</th>
            <th scope="col">Image</th>
            <th scope="col">Category-ID</th>
            <th scope="col">To-Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <th scope="row"><?php echo $row['id'] ?></th>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['type']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['discount']?></td>
                <td><?php echo $row['img']?></td>
                <td><?php echo $row['catg_id']?></td>
                <td>
                    <div class="form-check">
                        <!--elements to be deleted are checked and submitted-->
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
    <button type="submit" name="submit" class="btn btn-start-order" style="margin-right: auto; margin-left: auto">Delete Product</button>
</form>
</body>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../styles/bootstrap4/popper.js"></script>
<script src="../../styles/bootstrap4/bootstrap.min.js"></script>
</html>
