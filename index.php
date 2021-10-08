<?php
    error_reporting(0);
	session_start();
    require 'index.view.php';
    
    /* Handle Errors */
	if ($_GET['error'] == 1) {
        echo 'Please fill out all of the fields!';
    };
?>