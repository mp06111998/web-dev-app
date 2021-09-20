<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'webdevapp');

    $pol = $_POST['mater'];
    $upgr = $_POST['upgr'];
    $idd = $_SESSION['id'];
    $which = $pol."_land";

                $db = mysqli_connect('localhost', 'root', '', 'webdevapp');
                        $sql = "SELECT $which FROM materials WHERE id_materials = '$idd';";
                        $result = mysqli_query($db, $sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                $howmuch = $row[$which];
                            }
                        }

    $r = mysqli_query($db, "UPDATE materials SET $pol = $pol + $howmuch WHERE id_materials = '$idd';");

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
    
    if($wood >= 1000 && $clay >= 1000 && $iron >= 1000 && $wheat >= 1000 && isset($upgr)){
        $rr = mysqli_query($db, "UPDATE materials SET wood = wood-1000, clay = clay-1000, iron = iron-1000, wheat = wheat-1000 WHERE id_materials = '$idd';");
        $r2 = mysqli_query($db, "UPDATE materials SET $upgr = $upgr + 1 WHERE id_materials = '$idd';");
    }

    header('location: first.php');
?>