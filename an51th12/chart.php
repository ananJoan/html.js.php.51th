<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an51th12");
    mysqli_query($db,"SET NAMES UTF8");
    $_SESSION["id"]=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <title>圖表</title>
</head>
<body>
    <div style="width: 500px; height: 500px;">
        <h1></h1>
    </div>
</body>
</html>
<script>
    var tf=0;
    var one=0;
    var more=0;
    $.ajax({
        url:"chart1.php",
        success:function(e){
            var n=e.split("#@@#");
            n.pop();
            for(i=0;i<n.length;i++){
                rr=JSON.parse(n[i]);
                $("h1").append(rr[0]);
                $("h1").append(".");
                $("h1").append(rr[1]);
                if(rr[2]=="是非題"){
                    $TT=rr[9]+rr[10];
                    $c1=(rr[9]/$TT)*100;
                    $c2=(rr[10]/$TT)*100;
                    $("h1").append(`<canvas id="ch`+i+`" width="200" height="100"></canvas>`);
                    var ch=$("#ch"+i+"");
                    var charts= new Chart(ch,{
                        type:'pie',
                        data:{
                            labels:['是','否'],
                            datasets:[{
                                label:'是非題',
                                data:[$c1,$c2],
                                backgroundColor:[
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                ],
                                borderColor: [
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                ],
                                borderWidth: 1
                            }]
                        },
                    });
                }else if(rr[2]=="單選題"){
                    $TT=rr[9]+rr[10]+rr[11]+rr[12]+rr[13]+rr[14];
                    $c1=(rr[9]/$TT)*100;
                    $c2=(rr[10]/$TT)*100;
                    $c3=(rr[11]/$TT)*100;
                    $c4=(rr[12]/$TT)*100;
                    $c5=(rr[13]/$TT)*100;
                    $c6=(rr[14]/$TT)*100;
                    $("h1").append(`<canvas id="ch`+i+`" width="200" height="100"></canvas>`);
                    var ch=$("#ch"+i+"");
                    var charts=new Chart(ch,{
                        type:'pie',
                        data:{
                            labels:[rr[3],rr[4],rr[5],rr[6],rr[7],rr[8]],
                                datasets:[{
                                label:'單選題',
                                data:[$c1,$c2,$c3,$c4,$c5,$c6],
                                backgroundColor: [
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                ],
                                borderColor: [
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                ],
                                borderWidth: 1
                            }]
                        }
                    });
                }else if(rr[2]=="多選題"){
                    $TT=rr[9]+rr[10]+rr[11]+rr[12]+rr[13]+rr[14];
                    $c1=(rr[9]/$TT)*100;
                    $c2=(rr[10]/$TT)*100;
                    $c3=(rr[11]/$TT)*100;
                    $c4=(rr[12]/$TT)*100;
                    $c5=(rr[13]/$TT)*100;
                    $c6=(rr[14]/$TT)*100;
                    $("h1").append(`<canvas id="ch`+i+`" width="200" height="100"></canvas>`);
                    var ch=$("#ch"+i+"");
                    var charts=new Chart(ch,{
                        type:'bar',
                        data:{
                            labels:[rr[3],rr[4],rr[5],rr[6],rr[7],rr[8]],
                                datasets:[{
                                label:'多選題',
                                data:[$c1,$c2,$c3,$c4,$c5,$c6],
                                backgroundColor: [
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                ],
                                borderColor: [
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                    "rgba(193, 226, 255, 0.650)",
                                    "rgba(226, 193, 255, 0.650)",
                                ],
                                borderWidth: 1
                            }]
                        }
                    });
                }else if(rr[2]=="問答題"){
                    $("h1").append(`<br>`);
                    $("h1").append(rr[9]);
                }
            }
        }
    });
</script>
