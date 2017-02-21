<?php
session_start();

$result = array("time", "name", "message");
//$response = "time name","message";

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($result));
fclose($fp);
?>
