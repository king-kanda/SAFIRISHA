<?php
//kill session.
session_start();

$_SESSION =array();

session_destroy();
header('location:login.php');
exit;
?>