<?php
/**
 * Created by PhpStorm.
 * User: Afnan A. Abed
 * Date: 5/26/2019
 * Time: 11:31 PM
 */

echo "Welome " . $_SESSION['username'] . ", ";

    $year = 31536000 + time();
// If the cookie isn't set, set it with the current time
if (!isset($_COOKIE['lastVisit'])) {
    //this adds one year to the current time, for the cookie expiration
    setcookie('lastVisit', time(), $year);
    echo "This is your first visit!";

} else {
    // If it is set, retrieve the time of the last visit
    $last = $_COOKIE['lastVisit'];

    // Format the retrieved time and view it in the main page
    $datetimeFormat = 'Y-m-d H:i:s';
    $date = new \DateTime('now', new \DateTimeZone('Asia/Gaza'));
    $date->setTimestamp($last);
    echo "You last visited in " . $date->format($datetimeFormat);
}
?>