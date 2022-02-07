<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $invides="";
    $v=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    for($i=0;$i<=7;$i++){
        $tp=rand(0,52);
        $invides=$invides.$v[$tp];
    }
    if(!empty($_POST)){
        $a=$_POST["pas"];
        $b=$_POST["acc"];
        $_SESSION["count"]=$a;
        $_SESSION["name"]=$b;
        $_SESSION["inv"]=$invides;
        mysqli_query($db,"INSERT INTO `ask`( `name`, `invide`, `count`, `hope`, `locks`, `page`)
        VALUES ('$b','$invides','$a','100','F','1')");
        header("location:add2.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增問卷</title>
</head>
<body>
<form action="add1.php" method="post">
卷名：<input type="text" name="acc"><br>
題數：<input type="text" name="pas"><br>
<input type="submit" value="確認">
</form>
</body>
</html>


