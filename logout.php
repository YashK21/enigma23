<?php
session_start();

unset($_SESSION['name']);
unset($_SESSION['reg_no']);
session_unset();
session_destroy();
header('location:index.php');
?>