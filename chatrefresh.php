<?php
session_start();
$_SESSION[chat_id];
$result = array("time", "name", "message");
//$response = "time name","message";

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($result));
fclose($fp);
?>
