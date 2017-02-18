<?php
$username = $_POST['username'];
$password = $_POST['password'];
if (isset($username) && !empty($username)) {
    if (isset($password) && !empty($password)) {
        //query database to make sure that login and password match something
        $dsn = "pgsql:"
            . "host=ec2-107-20-191-76.compute-1.amazonaws.com;"
            . "dbname=dc2ibd1t6ecgng;"
            . "user=kjuxctiwjuizkv;"
            . "port=5432;"
            . "sslmode=require;"
            . "password=f0e911e4e4cf90720283e28d02c0f26080d675133f65969fa30abad47e18f582";

        $db = new PDO($dsn);
        $query = "select * from users where (username='$username' OR email = '$username') and password='$password'";
        $result = $db->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            echo count($row);
        }
        if (count($row['username']) > 0) {
            header('Location: /mainpage.php');
        }
    }
}
?>
