<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    if(!empty($_POST)){
        $a=$_POST["a"];
        $b=$_POST["b"];
        $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE `account` LIKE '$a' AND `password` LIKE '$b'");
        $arr=mysqli_fetch_array($row);
        if(!empty($arr[0])){
            header("location:xyz.html");
        }else{
            echo"帳號或密碼錯誤";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
</head>
<body>
    <form action="index.php" method="post">
    帳號：<input type="text" name="a">
    密碼：<input type="password" name="b">
    <input type="submit" value="登入">
    </form>
</body>
</html>