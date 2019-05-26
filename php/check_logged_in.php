<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/27/2019
 * Time: 12:48 AM
 */

/**
 * Check iff the user isn't logged in, go back to the login page
 */
function check_logged_in() {
    if (!isset($_SESSION['logged_in'])) {
        header("location:../../login-register.php");
    }
}

/**
 * Check if the logout button is pressed, do the following actions
 */
function logout() {
    if (isset($_GET['logout'])) {
        // set the current time for the lastVisit cookie
        setcookie('lastVisit', time(), 31536000 + time());
        session_destroy();
        header("location:../../login-register.php");
    }
}

?>