<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $count=$_SESSION["count"];
    $inv=$_SESSION["inv"];
    $nm=$_SESSION["name"];
    if(!empty($_POST)){
        $row=mysqli_query($db,"SELECT * FROM ask WHERE `invide` LIKE '$inv'");
        $arr=mysqli_fetch_array($row);
        for($i=0;$i<$count;$i++){
            $qus=$_POST["qus$i"];
            $typ=$_POST["typ$i"];
            if($typ=="多選題"){
                if($_POST["many1$i"]!="") $c1=$_POST["many1$i"];
                else $c1="";
                if($_POST["many2$i"]!="") $c2=$_POST["many2$i"];
                else $c2="";
                if($_POST["many3$i"]!="") $c3=$_POST["many3$i"];
                else $c3="";
                if($_POST["many4$i"]!="") $c4=$_POST["many4$i"];
                else $c4="";
                if($_POST["many5$i"]!="") $c5=$_POST["many5$i"];
                else $c5="";
                if($_POST["many6$i"]!="") $c6=$_POST["many6$i"];
                else $c6="";
            }else if($typ=="是非題"){
                $c1="是";
                $c2="否";
                $c3="";
                $c4="";
                $c5="";
                $c6="";
            }else if($typ=="單選題"){
                if($_POST["one1$i"]!="") $c1=$_POST["one1$i"];
                else $c1="";
                if($_POST["one2$i"]!="") $c2=$_POST["one2$i"];
                else $c2="";
                if($_POST["one3$i"]!="") $c3=$_POST["one3$i"];
                else $c3="";
                if($_POST["one4$i"]!="") $c4=$_POST["one4$i"];
                else $c4="";
                if($_POST["one5$i"]!="") $c5=$_POST["one5$i"];
                else $c5="";
                if($_POST["one6$i"]!="") $c6=$_POST["one6$i"];
                else $c6="";
            }else if($typ=="問答題"){
                $c1="";
                $c2="";
                $c3="";
                $c4="";
                $c5="";
                $c6="";
            }
            mysqli_query($db,"INSERT INTO `question`( `name`, `invide`, `num`, `askid`, `types`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`)
            VALUES ('$qus','$inv','$i','$arr[0]','$typ','$c1','$c2','$c3','$c4','$c5','$c6')");
            header("location:manage.php");
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
    <title>問卷管理</title>
</head>
<body>
    <form action="add2.php" method="post">
    <table border="1">
    <?php
        for($i=0;$i<$count;$i++){  
            echo "
            <tr>
            <td rowspan='3'>$i</td>
            <td>
                <input type='radio' name='typ$i' class='typs' value='多選題' checked>未設定
                <input type='radio' name='typ$i' class='typs' value='是非題'>是非題
                <input type='radio' name='typ$i' class='typs' value='單選題'>單選題
                <input type='radio' name='typ$i' class='typs' value='多選題'>多選題
                <input type='radio' name='typ$i' class='typs' value='問答題'>問答題
            </td>
            </tr>
            <tr>
                <td>題目：<input type='text' name='qus$i'></td>
            </tr>
            <tr>
            <td class='cho$i'>
                    <input type='text' name='many1$i' val='' >
                    <input type='text' name='many2$i' val='' >
                    <input type='text' name='many3$i' val='' ><br>
                    <input type='text' name='many4$i' val='' >
                    <input type='text' name='many5$i' val='' >
                    <input type='text' name='many6$i' val='' >
                </td>
            </tr>
            ";
        }
    ?>
    </table>
    <input type="submit" value="確認" >
    </form>
</body>
</html>
<script>
    $(".typs").change(function(){
        $n=$(".typs").index($(this));
        $n=Math.floor($n/5);
        if($(this).val()=="多選題"){
            $(".cho"+$n+"").html(`
                <input type='text' name='many1`+$n+`' val='' >
                <input type='text' name='many2`+$n+`' val='' >
                <input type='text' name='many3`+$n+`' val='' ><br>
                <input type='text' name='many4`+$n+`' val='' >
                <input type='text' name='many5`+$n+`' val='' >
                <input type='text' name='many6`+$n+`' val='' >
            `);
        }else if($(this).val()=="是非題"){
            $(".cho"+$n+"").html(`
               O是O否
            `);
        }else if($(this).val()=="單選題"){
            $(".cho"+$n+"").html(`
                <input type='text' name='one1`+$n+`' val='' >
                <input type='text' name='one2`+$n+`' val='' >
                <input type='text' name='one3`+$n+`' val='' ><br>
                <input type='text' name='one4`+$n+`' val='' >
                <input type='text' name='one5`+$n+`' val='' >
                <input type='text' name='one6`+$n+`' val='' >
            `);
        }else if($(this).val()=="問答題"){
            $(".cho"+$n+"").html(`
               
            `);
        }
    });
</script>


