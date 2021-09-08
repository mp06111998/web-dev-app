<?php
$error = NULL;

if(isset ($_POST['submit'])) {
    
    //Connect to database
    $mysqli = new mysqli('localhost', 'root', '', 'webdevapp');
    
    //Get form data
    $u = $_POST['u'];
    $p = $_POST['p'];
    $p2 = $_POST['p2'];
    $e = $_POST['e'];
    
    $resultSet = $mysqli->query("SELECT * FROM accounts WHERE username = '$u' LIMIT 1");
    
    if(strlen($u) < 5){
        $error = "<p style='color:#9400D3'><b>Your username must be <br>at least 5 characters!</b></p>";
    }
    elseif($p2 != $p){
        $error .= "<p style='color:#9400D3'><b>Your passwords do not match!</b></p>";
    }
    elseif(strlen($p) < 5){
        $error .= "<p style='color:#9400D3'><b>Your password must be <br>at least 5 characters!</b></p>";
    }
    elseif($resultSet->num_rows !=0){
        $error .= "<p style='color:#9400D3'><b>An account with that <br> username already exists!</b></p>";
    }
    else{
        //Form is valid
        
        //Sanitize form data
        $u = $mysqli->real_escape_string($u);
        $p = $mysqli->real_escape_string($p);
        $p2 = $mysqli->real_escape_string($p2);
        $e = $mysqli->real_escape_string($e);
        
        //Generate Vkey
        $vkey = md5(time().$u);
        
        //Insert account into the database
        $p = md5($p);
        $insert = $mysqli->query("INSERT INTO accounts(username,password,email,vkey) VALUES('$u','$p','$e','$vkey')");
        
        if($insert){
            //Send Email
            //$to = $e;
            //$subject = "Email Verification";
            //$message = "<a href='http://localhost/registration/verify.php?vkey=$vkey'>Register Account</a>";
            //$headers = "From: marcel.polanc1998@gmail.com \r\n";
            //$headers .= "MIME-Version: 1.0" . "\r\n";
            //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            //mail($to,$subject,$message,$headers);
            
            header('location:thankyou.php');
            
        }
        else{
            echo $mysqli->error;
        }
        
    }
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
                            <h2 style="color:#9400D3">Register</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><input style="width: 200px;" type="TEXT" name="u" placeholder="username" required /></td>
                    </tr>
                    <tr>
                        <td align="center"><input style="width: 200px;" type="PASSWORD" name="p" placeholder="password" required /></td>
                    </tr>
                    <tr>
                        <td align="center"><input style="width: 200px;" type="PASSWORD" name="p2" placeholder="repeat password" required /></td>
                    </tr>
                    <tr>
                        <td align="center"><input style="width: 200px;" type="EMAIL" name="e" placeholder="email" required /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Register" required /></td>
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
                        <td align="center">Already have account? <a style="color:#9400D3; text-decoration:none" href="index.php">Log In</a></td>
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
