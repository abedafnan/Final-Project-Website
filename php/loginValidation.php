<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/22/2019
 * Time: 11:53 PM
 */

require "DBConnection.php";

// Query the user from the database
$query = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
$query->bind_param("s", $_POST['username']);
$query->execute();
// Get the query result
$result = $query->get_result();
$row = $result->fetch_assoc();

// Check if the username and password are correct
if ((strcmp($row['username'], $_POST['username']) == 0) and (strcmp($row['password'], $_POST['password']) == 0)) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['logged_in'] = true;

    // Check if the user is an admin
    if ($row['isAdmin'] == 'admin') {
        header("location:php/admin_main.php");
    } else {
        header("location:php/user_main.php");
    }

} else {
    // used to view the error message in login-register.php
    $error = 1;
}

?>