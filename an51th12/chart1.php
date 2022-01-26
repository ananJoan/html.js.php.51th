<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_SESSION["id"];
    $row=mysqli_query($db,"SELECT * FROM `question` WHERE `askid` LIKE '$id' ORDER BY `num` ASC");
    $ar1=array();
    while($arr=mysqli_fetch_array($row)){
        $ar1=array();
        array_push($ar1,$arr[3]);
        array_push($ar1,$arr[1]);
        array_push($ar1,$arr[5]);
        if($arr[5]=="是非題"){
            array_push($ar1,"是");
            array_push($ar1,"否");
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '是非題' AND `a1` LIKE 'T'");
            $arr1=mysqli_num_rows($row1);
            $row2=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '是非題' AND `a1` LIKE 'F'");
            $arr2=mysqli_num_rows($row2);
            array_push($ar1,$arr1);
            array_push($ar1,$arr2);
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
        }else if($arr[5]=="多選題"){
            if($arr[6]!=""){
                array_push($ar1,$arr[6]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '多選題' AND `a1` LIKE '$arr[6]'");
                $a1=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a1=0;
            }
            if($arr[7]!=""){
                array_push($ar1,$arr[7]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '多選題' AND `a2` LIKE '$arr[7]'");
                $a2=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a2=0;
            }
            if($arr[8]!=""){
                array_push($ar1,$arr[8]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '多選題' AND `a3` LIKE '$arr[8]'");
                $a3=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a3=0;
            }
            if($arr[9]!=""){
                array_push($ar1,$arr[9]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '多選題' AND `a4` LIKE '$arr[9]'");
                $a4=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a4=0;
            }
            if($arr[10]!=""){
                array_push($ar1,$arr[10]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '多選題' AND `a5` LIKE '$arr[10]'");
                $a5=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a5=0;
            }
            if($arr[11]!=""){
                array_push($ar1,$arr[11]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '多選題' AND `a6` LIKE '$arr[11]'");
                $a6=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a6=0;
            }
            array_push($ar1,$a1);
            array_push($ar1,$a2);
            array_push($ar1,$a3);
            array_push($ar1,$a4);
            array_push($ar1,$a5);
            array_push($ar1,$a6);
        }else if($arr[5]=="單選題"){
            if($arr[6]!=""){
                array_push($ar1,$arr[6]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '單選題' AND `a1` LIKE '$arr[6]'");
                $a1=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a1=0;
            }
            if($arr[7]!=""){
                array_push($ar1,$arr[7]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '單選題' AND `a2` LIKE '$arr[7]'");
                $a2=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a2=0;
            }
            if($arr[8]!=""){
                array_push($ar1,$arr[8]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '單選題' AND `a3` LIKE '$arr[8]'");
                $a3=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a3=0;
            }
            if($arr[9]!=""){
                array_push($ar1,$arr[9]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '單選題' AND `a4` LIKE '$arr[9]'");
                $a4=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a4=0;
            }
            if($arr[10]!=""){
                array_push($ar1,$arr[10]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '單選題' AND `a5` LIKE '$arr[10]'");
                $a5=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a5=0;
            }
            if($arr[11]!=""){
                array_push($ar1,$arr[11]);
                $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '單選題' AND `a6` LIKE '$arr[11]'");
                $a6=mysqli_num_rows($row1);
            }else{
                array_push($ar1,"");
                $a6=0;
            }
            array_push($ar1,$a1);
            array_push($ar1,$a2);
            array_push($ar1,$a3);
            array_push($ar1,$a4);
            array_push($ar1,$a5);
            array_push($ar1,$a6);
        }else{
            $aaa="";
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            $row1=mysqli_query($db,"SELECT * FROM `responsed` WHERE `askid` LIKE '$id' AND `qnum` LIKE '$arr[3]' AND `types` LIKE '問答題'");
            while($arr1=mysqli_fetch_array($row1)){
                $aaa=$aaa.$arr1[4]."<br>";
            }
            array_push($ar1,$aaa);
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
            array_push($ar1,"");
        }
        echo json_encode($ar1)."#@@#";
    }
?>


