<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.html");
} else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="format-detection" content="telephone=no"/>
    <meta charset="UTF-8">
    <title>MattChat</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles\main.css">
    <script src="/js/main.js"></script>
    <link rel="icon" href="images/mwicon.png">
    <script>
    $( document ).ready(function() {
        $("#allchat").click(function(){
            $.post( "chat.php",  { data: "0" }  );
            $("#header-bar").text("All Chat");
        });
        $("#mattweston").click(function(){
            $.post( "chat.php",  { data: "1" }  );
            $("#header-bar").text("Matt Weston");
        });
        $("#quincarter").click(function(){
            $.post( "chat.php",  { data: "2" }  );
            $("#header-bar").text("Quin Carter");
        });
        $("#loganmccourry").click(function(){
            $.post( "chat.php",  { data: "3" }  );
            $("#header-bar").text("Logan McCourry");
        });
        $("#chat-box").scrollTop($("#chat-box")[0].scrollHeight);

    });
</script>
</head>
<body>
<div class="nav-side-menu" id="left-nav">
    <div class="brand" id="Profile"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']?><span class="glyphicon glyphicon-menu-down"></span><span id="collapse-left-navbar" class="glyphicon glyphicon-menu-left"></span></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div id="profileMenu">
        <li><a href="/logout.php">Logout</a></li>
    </div>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li data-toggle="collapse" data-target="#products" class="collapsed active">
                <a href="#"><i class="fa fa-gift fa-lg"></i> Powershell <span class="glyphicon glyphicon-menu-down"></span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li class="active"><a href="/studentScheduleLookup.php">Student Schedule Lookup</a></li>
                <li><a href="#">Option 2</a></li>
                <li><a href="#">Option 3</a></li>
                <li><a href="#">Option 4</a></li>
                <li><a href="#">Option 5</a></li>
                <li><a href="#">Option 6</a></li>
                <li><a href="#">Option 7</a></li>
                <li><a href="#">Option 8</a></li>
                <li><a href="#">Option 9</a></li>
                <li><a href="#">Option 10</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#service" class="collapsed" id="Chats">
                <a href="#"><i class="fa fa-globe fa-lg"></i> Chats <span class="glyphicon glyphicon-menu-down"></span></a>
            </li>
            <ul class="sub-menu collapse" id="service">
                <li><span id="allchat">All Chat</span></li>
            </ul>


            <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fa fa-car fa-lg"></i> Private Message <span class="glyphicon glyphicon-menu-down"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
                <li><span id="mattweston">Matt Weston</span></li>
                <li><span id="quincarter">Quin Carter</span></li>
                <li><span id="loganmccourry">Logan McCourry</span></li>
            </ul>
        </ul>
    </div>
</div>
<div class="container" id="main">
    <div class="row">
        <div class="col-md-12" id="header-bar">
            All Chat
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="chat-box">
                <?php
                $dsn = "pgsql:"
                    . "host=ec2-107-20-191-76.compute-1.amazonaws.com;"
                    . "dbname=dc2ibd1t6ecgng;"
                    . "user=kjuxctiwjuizkv;"
                    . "port=5432;"
                    . "sslmode=require;"
                    . "password=f0e911e4e4cf90720283e28d02c0f26080d675133f65969fa30abad47e18f582";
                $db = new PDO($dsn);
                $query = "select * from chat order by chat_id;";
                $result = $db->query($query);
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $newtime = explode(" ",$row["time"]); //removing the date
                    $newtime = substr($newtime[1], 0, -2); //removing AM/PM
                    $hours = substr($newtime, 0, 2); //changing from GMT to CST
                    $hours = $hours - 6; //changing from GMT to CST
                    if ($hours > 24) { $hours = $hours - 24; } //checking to make sure it doesnt have a weird number
                    if ($hours < 0) { $hours = 24 + $hours; } //checking to make sure it doesnt have a weird number
                    $newtime = $hours . substr($newtime, 2,6); //adding hours to the rest of the string
                    echo "<td>" . htmlspecialchars($newtime . " ") . "</td>";
                    if ($row["chat_from"] == "1") {
                        $name = "Matt Weston";
                    }
                    if ($row["chat_from"] == "2") {
                        $name = "Quin Carter";
                    }
                    if ($row["chat_from"] == "3") {
                        $name = "Logan McCourry";
                    }
                    echo "<td>" . htmlspecialchars($name . ": ") . "</td>";
                    echo "<td>" . htmlspecialchars($row["message"]) . "</td><br>";
                    
                }
                ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="type-bar">
            <input type="text" id="chatType" placeholder="Message Channel.....">
        </div>
    </div>
</div>
</body>
</html>
<?php
       }
?>
