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
       <form action="materials.php" method="post">
        <div class="four_left">
            <div class="leftpic">
                <img class="picss" src="pics/woodcutter.png" alt="">
            </div>
            <div class="upgrade">
                <button class="butt" name="mater" value="wood">Wood</button><br><br>
                Field level: <span style="color: white; background-color: #5e6c2e; border-radius: 20px;">&nbsp;
                <?php
                $idd = $_SESSION['id'];
                $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                        $sql = "SELECT wood_land FROM materials WHERE id_materials = '$idd';";
                        $result = mysqli_query($db, $sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo $row["wood_land"];
                            }
                        }
                ?>
                &nbsp;</span> <br>
                Upgrade price: <br>
                <img style="height: 15px;" src="pics/wood.png" alt=""> 1000
                <img style="height: 15px;" src="pics/clay.png" alt=""> 1000<br>
                <img style="height: 15px;" src="pics/iron.png" alt=""> 1000
                <img style="height: 15px;" src="pics/wheat.png" alt=""> 1000 <br><br>
                <button class="butt2" name="upgr" value="wood_land">Upgrade field</button>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="four_right">
           <div class="leftpic">
                <img class="picss" src="pics/clay_pit.png" alt="">
            </div>
            <div class="upgrade">
                <button class="butt" name="mater" value="clay">Clay</button><br><br>
                Field level: <span style="color: white; background-color: #5e6c2e; border-radius: 20px;">&nbsp;
                <?php
                $idd = $_SESSION['id'];
                $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                        $sql = "SELECT clay_land FROM materials WHERE id_materials = '$idd';";
                        $result = mysqli_query($db, $sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo $row["clay_land"];
                            }
                        }
                ?>
                &nbsp;</span> <br>
                Upgrade price: <br>
                <img style="height: 15px;" src="pics/wood.png" alt=""> 1000
                <img style="height: 15px;" src="pics/clay.png" alt=""> 1000<br>
                <img style="height: 15px;" src="pics/iron.png" alt=""> 1000
                <img style="height: 15px;" src="pics/wheat.png" alt=""> 1000<br><br>
                <button class="butt2" name="upgr" value="clay_land">Upgrade field</button>
            </div>
            <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
        <div class="four_left">
           <div class="leftpic">
                <img class="picss" src="pics/iron_mine.png" alt="">
            </div>
            <div class="upgrade">
                <button class="butt" name="mater" value="iron">Iron</button><br><br>
                Field level: <span style="color: white; background-color: #5e6c2e; border-radius: 20px;">&nbsp;
                <?php
                $idd = $_SESSION['id'];
                $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                        $sql = "SELECT iron_land FROM materials WHERE id_materials = '$idd';";
                        $result = mysqli_query($db, $sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo $row["iron_land"];
                            }
                        }
                ?>
                &nbsp;</span> <br>
                Upgrade price: <br>
                <img style="height: 15px;" src="pics/wood.png" alt=""> 1000
                <img style="height: 15px;" src="pics/clay.png" alt=""> 1000<br>
                <img style="height: 15px;" src="pics/iron.png" alt=""> 1000
                <img style="height: 15px;" src="pics/wheat.png" alt=""> 1000<br><br>
                <button class="butt2" name="upgr" value="iron_land">Upgrade field</button>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="four_right">
           <div class="leftpic">
                <img class="picss" src="pics/cropland.png" alt="">
            </div>
            <div class="upgrade">
                <button class="butt" name="mater" value="wheat">Wheat</button><br><br>
                Field level: <span style="color: white; background-color: #5e6c2e; border-radius: 20px;">&nbsp;
                <?php
                $idd = $_SESSION['id'];
                $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                        $sql = "SELECT wheat_land FROM materials WHERE id_materials = '$idd';";
                        $result = mysqli_query($db, $sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo $row["wheat_land"];
                            }
                        }
                ?>
                &nbsp;</span> <br>
                Upgrade price: <br>
                <img style="height: 15px;" src="pics/wood.png" alt=""> 1000
                <img style="height: 15px;" src="pics/clay.png" alt=""> 1000<br>
                <img style="height: 15px;" src="pics/iron.png" alt=""> 1000
                <img style="height: 15px;" src="pics/wheat.png" alt=""> 1000<br><br>
                <button class="butt2" name="upgr" value="wheat_land">Upgrade field</button>
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
