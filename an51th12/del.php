<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_GET["id"];
    mysqli_query($db,"DELETE FROM `ask` WHERE `id` LIKE '$id'");
    mysqli_query($db,"DELETE FROM `question` WHERE `askid` LIKE '$id'");
    mysqli_query($db,"DELETE FROM `responsed` WHERE `askid` LIKE '$id'");
    mysqli_query($db,"DELETE FROM `user` WHERE `askid` LIKE '$id'");    
    header("location:manage.php")
?>