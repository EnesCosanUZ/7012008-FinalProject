<?php 
    include('db.php');
    $sql = "DELETE FROM users WHERE ID='" . $_GET["ID"] . "'";


    if(mysqli_query($con, $sql)){
        header('location:/admin/index.php?result=sil');
    } else {
        header('location:/admin/index.php?result=nsil');
    }

    mysqli_close($con);
?>