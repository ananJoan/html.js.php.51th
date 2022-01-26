<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $_SESSION["id"]=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改</title>
</head>
<body>
    <a href="hope.php">需答</a>
    <a href="inv.php">邀請</a>
    <a href="page.php">頁題</a>
</body>
</html>