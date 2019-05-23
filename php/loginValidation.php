<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/22/2019
 * Time: 11:53 PM
 */

session_start();

require "DBConnection.php";

// Query the user from the database
$query = "SELECT * FROM users WHERE username = '". $_POST['username'] ."'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// Check if the username and password are correct
if ((strcmp($row['username'], $_POST['username']) == 0) and (strcmp($row['password'], $_POST['password']) == 0)) {
    $_SESSION['username'] = $_POST['username'];

    // Check if the user is an admin
    if ($row['isAdmin'] == 'admin') {
        header("location:php/admin_main.php");
    } else {
        header("location:index.html");
    }

} else {
    $error = 1;
    session_destroy();
}

?>