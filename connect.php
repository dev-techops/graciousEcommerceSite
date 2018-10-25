<?php
/*
Author: Nathan Shava
Date created: 15 JUNE 2018
Description: ITEC301 Project
Filename: connect.php

*/

// DB Constants
DEFINE('DB_USER', 'Gracious Web');
DEFINE('DB_PASSWORD', '$U0!c@rGpwD');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'graciousstore');

//Establish database connection to the gracious store DB
$connect = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' . mysqli_connect_error());

?>
