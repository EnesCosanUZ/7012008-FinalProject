<?php 

session_start();

include('db.php');

$ID = $_GET["ID"];
$title = $_POST["title"];
$text = $_POST["text"];

$sql = "UPDATE haberler SET title='$title', text='$text' WHERE ID='$ID'";

if ($con->query($sql) === TRUE) {
	header('location:/admin/index.php?result=duz');
} else header('location:/admin/index.php?result=nduz');

mysqli_close($con);


?>