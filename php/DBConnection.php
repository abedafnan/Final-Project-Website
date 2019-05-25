<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/23/2019
 * Time: 4:33 PM
 */

// Establishing connection to the database
$mysqli = new mysqli("localhost", "root", "root", "shopping_system");
if (!$mysqli) {
    die("Connection Error! " . mysqli_connect_error());
}