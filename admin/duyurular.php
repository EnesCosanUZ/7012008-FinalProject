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
                <div class="item" onclick="javascript: location='index.php'">
                    <div class="icon">
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
            <label class="bar" for="check" id="bar"><i class="fas fa-bars"></i></label>
            <div class="container">
        <input type="checkbox" id="add-new" style="display: none;">
        <div class="form-box">
          <div class="fomr-top">
            <h3 class="title-o">Haberler</h3>
            <label for="add-new" class="add-new">+ DUYURU EKLE</div>
                <div class="form-flex">
                    <form action="./functions/haberEkle.php" method="POST" enctype="multipart/form-data">>
                        <div class="inputs">
                            <h3 class="c-title">Duyuru Başlığı</h3>
                            <input id="title" name="title" type="text" class="new-title" placeholder="Haber Başlığı..."></input>
                        </div>
                        <div class="inputs">
                            <h3 class="c-title">Duyuru İçeriği</h3>
                            <textarea id="text" name="text" class="new-content" placeholder="Haber İçeriği..."></textarea>
                        </div>
                        <div class="inputs">
                            <h3 class="c-title">Resim Yükle</h3>
                            <label for="new-img" class="img-table">
                                <i class="fas fa-file-image"></i>
                            </label>
                            <input type="file" class="upl-img" id="new-img" id="image" name="image" />
                        </div>
                        <div class="inputs">
                            <input class="publish" id="publish-new" type="submit" name="submit" value="GÖNDER" />
                        </div>
                    </form>
                </div>
          </div>
        </div>
        <div class="new-table">
            <table class="new-content-table" id="new-content-table">
                <tr class="tab-top">
                  <th>ID</th>
                  <th>Haber Başlığı</th>
                  <th>Yazar</th>
                  <th>Tarih</th>
                  <th id="edit">Düzenle</th>
                </tr>
                <?php 
                
                $DB_SERVER = "localhost";
                $DB_USERNAME = "root";
                $DB_PASSWORD = 'root';
                $DB_NAME = "meuDb";
                $con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

                $IDLenght = "SELECT ID FROM duyurular";

                $resultID = $con->query($IDLenght);

                $sql = "SELECT `ID`, `title`, `author`, `date` FROM duyurular";    
                $result = $con->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>". $row["ID"] ."</td>
                            <td>". $row["title"] ."</td>
                            <td>". $row["author"] ."</td>
                            <td>". $row["date"] ."</td>
                            <td>
                             <div class='edit'>
                                 <div class='edit-new pan-new' onclick='javascript:location=`duyuruDuzenle.php?ID=". $row["ID"] ."`'>
                                    <i class='far fa-edit'></i>
                                 </div> 
                                 <div class='remove-new pan-new del-btn' href='functions/duyuruSil.php?ID=". $row["ID"] ."'>
                                    <i class='fas fa-trash-alt'></i>
                                 </div> 
                                </div>
                            </td>
                        </tr>                      
                        ";
                    }
                }

                ?>
            </table>
        </div>
        <div class="info-box">
            <div class="info-new">
                <h2 class="info-count">Yayınlanan Haber Sayısı</h2>
                <span class="count-val"><?php echo $resultID->num_rows; ?></span>
            </div>
        </div>

        <div class="user-set-cont" id="set-cont">
                 <div class="form-chng" id="add-user-box">
                    <form action="">
                        <div class="inputs">
                            <h3 class="c-title">Kullanıcı Adı</h3>
                            <input id="add-username" type="text" class="new-title" placeholder="Kullanıcı Adı...">
                        </div>
                        <div class="inputs">
                            <h3 class="c-title">Kullanıcı Şifresi</h3>
                            <input id="add-password type="password" class="new-title" placeholder="Şifre..."> 
                        </div>
                        <div class="inputs">
                            <button class="publish" id="add-user" type="submit">EKLE</button>
                        </div>
                    </form>
                 </div>

                 <!--Kullanıcı Bilgilerini Düzenle-->
                 <div class="for-sc" id="for-sc"></div>
                 <div class="form-chng" id="change-user-inf">
                    <form action="functions/kullaniciDuzenle.php" method="POST">
                        <div class="inputs">
                            <h3 class="c-title">Kullanıcılar</h3>
                            <select name="users" id="user-output" style="width: 100%;">
                                <option>Select User</option>
                                <?php 
                                $sql = "SELECT `ID`, `username` FROM users";    
                                $result = $con->query($sql);

                                if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "
                                        <option name='". $row['ID'] ."'>". $row['username'] ."</option>                
                                        ";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="inputs">
                            <h3 class="c-title">Yeni Kullanıcı Adı</h3>
                            <input id="change-username" name="username" type="text" class="new-title" placeholder="Kullanıcı Adı...">
                        </div>
                        <div class="inputs">
                            <h3 class="c-title">Yeni Kullanıcı Şifresi</h3>
                            <input id="change-password" name="password" type="password" class="new-title" placeholder="Şifre..."> 
                        </div>
                        <div class="inputs">
                            <button class="publish" name="update" id="change-user" type="submit">GÜNCELLE</button>
                            <button class="publish" name="delete" id="delete-user" type="submit">SIL</button>
                        </div>
                    </form>
                 </div>
             </div>
    </div>

    <?php 
        if(isset($_GET['result'])){ ?>
        <div class="result" data-flashdata="<?php echo $_GET['result'];?>"></div>
    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="src/main.js"></script>
    <script src="https://kit.fontawesome.com/283b6e5fc0.js" crossorigin="anonymous"></script>
</body>
</html>