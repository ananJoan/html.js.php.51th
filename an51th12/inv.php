<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_SESSION["id"];
    if(!empty($_POST)){
        $q=$_POST["q"];
        mysqli_query($db,"UPDATE `ask` SET `invide`='$q' WHERE `id` LIKE '$id'");   
        mysqli_query($db,"UPDATE `question` SET `invide`='$q' WHERE `askid` LIKE '$id'");   
        mysqli_query($db,"UPDATE `responsed` SET `invides`='$q' WHERE `askid` LIKE '$id'");   
        mysqli_query($db,"UPDATE `user` SET `invides`='$q' WHERE `askid` LIKE '$id'");   
        header("location:manage.php");
    }
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
    <form action="inv.php" method="post">
    邀請：<input type="text" name="q">
    <input type="submit" value="done">
    </form>
</body>
</html>