<?php                              
    session_start();                                
    $db=mysqli_connect("localhost","admin","1234","an51th12");                              
    mysqli_query($db,"SET NAMES UTF8");                            
    $id=$_GET["id"];                                
?>                              
<!DOCTYPE html>                            
<html lang="en">                                
<head>                              
<meta charset="UTF-8">                              
<meta http-equiv="X-UA-Compatible" content="IE=edge">                              
<meta name="viewport" content="width=device-width, initial-scale=1.0">                              
<title>統計文字表</title>            
</head>                            
<body>                              
＜Ｑｕｅｓｔｉｏｎ＞<br>                              
<?php                              
$row=mysqli_query($db,"SELECT * FROM `ask` WHERE `id` LIKE '$id'");                            
$arr=mysqli_fetch_array($row);                              
$row1=mysqli_query($db,"SELECT * FROM `question` WHERE `askid` LIKE '$id' ORDER BY `num` ASC");                            
while($arr1=mysqli_fetch_array($row1)){                            
    if($arr1[5]=="單選題"){                                
        $n=0;                              
        echo "單".",".$arr1[1]." ";                              
        for($i=6;$i<=11;$i++){                              
        if($arr1[$i]!=""){                              
        $n++;                              
        if($n!=1){                              
            echo ",";                              
        }                              
        echo $arr1[$i];                            
        }                      
                                     
        }echo "<br>";  
    }
    else if($arr1[5]=="多選題"){                              
        $n=0;                              
        echo "多".",".$arr1[1]." ";                              
        for($i=6;$i<=11;$i++){                              
            if($arr1[$i]!=""){                              
            $n++;                              
            if($n!=1){                              
                echo ",";                              
            }                              
            echo $arr1[$i];                            
            }                              
        }                              
        echo "<br>";                                
    }
    else if($arr1[5]=="是非題"){                              
        echo "是非".",".$arr1[1]." ";                            
        echo "是,否";                            
        echo "<br>";                                
    }
    else if($arr1[5]=="問答題"){                              
        echo "自".",".$arr1[1]." ";                              
        echo "<br>";                                
    }                              
    }                              
?>                              
＜／Ｑｕｅｓｔｉｏｎ＞<br>                            
＜Ａｎｓ＞<br>                              
<?php                              
$row2=mysqli_query($db,"SELECT * FROM `user` WHERE `askid` LIKE '$id'");                                
while($arr2=mysqli_fetch_array($row2)){                            
$row3=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `users` LIKE '$arr2[2]'");                              
$arr3=mysqli_fetch_array($row3);                                
if($arr3[12]=="單選題"){                              
echo "$arr3[4]"."$arr3[5]"."$arr3[6]"."$arr3[7]"."$arr3[8]"."$arr3[9]";                            
}else if($arr3[12]=="多選題"){                            
echo "$arr3[4] "."$arr3[5] "."$arr3[6] "."$arr3[7] "."$arr3[8] "."$arr3[9] ";                              
}else if($arr3[12]=="是非題"){                            
if($arr3[4]=="T"){                              
echo "是";                              
}else if($arr3[4]=="F"){                                
echo "否";                              
}                              
}else if($arr3[12]=="問答題"){                            
echo "$arr3[4]";                                
}                              
}                              
?>                              
<br>＜／Ａｎｓ＞<br>                              
</body>                            
</html>                            
 


