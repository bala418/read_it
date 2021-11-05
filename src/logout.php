<?php


echo "successully logged out";

session_start();
session_destroy();
header("location:login.php");

?>