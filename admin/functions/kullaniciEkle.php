<?php 

session_start();

include('db.php');

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";

if(mysqli_query($con, $sql)){
    header('location:/admin/index.php?result=uekl');
} else {
    header('location:/admin/index.php?result=unekl');
}
mysqli_close($con);

?>