<?php
$dsn = "pgsql:"
    . "host=ec2-107-20-191-76.compute-1.amazonaws.com;"
    . "dbname=dc2ibd1t6ecgng;"
    . "user=kjuxctiwjuizkv;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=f0e911e4e4cf90720283e28d02c0f26080d675133f65969fa30abad47e18f582";
$db = new PDO($dsn);

$message = $_POST["data"];

$query = "insert into chat 
?>
