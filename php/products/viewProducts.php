<?php
/**
 * Created by PhpStorm.
 * User: αlphα
 * Date: 5/26/2019
 * Time: 1:00 AM
 */
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
<table class="table" style="margin-top: 30px">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Type</th>
        <th scope="col">Price</th>
        <th scope="col">Discount</th>
        <th scope="col">Image</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td><?php echo $row['name'] ?></td>

            <?php
            // Query all categories' id, name from the database
            $query2 = $mysqli->prepare("SELECT id, name FROM categories");
            $query2->execute();
            $result2 = $query2->get_result();
            while ($row2 = $result2->fetch_assoc()) {
                // if the product's catg_id is the same as the fetched one
                if ($row['catg_id'] == $row2['id']) { ?>
                    <!--view the name of the category-->
                    <td><?php echo $row2['name'] ?></td>
                <? }
            } ?>
            <td><?php echo $row['type'] ?></td>
            <td>$<?php echo $row['price'] ?></td>
            <td><?php echo $row['discount'] ?>%</td>
            <td><?php echo $row['img'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>

<script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../styles/bootstrap4/popper.js"></script>
<script src="../../styles/bootstrap4/bootstrap.min.js"></script>
</html>

