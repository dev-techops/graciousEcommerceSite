<?php
/**
 * User: Nathan Shava
 * Date: 09-Oct-18
 * Time: 10:17
 */
session_start();
session_unset(); //Unsets all existing sessions
session_destroy(); //Destroys all existing sessions
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/graciousstore/site/welcome.php');
exit;
?>