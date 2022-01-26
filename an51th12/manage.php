<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <title>清單</title>
</head>
<body>
<input type="button" value="新增問卷" id="add"><input type="button" value="填寫問卷" id="pen">
    <table border="1">
        <tr>
        <th>編號</th>
        <th>名稱</th>
        <th>邀請</th>
        <th>數量</th>
        <th>需答</th>
        <th>頁題</th>
        <th>圖表</th>
        <th>文表</th>
        <th>匯出</th>
        <th>匯入</th>
        <th>鎖定</th>
        <th>刪除</th>
        <th>修改</th>
        </tr>
            <?php
                $row=mysqli_query($db,"SELECT * FROM `ask` WHERE 1");
                while($arr=mysqli_fetch_array($row)){
                    echo"
                    <tr>
                    <td>$arr[0]</td>
                    <td>$arr[1]</td>
                    <td>$arr[2]</td>
                    <td>$arr[3]</td>
                    <td>$arr[4]</td>
                    <td>$arr[6]</td>
                    <td><a href='chart.php?id=$arr[0]'>圖表</a></td>
                    <td><a href='alls.php?id=$arr[0]'>文表</a></td>
                    <td><a href='out.php?id=$arr[0]'>匯出</a></td>
                    <td><a href='in.php?id=$arr[0]'>匯入</a></td>
                    ";
                    if($arr[5]=="F"){
                        echo"
                        <td><a href='lock.php?id=$arr[0]'>鎖定</a></td>
                        <td><a href='del.php?id=$arr[0]'>刪除</a></td>
                        <td><a href='fix.php?id=$arr[0]'>修改</a></td>
                        ";
                    }else{
                        echo"
                        <td><a href=''>鎖定</a></td>
                        <td><a href=''>刪除</a></td>
                        <td><a href=''>修改</a></td>
                        ";
                    }
                    echo"</tr>";
                }
            ?>
    </table>
</body>
</html>
<script>
    $("#add").click(function(){window.location.href = "add1.php";});
    $("#pen").click(function(){window.location.href = "pen1.php";});
</script>