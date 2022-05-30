<?php 
    session_start();

    if(!isset($_SESSION["login"])){
     
        header("Location: /admin/login.php");
         
    }

    $DB_SERVER = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = 'root';
    $DB_NAME = "meuDb";
    $con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    if(mysqli_connect_errno()){
        echo "<script>alert('same message');</script>";
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="src/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Panel</title>
</head>
<body>
    <div class="op-box">
        <div class="opsucces" id="op-s">
            <h1 class="ops-title" id="ops-title"></h1>
            <div class="load-bar" id="load-bar"></div>
        </div>
    </div>
    <div class="content">
        <input type="checkbox" name="" id="check">
        <div class="left-dash-bar">
            <div class="dash-title">
                <div class="meu-logo">
                    <img src="src/img/mersin-universitesi-logo.png" alt="" srcset="">
                </div>
                <div class="user-box">
                    <h2 id="user">
                        <?php echo $_SESSION["user"]; ?>
                    </h2>
                </div>
            </div>
            <div class="left-dash-content">
                <div class="item active">
                    <div class="icon" onclick="javascript: location='duyurular.php'">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <h2 class="item-name">Haberler</h2>
                </div>
                <div class="item active" onclick="javascript: location='duyurular.php'">
                    <div class="icon">
                        <i class="far fa-bell"></i>
                    </div>
                    <h2 class="item-name">Duyurular</h2>
                </div>
                <div class="item">
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h2 class="item-name">Öğrenci</h2>
                </div>
                <div class="item">
                    <div class="icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <h2 class="item-name">Otomasyon</h2>
                </div>
                <div class="item">
                    <div class="icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h2 class="item-name">İlanlar</h2>
                </div>
            </div>
            <div class="dash-bottom">
                <label for="opn-settings" class="set-box bo-box" id="set-box">
                    <i class="fas fa-users-cog"></i>
                </label>
                <div class="logout-box bo-box" onclick="javascript: location='functions/logout.php'">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
            </div>
            <input type="checkbox" name="" id="opn-settings">
            <div class="user-settings">
                <a href="#for-sc">
                    <div class="set-item item1 set-active" id="set-ac">
                        <p><i class="fas fa-user-plus"></i> Kullanıcı Ekle/Sil</p>
                    </div>
                </a>
               <a href="#change-user-inf">
                    <div class="set-item item2">
                        <p> <i class="fas fa-user-tie"></i> Kullanıcı Bilgilerini Düzenle</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="dash-content news">
            <label class="bar" for="check"><i class="fas fa-bars"></i></label>
            <div class="container">
        <input type="checkbox" id="add-new" style="display: none;">
        <div class="form-box" style="overflow-y: visible;">
          <div class="fomr-top">
            <h3 class="title-o">Haber Düzenle</h3>
                <div class="form-flex" style="margin-top: -42px;">

<?php

    $DB_SERVER = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "root";
    $DB_NAME = "meuDb";
    $con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

    $sql = "SELECT `ID`, `title`, `text` FROM duyurular WHERE ID='" . $_GET["ID"] . "'";

    $result = $con->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
?>


                    <form action="./functions/duyuruDuzenle.php?ID=<?php echo $row["ID"]?>" method="POST">
                        <div class="inputs">
                            <h3 class="c-title">Duyuru Başlığı</h3>
                            <input id="title" name="title" type="text" class="new-title" value="<?php echo $row["title"]; ?>"></input>
                        </div>
                        <div class="inputs">
                            <h3 class="c-title">Duyuru İçeriği</h3>
                            <textarea id="text" name="text" class="new-content"><?php echo $row["text"]; ?><?php echo $row["text"]; ?></textarea>
                        </div>
                        <div class="inputs">
                            <h3 class="c-title">Resim Yükle</h3>
                            <label for="new-img" class="img-table">
                                <i class="fas fa-file-image"></i>
                            </label>
                            <input type="file" class="upl-img" id="new-img" id="image" name="image" accept="image/x-png,image/jpeg"/>
                        </div>
                        <div class="inputs">
                            <button class="publish" id="publish-new" type="submit">YAYINLA</button>
                        </div>
                    </form>
<?php 
        }
    } else echo "<script>alert(". mysqli_error() .")</script>"

?>
</div>
          </div>
        </div>
    </div>
    <script src="src/main.js"></script>
    <script src="https://kit.fontawesome.com/283b6e5fc0.js" crossorigin="anonymous"></script>
</body>
</html>