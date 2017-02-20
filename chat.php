<?php
session_start();
$_SESSION[chat_id] = $_POST['data'];
echo "<script>document.getElementById("chat-box").appendChild("Hello World")</script>";
?>
