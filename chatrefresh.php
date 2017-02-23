<?php
session_start();
$dsn = "pgsql:"
    . "host=ec2-107-20-191-76.compute-1.amazonaws.com;"
    . "dbname=dc2ibd1t6ecgng;"
    . "user=kjuxctiwjuizkv;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=f0e911e4e4cf90720283e28d02c0f26080d675133f65969fa30abad47e18f582";
$db = new PDO($dsn);
$query = "select * from chat where chat_to = '0' order by chat_id;";
$result = $db->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $newtime = explode(" ",$row["time"]); //removing the date
    $newtime = substr($newtime[1], 0, -2); //removing AM/PM
    $hours = substr($newtime, 0, 2); //changing from GMT to CST
    $hours = $hours - 6; //changing from GMT to CST
    if ($hours > 24) { $hours = $hours - 24; } //checking to make sure it doesnt have a weird number
    if ($hours < 0) { $hours = 24 + $hours; } //checking to make sure it doesnt have a weird number
    $newtime = $hours . substr($newtime, 2,6); //adding hours to the rest of the string
    if ($row["chat_from"] == "1") {
        $name = "Matt Weston";
    }
    if ($row["chat_from"] == "2") {
        $name = "Quin Carter";
    }
    if ($row["chat_from"] == "3") {
        $name = "Logan McCourry";
    }
    $json[] = $newtime . " " . $name. ": " . $row["message"];
}

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($json,JSON_PRETTY_PRINT));
fclose($fp);
?>
