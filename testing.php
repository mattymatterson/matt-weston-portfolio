<?php

$json[] = "Hello";
$json[] = "World";

$json[] = "Stuff";

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($json[0]);
fclose($fp);
?>
