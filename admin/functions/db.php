<?php 
session_start();

$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = 'root';
$DB_NAME = "meuDb";
$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if(mysqli_connect_errno()){
    echo "<script>alert('Database Error!');</script>";
}
?>