<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_GET["id"];
    $row=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id'");
    $eee=date("Y-m-d-H-i-s");
 $fp = fopen("www.txt", "w");
while($arr=mysqli_fetch_array($row)){
     fputcsv($fp, $arr);
}

 fclose($fp);
?>