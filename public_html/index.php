<?php
session_start();

$error = NULL;

if(isset ($_POST['submit'])) {
    //Connect to the database
    $mysqli = new mysqli('localhost', 'root', '', 'webdevapp');
    
    //Get form data
    $u = $_POST['u'];
    $p = $_POST['p'];
    $p = md5($p);
    
    //Query the database
    $resultSet = $mysqli->query("SELECT * FROM accounts WHERE username = '$u' AND password = '$p' LIMIT 1");
    
    if($resultSet->num_rows !=0){
        //Process Login
        $row = $resultSet->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];
        $date = $row['createdate'];
        $date = strtotime($date);
        $date = date('d M Y', $date);
        
        if($verified == 0){ //Change on 1 after mail
            //Continue Processing
            $_SESSION['u'] = $u;
            
            header('location:first.php');
        }
        else{
            $error = "<p style='color:#5e6c2e'><b>This account has not <br> yet been verified! <br><br> An email was sent to <br> $email <br> on $date.</b></p>";
        }
    }
    else{
        //Invalid credentials
        $error = "<p style='color:#5e6c2e'><b>The username or password <br> you entered is incorrect!</b></p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>web-dev-app</title>
    <link rel="icon" href="leaf.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="image_div">
        <div class="white_div">
            <form method="POST" action="">
                <table border="0" align="center" cellpadding="5">
                    <tr>
                        <td align="center">
                            <h2 style="color:#5e6c2e">Log In</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><input style="width: 200px;" type="TEXT" name="u" placeholder="username" required /></td>
                    </tr>
                    <tr>
                        <td align="center"><input style="width: 200px;" type="PASSWORD" name="p" placeholder="password" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Log In" required /></td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <?php
        echo $error;
        ?>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">Don't have account? <a style="color:#5e6c2e; text-decoration:none" href="registration.php">Register</a></td>
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
