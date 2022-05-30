<?php 
    include('db.php');
    $sql = "DELETE FROM duyurular WHERE ID='" . $_GET["ID"] . "'";


    if(mysqli_query($con, $sql)){
        header('location:/admin/duyurular.php?result=dsil');
    } else {
        header('location:/admin/duyurular.php?result=dnsil');
    }

    mysqli_close($con);
?>