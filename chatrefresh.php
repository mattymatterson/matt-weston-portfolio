<?php
session_start();

$response = "time name","message";

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
?>
