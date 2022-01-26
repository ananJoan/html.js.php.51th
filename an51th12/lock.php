<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_GET["id"];
    mysqli_query($db,"UPDATE `ask` SET `locks`='t' WHERE `id` LIKE '$id'");
    header("location:manage.php")
?>