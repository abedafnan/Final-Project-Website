<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/23/2019
 * Time: 4:33 PM
 */

// Establishing connection to the database
$con = mysqli_connect("localhost", "root", "root", "shopping_system");
if (!$con) {
    die("Connection Error! " . mysqli_connect_error());
}