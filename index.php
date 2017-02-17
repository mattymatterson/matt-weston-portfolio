<?php
$dsn = "pgsql:"
    . "host=ec2-107-20-191-76.compute-1.amazonaws.com;"
    . "dbname=dc2ibd1t6ecgng;"
    . "user=kjuxctiwjuizkv;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=f0e911e4e4cf90720283e28d02c0f26080d675133f65969fa30abad47e18f582";

$db = new PDO($dsn);
$query = "selet * from users";

$result = $db->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row["user_id"] . "</td>";
    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["password"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["firstname"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["lastname"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
    echo "</tr>";
}
?>

























<?php
//header("Location:mainpage.php");
?>
