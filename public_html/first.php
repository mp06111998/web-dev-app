<?php
session_start();

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
    <link rel="icon" href="purple-ribbon.png">
    <link rel="stylesheet" href="style.css">
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
        <div class="four_left">
            <img class="picss" src="pics/woodcutter.png" alt="">
        </div>
        <div class="four_right">
            <img class="picss" src="pics/clay_pit.png" alt="">
        </div>
        <div style="clear:both"></div>
        <div class="four_left">
            <img class="picss" src="pics/iron_mine.png" alt="">
        </div>
        <div class="four_right">
            <img class="picss" src="pics/cropland.png" alt="">
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="white_div">
        ttrraa
    </div>
    <div id="image_div">
        <div class="white_div">
            <form method="POST" action="">
                <table border="0" align="center" cellpadding="5">
                    <tr>
                        <td align="center">
                            <?php 
                                echo $_SESSION['u'];
                            ?>
                        </td>
                        <td>
                            <a style="color:#9400D3; text-decoration:none" href="logout.php">Log Out</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <style>
        img[alt="www.000webhost.com"] {
            display: none
        }

        ;

    </style>

</body>

</html>
