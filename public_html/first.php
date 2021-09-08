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
    <link rel="icon" href="purple-ribbon.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>

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
