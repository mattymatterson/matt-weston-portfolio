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

$message = $_POST['data'];
//$time = "The time is now";
$query = "insert into chat(chat_id,message, chat_from, chat_to, time) values ( nextval('chat_id_seq'), 'Hello world', 1 , '0', 2:30);";
$result = $db->query($query);

$db = pg_connect("host=ec2-107-20-191-76.compute-1.amazonaws.com port=5432 dbname=dc2ibd1t6ecgng user=kjuxctiwjuizkv password=f0e911e4e4cf90720283e28d02c0f26080d675133f65969fa30abad47e18f582");
//$query = "INSERT INTO chat VALUES ('nextval('chat_id_seq')','$_POST[data]','$_SESSION['user_id'], '0', '2:30');";
$query = "INSERT INTO chat VALUES (nextval('chat_id_seq')," . $_POST['data'] . ",'1', '0', '2:30');";
$result = pg_query($query); 

/*
$time = date("h:i:sa");
$date = date("Y-m-d");
$DateTime = $date . " " . $time;

$query = "insert into chat(
	chat_id,
	message,
	chat_from,
	chat_to,
	time
	)
values (
	nextval('chat_id_seq'),
	$message,
	$_SESSION['user_id'],
	'0',
	$timeDate
);"
*/
?>
