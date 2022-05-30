<?php 
    include('db.php');

    $user = $_POST['users'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (isset($_POST['delete'])) {

        $sql = "DELETE FROM users WHERE username='$user'";

        if ($con->query($sql) === TRUE) {
            header('location:/admin/index.php?result=usil');
        } else header('location:/admin/duyurular.php?result=unsil');
        
    } elseif (isset($_POST['update'])) {

        $sql = "UPDATE users SET username='$username', password='$password' WHERE username='$user'";

        if ($con->query($sql) === TRUE) {
            header('location:/admin/index.php?result=uduz');
        } else header('location:/admin/duyurular.php?result=unduz');
    }


?>