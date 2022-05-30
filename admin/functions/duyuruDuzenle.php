<?php 

session_start();

include('db.php');

$ID = $_GET["ID"];
$title = $_POST["title"];
$text = $_POST["text"];

$sql = "UPDATE duyurular SET title='$title', text='$text' WHERE ID='$ID'";

if ($con->query($sql) === TRUE) {
	header('location:/admin/duyurular.php?result=dduz');
} else header('location:/admin/duyurular.php?result=dnduz');

mysqli_close($con);


?>