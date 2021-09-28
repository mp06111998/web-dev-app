<?php
session_start();

$u = $_SESSION['u'];
$db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                $sql = "SELECT id FROM accounts WHERE username = '$u';";
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $_SESSION['id'] = $row["id"];
                    }
                }


if(!isset($_SESSION['u'])) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>web-dev-app</title>
    <link rel="icon" href="leaf.png">
    <link rel="stylesheet" href="style2.css">
</head>

<body>

    <div class="menu">
        <div class="menu_div">
            <div class="left">
                <form method="POST" action="">
                    <?php 
                    echo $_SESSION['u'];
                ?>
                </form>
            </div>
            <div class="right">
                <button class="dropbtn">Menu
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a style="color:#5e6c2e; text-decoration:none" href="first.php" class="choice">Materials</a>&nbsp;&nbsp;
                    <a style="color:#5e6c2e; text-decoration:none" href="second.php" class="choice">Buildings</a>&nbsp;&nbsp;
                    <a style="color:#5e6c2e; text-decoration:none" href="third.php" class="choice">Map</a>&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="color:#5e6c2e; text-decoration:none" href="logout.php" class="choice">Log Out</a>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="up">
       <div class="maps">
          
           <canvas id="canvas" height="320px" width="705px"></canvas>
           
           <script>
                var canvas=document.getElementById('canvas');
                var context=canvas.getContext('2d');
               
                /*document.onmousemove = function() {
                    var x = event.offsetX;
                    var y = event.offsetY;
                    context.backgroundPositionX = -x + "px";
                    context.backgroundPositionY = -y + "px";
                }*/
               
               canvas.onmousedown = function() {
                   var x = event.offsetX;
                    var y = event.offsetY;
                   console.log(x + "and" + y);
               }
               
                var mapArray=[
                    [0,0,0,0,0,0,0,0,0,0,0],
                    [0,1,0,0,0,1,0,0,0,0,0],
                    [0,0,0,0,1,0,0,0,0,0,0],
                    [0,0,0,0,0,0,0,0,1,0,0],
                    [0,1,0,0,0,0,0,0,0,0,0]
                ];
               
               var grass=new Image();
               var village=new Image();
               
               grass.src='pics/grass.png';
               village.src='pics/village.png';
               
               var posX=0;
               var posY=0;
               
               for(var i=0; i < mapArray.length; i++){
                    for(var j=0; j < mapArray[i].length; j++){
                        if(mapArray[i][j] == 0){
                            context.drawImage(grass, posX, posY, 64, 64);
                        }
                        if(mapArray[i][j] == 1){
                            context.drawImage(village, posX, posY, 64, 64);
                        }
                        posX+=64;
                    }
                    posX=0;
                    posY+=64;
               }
               
               
           </script>
           
       </div>
    </div>
    <div class="white_div">
      <img src="pics/wood.png" alt="">
       <?php
        $idd = $_SESSION['id'];
        $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                $sql = "SELECT wood FROM materials WHERE id_materials = '$idd';";
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo $row["wood"];
                    }
                }
        ?>
        
        <img src="pics/clay.png" alt="">
       <?php
        $idd = $_SESSION['id'];
        $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                $sql = "SELECT clay FROM materials WHERE id_materials = '$idd';";
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo $row["clay"];
                    }
                }
        ?>
        
        <img src="pics/iron.png" alt="">
       <?php
        $idd = $_SESSION['id'];
        $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                $sql = "SELECT iron FROM materials WHERE id_materials = '$idd';";
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo $row["iron"];
                    }
                }
        ?>
        
        <img src="pics/wheat.png" alt="">
       <?php
        $idd = $_SESSION['id'];
        $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                $sql = "SELECT wheat FROM materials WHERE id_materials = '$idd';";
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo $row["wheat"];
                    }
                }
        ?>
    </div>

    <style>
        img[alt="www.000webhost.com"] {
            display: none
        }

        ;

    </style>

</body>

</html>
