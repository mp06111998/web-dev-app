<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'webdevapp');

    $uni = $_POST['units'];
    $idd = $_SESSION['id'];

    $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                        $sql = "SELECT * FROM materials WHERE id_materials = '$idd';";
                        $result = mysqli_query($db, $sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                $wood = $row['wood'];
                                $clay = $row['clay'];
                                $iron = $row['iron'];
                                $wheat = $row['wheat'];
                            }
                        }
    
    if($wood >= 140 && $clay >= 150 && $iron >= 185 && $wheat >= 60 && isset($uni)){
        $rr = mysqli_query($db, "UPDATE materials SET wood = wood-140, clay = clay-150, iron = iron-185, wheat = wheat-60 WHERE id_materials = '$idd';");
        $r2 = mysqli_query($db, "UPDATE units SET number = number+1 WHERE id_units = '$idd';");
    }

    header('location: second.php');
?>