<?php
session_start();

$_SESSION['username'] = null;
$_SESSION['active'] = null;
$_SESSION['start'] = null;
$_SESSION['expire'] = null;
session_destroy();
header("Location: login.html");

?>
