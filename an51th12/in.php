<?php
session_start();
$db=mysqli_connect("localhost","admin","1234","an51th12");
mysqli_query($db,"SET NAMES UTF8");
$id=$_GET["id"];
   $file = fopen("www.csv", "r"); 
   $aa=fgetcsv($file);
   mysqli_query($db,"INSERT INTO `responsed`( `invides`, `askid`, `users`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `qnum`, `qtitle`, `types`)
    VALUES ('$aa[1]','$aa[2]','$aa[3]','$aa[4]','$aa[5]','$aa[6]','$aa[7]','$aa[8]','$aa[9]','$aa[10]','$aa[11]','$aa[12]')");
   fclose($file);
?>
