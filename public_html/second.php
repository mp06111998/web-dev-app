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
       <form action="buildings.php" method="post">
        <div class="four_left">
            <div class="leftpic">
                <img class="picss" src="pics/barracks.png" alt="">
            </div>
            <div class="upgrade">
                <button class="butt" name="units" value="number">Train unit</button><br><br>
                Total units: <span style="color: white; background-color: #5e6c2e; border-radius: 20px;">&nbsp;
                <?php
                $idd = $_SESSION['id'];
                $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                        $sql = "SELECT number FROM units WHERE id_units = '$idd';";
                        $result = mysqli_query($db, $sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo $row["number"];
                            }
                        }
                ?>
                &nbsp;</span> <br>
                Unit price: <br>
                <img style="height: 15px;" src="pics/wood.png" alt=""> 140
                <img style="height: 15px;" src="pics/clay.png" alt=""> 150<br>
                <img style="height: 15px;" src="pics/iron.png" alt=""> 185
                <img style="height: 15px;" src="pics/wheat.png" alt=""> 60
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="four_right" style="height: 359px;">
           <div class="leftpic" style="width: 40%;">
                <img class="picss" src="pics/ambasada.png" alt="">
            </div>
            <div class="upgrade" style="width: 60%;">
                <?php
                    $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                    $sql = "SELECT * FROM units ORDER BY number DESC";
                    $result = mysqli_query($db, $sql);              
                ?>
               <table>
                   <tr>
                       <th>Username</th>
                       <th>&nbsp;</th>
                       <th>Units</th>
                   </tr>
                   <?php
                   if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                   ?>
                    <tr>
                        <td><?php 
                            $iddd2 = $row['id_units'];
                            $sql3 = "SELECT username FROM accounts WHERE id = '$iddd2';";
                            $result3 = mysqli_query($db, $sql3);
                            if ($result3->num_rows > 0){
                                while($row3 = $result3->fetch_assoc()){
                                    if($_SESSION['u'] == $row3["username"]){
                                        echo '<span style="color: white">' . $row3["username"] . '</span>';
                                    }
                                    else{
                                        echo $row3["username"];
                                    }
                                }
                            }
                        ?>
                        </td>
                        <td>&nbsp;</td>
                        <td><?php 
                            $iddd = $row['id_units'];
                            $db2 = mysqli_connect('localhost', 'root', '', 'webdevapp');
                            $sql2 = "SELECT * FROM units WHERE id_units = $iddd";
                            $result2 = mysqli_query($db2, $sql2);
                                if ($result2->num_rows > 0){
                                    while($row2 = $result2->fetch_assoc()){
                                        echo $row2['number'];}}
                            ?></td>
                    </tr>
                   <?php
                   }}
                   ?>
                </table>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="four_left">
           <div class="leftpic">
                <img class="picss" src="pics/marketplace.png" alt="">
            </div>
            <div class="upgrade">
                <!--<button class="butt" name="mater" value="iron">Iron</button><br><br>
                Field level: <span style="color: white; background-color: #5e6c2e; border-radius: 20px;">&nbsp;
                <?php
                //$idd = $_SESSION['id'];
                //$db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                //        $sql = "SELECT iron_land FROM materials WHERE id_materials = '$idd';";
                //        $result = mysqli_query($db, $sql);
                //        if ($result->num_rows > 0){
                //            while($row = $result->fetch_assoc()){
                //               echo $row["iron_land"];
                //            }
                //        }
                ?>
                &nbsp;</span> <br>
                Upgrade price: <br>
                <img style="height: 15px;" src="pics/wood.png" alt=""> 1000
                <img style="height: 15px;" src="pics/clay.png" alt=""> 1000<br>
                <img style="height: 15px;" src="pics/iron.png" alt=""> 1000
                <img style="height: 15px;" src="pics/wheat.png" alt=""> 1000<br><br>
                <button class="butt2" name="upgr" value="iron_land">Upgrade field</button>-->
            </div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
        </form>
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
