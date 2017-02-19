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
$time = "The time is now";
$query = "insert into chat(chat_id,message, chat_from, chat_to, time) values ( nextval('chat_id_seq'), $message, $_SESSION['user_id'], '0', $time);";
$result = $db->query($query);
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
