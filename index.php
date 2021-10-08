<?php
    error_reporting(0);
	session_start();
    require 'index.view.php';
    
    /* Handle Errors */
	if ($_GET['error'] == 1) {
        echo 'Please fill out all of the fields!';
    } else if ($_GET['error'] == 2) {
        echo '<br>Your username needs to be at least 6 characters.';
    } else if ($_GET['error'] == 3) {
        echo '<br>Your password needs to be at least 6 characters.';
    } else if ($_GET['error'] == 4) {
        echo "<br>Your password and confirm password don't match!";
    } else if ($_GET['error'] == 5) {
        echo '<br>Your password must contain at least one uppercase letter, one lowercase letter, and a digit.';
    } else if ($_GET['error'] == 6) {
        echo '<br>Something went wrong with the password...';
    }
?>