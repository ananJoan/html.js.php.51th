<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $count=$_SESSION["count1"];
    $inv=$_SESSION["inv1"];
    $nm=$_SESSION["name1"];
    $pgN=$_SESSION["pgN"];
    $id=$_SESSION["ID"];
    $users=$_SESSION["us"];
    if(!empty($_POST)){
        $row1=mysqli_query($db,"SELECT * FROM `question` WHERE `invide` LIKE '$inv' ORDER BY `num` ASC");
        while($arr1=mysqli_fetch_array($row1)){
            if($arr1[3]>=$_SESSION["st"]&&$arr1[3]<=$_SESSION["ed"]){
            if($arr1[5]=="是非題"){
                $tf="";
                if(!empty($_POST["TF$arr1[3]"])) $tf=$_POST["TF$arr1[3]"];
                mysqli_query($db,"
                INSERT INTO `responsed`(`invides`, `askid`, `users`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `qnum`, `qtitle`, `types`)
                VALUES ('$inv','$arr1[4]','$users','$tf','','','','','','$arr1[3]','$arr1[1]','$arr1[5]')");
            }else if($arr1[5]=="問答題"){
                $own="";
                if(!empty($_POST["own$arr1[3]"])) $own=$_POST["own$arr1[3]"];
                mysqli_query($db,"
                INSERT INTO `responsed`(`invides`, `askid`, `users`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `qnum`, `qtitle`, `types`)
                VALUES ('$inv','$arr1[4]','$users','$own','','','','','','$arr1[3]','$arr1[1]','$arr1[5]')");
            }else if($arr1[5]=="多選題"){
                $many1="";
                $many2="";
                $many3="";
                $many4="";
                $many5="";
                $many6="";
                if(!empty($_POST["many1$arr1[3]"])) $many1=$_POST["many1$arr1[3]"];
                if(!empty($_POST["many2$arr1[3]"])) $many2=$_POST["many2$arr1[3]"];
                if(!empty($_POST["many3$arr1[3]"])) $many3=$_POST["many3$arr1[3]"];
                if(!empty($_POST["many4$arr1[3]"])) $many4=$_POST["many4$arr1[3]"];
                if(!empty($_POST["many5$arr1[3]"])) $many5=$_POST["many5$arr1[3]"];
                if(!empty($_POST["many6$arr1[3]"])) $many6=$_POST["many6$arr1[3]"];
                mysqli_query($db,"
                INSERT INTO `responsed`(`invides`, `askid`, `users`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `qnum`, `qtitle`, `types`)
                VALUES ('$inv','$arr1[4]','$users','$many1','$many2','$many3','$many4','$many5','$many6','$arr1[3]','$arr1[1]','$arr1[5]')");
            }else if($arr1[5]=="單選題"){
                $many1="";
                $many2="";
                $many3="";
                $many4="";
                $many5="";
                $many6="";
                if(!empty($_POST["one1$arr1[3]"])) $many1=$_POST["one1$arr1[3]"];
                if(!empty($_POST["one2$arr1[3]"])) $many2=$_POST["one2$arr1[3]"];
                if(!empty($_POST["one3$arr1[3]"])) $many3=$_POST["one3$arr1[3]"];
                if(!empty($_POST["one4$arr1[3]"])) $many4=$_POST["one4$arr1[3]"];
                if(!empty($_POST["one5$arr1[3]"])) $many5=$_POST["one5$arr1[3]"];
                if(!empty($_POST["one6$arr1[3]"])) $many6=$_POST["one6$arr1[3]"];
                mysqli_query($db,"
                INSERT INTO `responsed`(`invides`, `askid`, `users`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `qnum`, `qtitle`, `types`)
                VALUES ('$inv','$arr1[4]','$users','$many1','$many2','$many3','$many4','$many5','$many6','$arr1[3]','$arr1[1]','$arr1[5]')");
            }
            }
        }
        if($_SESSION["nwpg"]==$_SESSION["alls"]){
            mysqli_query($db,"INSERT INTO `user`( `invides`, `user`, `askid`) VALUES ('$inv','$users','$id')");
            header("location:manage.php");
        }else{
            $adds1=$_SESSION["nwpg"]+1;
            header("location:pen2.php?nows=$adds1");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <title>問卷填寫</title>
</head>
<body>
    <form action="pen2.php?nows=1" method="post">
    <table border="1" >
    <?php
        $allpgcount=ceil($count/$pgN);
        $_SESSION["alls"]=$allpgcount;
        $nw=$_GET["nows"];
        $scr=(100/$allpgcount)*($nw-1);
        echo "目前%數：$scr%";
        if($nw==1) $sst=$nw-1;
        else $sst=($nw-1)*$pgN;
        $_SESSION["st"]=$sst;
        $_SESSION["ed"]=$sst+$pgN-1;
       
        $row=mysqli_query($db,"SELECT * FROM `question` WHERE `invide` LIKE '$inv' ORDER BY `num` ASC limit $sst,$pgN");
        while($arr=mysqli_fetch_array($row)){
            echo "
                <tr>
                <td rowspan='2'>$arr[3]</td>
                <td>$arr[1]</td>
                </tr>
                <tr><td>";
                if($arr[5]=="是非題"){
                    echo "<input type='radio' name='TF$arr[3]' value='T'>是
                    <input type='radio' name='TF$arr[3]' value='F'>否";
                }else if($arr[5]=="問答題"){
                    echo "<input type='text' name='own$arr[3]' value=''>";
                }else if($arr[5]=="多選題"){
                    if($arr[6]!="") echo "<input type='checkbox' name='many1$arr[3]' value='$arr[6]'>$arr[6]";
                    if($arr[7]!="") echo "<input type='checkbox' name='many2$arr[3]' value='$arr[7]'>$arr[7]";
                    if($arr[8]!="") echo "<input type='checkbox' name='many3$arr[3]' value='$arr[8]'>$arr[8]";
                    if($arr[9]!="") echo "<input type='checkbox' name='many4$arr[3]' value='$arr[9]'>$arr[9]";
                    if($arr[10]!="") echo "<input type='checkbox' name='many5$arr[3]' value='$arr[10]'>$arr[10]";
                    if($arr[11]!="") echo "<input type='checkbox' name='many6$arr[3]' value='$arr[11]'>$arr[11]";
                }else if($arr[5]=="單選題"){
                    if($arr[6]!="") echo "<input type='radio' name='one1$arr[3]' value='$arr[6]'>$arr[6]";
                    if($arr[7]!="") echo "<input type='radio' name='one2$arr[3]' value='$arr[7]'>$arr[7]";
                    if($arr[8]!="") echo "<input type='radio' name='one3$arr[3]' value='$arr[8]'>$arr[8]";
                    if($arr[9]!="") echo "<input type='radio' name='one4$arr[3]' value='$arr[9]'>$arr[9]";
                    if($arr[10]!="") echo "<input type='radio' name='one5$arr[3]' value='$arr[10]'>$arr[10]";
                    if($arr[11]!="") echo "<input type='radio' name='one6$arr[3]' value='$arr[11]'>$arr[11]";
                }
                echo"</td></tr>";"
            ";
        }
    ?>
    </table>
        <?php
            $pgs=$_GET["nows"];
            $_SESSION["nwpg"]=$pgs;
            if($pgs==$allpgcount){
                echo "<input type='submit' value='確認' >";
            }else echo "<input type='submit' value='下一頁' >";
        ?>
    </form>
</body>
</html>
<script>
    if(window.screen.width<=411){  
        $(window).attr('location','pen3.php?nows=1');
    }
</script>

