<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/26/2019
 * Time: 12:51 AM
 */

session_start();
require_once("../check_logged_in.php");
check_logged_in();
?>
?>
<html>
<head>
    <title>View Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../cp_style.css">
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap4/bootstrap.min.css">
</head>
<body>

<?php
include "header.php";
include "../DBConnection.php";

// Query all categories' info from the database to view them in table
$query = $mysqli->prepare("SELECT * FROM categories");
$query->execute();
$result = $query->get_result();
?>

<div class="row" style="margin-top: 160px">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <h2>View Categories</h2>
    </div>
</div>

<table class="table" style="margin-top: 30px">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Path</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <th scope="row"><?php echo $row['id'] ?></th>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['path'] ?></td>
            <td><?php echo $row['description'] ?></td>
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

