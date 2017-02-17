<?php
$user = "kjuxctiwjuizkv";
$pass = "f0e911e4e4cf90720283e28d02c0f26080d675133f65969fa30abad47e18f582";
# This function reads your DATABASE_URL config var and returns a connection
# string suitable for pg_connect. Put this in your app.
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["postgres://kjuxctiwjuizkv:f0e911e4e4cf90720283e28d02c0f26080d675133f65969fa30abad47e18f582@ec2-107-20-191-76.compute-1.amazonaws.com:5432/dc2ibd1t6ecgng"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());
$result = pg_query($pg_conn, "SELECT * FROM users WHERE username='matt';");

print "<pre>\n";
if (!pg_num_rows($result)) {
  print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
} else {
  print "Tables in your database:\n";
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
print "\n";

//header("Location:mainpage.php");
?>
