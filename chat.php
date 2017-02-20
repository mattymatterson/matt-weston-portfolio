<?php
session_start();
$_SESSION[chat_id] = $_POST['data'];

$dom = new DOMDocument;
$chatBox = $dom->getElementsById('chat-box');
$chatBox[0].nodeValue = "new content";
?>
