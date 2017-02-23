<?php

$json[] = "Hello";
$json[] = "World";

$json[] = "Stuff";

$fp = fopen('testing.json', 'w');
fwrite($fp, json_encode($json);
fclose($fp);
?>
