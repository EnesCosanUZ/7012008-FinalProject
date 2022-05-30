<?php 

session_start();

include('db.php');

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "select * from users where username = '$username' and password = '$password'";  
$result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result); 

if($count == 1){  
    header("Location: /admin/index.php?result=grs");
    $_SESSION["login"] = "True";  
    $_SESSION["user"] = $username;
}  
else{
    header("Location: /admin/login.php?result=ngrs");
}
?>