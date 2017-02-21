<?php
session_start();
$_GET["chat_id"]

$response = "time name":"message";

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
?>
