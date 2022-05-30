<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="src/login.css">
    <script src="https://kit.fontawesome.com/283b6e5fc0.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Giriş</title>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="top-title" id="top-title">
                <h1 class="title" id= "title">Giriş Yap</h1>
                <label class="title-logo"> <i class="far fa-user"></i> </label>
            </div>
            <div class="form-ele">
                <div class="user-logo" id="user-logo"><i class="far fa-user"></i></div>
                <div class="user-logo" id="pass-logo"><i class="fas fa-key"></i></div>
                <form action="functions/auth.php" method="POST">
                    <input type="text" name="username" id="username" placeholder="Kullanıcı Adı" class="input-box" autocomplete="off">
                    <input type="password" name="password" id="password" placeholder="Şifre" class="input-box" autocomplete="none">
                    <button type="submit" id="submit-btn">Giriş Yap</button>
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
    <script src="src/login.js"></script>
</body>
</html>