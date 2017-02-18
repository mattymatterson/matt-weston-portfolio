<?php

session start();
session_destroy();
header('Location: login.html');

?>
