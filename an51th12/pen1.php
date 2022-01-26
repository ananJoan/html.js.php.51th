<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    if(!empty($_POST)){
        $inv1=$_POST["inv"];
        $row=mysqli_query($db,"SELECT * FROM ask WHERE invide LIKE '$inv1'");
        $arr=mysqli_fetch_array($row);
        if(!empty($arr)){
            $nm=$arr[2];
            $cn=$arr[3];
            $inv=$inv1;
            $pgN=$arr[6];
            $_SESSION["name1"]=$nm;
            $_SESSION["count1"]=$cn;
            $_SESSION["inv1"]=$inv;
            $_SESSION["pgN"]=$pgN;
            $_SESSION["ID"]=$arr[0];
            $v=["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
            $users="";
            for($i=1;$i<=7;$i++){
                $tps=rand(0,25);
                $users=$users.$v[$tps];
            }
            $_SESSION["us"]=$users;
            $row1=mysqli_query($db,"SELECT * FROM user WHERE `askid` LIKE '$arr[0]'");
            $arr1=mysqli_num_rows($row1);
            if($arr1>=$arr[4]){
                echo "⚠問卷已達到需收集回答數，謝謝您的支持"."<br>";
            }else header("location:pen2.php?nows=1");
        }else{
            echo "⚠邀請碼不存在";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>填卷</title>
</head>
<body>
    <form action="pen1.php" method="post">
    問卷邀請碼：<input type="text" name="inv" style="width: 75px; height: 20px; " ><br>
    <input type="submit" value="確認" style=" width: 120px; height: 30px;">
    </form>
</body>
</html>

