<?php 

session_start();

include('db.php');

$title = $_POST["title"];
$text = $_POST["text"];
$date = new DateTime('now', new DateTimeZone('Europe/Istanbul'));
$new_date = $date->format("d/m/Y - H:i");

if (isset($_POST['submit']) && isset($_FILES['image'])) {
	// echo "<pre>";
	// print_r($_FILES['image']);
	// echo "</pre>";

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");

    if($error === 0) {       
        if(in_array($img_ex_lc, $allowed_exs)){
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = '../src/img/uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $sql = "INSERT INTO `duyurular` (`title`, `text`, `image`, `author`, `date`) VALUES ('$title', '$text', '$new_img_name', '$_SESSION[user]', '$new_date')";

            if(mysqli_query($con, $sql)){
                header('location:/admin/duyurular.php?result=dekl');
            } else {
                header('location:/admin/duyurular.php?result=dnekl');
            }
            mysqli_close($con);
        } else header('location:/admin/duyurular.php?result=dnekl');
    } else header('location:/admin/duyurular.php?result=dnekl');

} else header('location:/admin/duyurular.php?result=dnekl');;

?>

<script src="../src/main.js"></script>