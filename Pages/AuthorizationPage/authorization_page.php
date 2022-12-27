<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="authorization_page.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
</head>

<body>
    <script src="au.js"></script> 
    <!-- <?php include '../menu.php'; ?> -->
    <div class="con" id = "conn">
        <div class="content">
            <div class="title">
                <div class="text">Авторизация</div>
            </div>
            <form action="signin.php" method="post">
                <div class="in">
                    <div class="ni2"><input type="email" name="email" class="input" id="email" placeholder="Email" required></div>
                </div>
                <!--<div class="alertmsg">Неправильная почта или пароль</div>-->
                <div class="in">
                    <div class="ni2"><input type="password" name="password" class="input" id="password" placeholder="Password" required></div>
                </div>
                <div class="alertmsg"><?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            
            ?></div>
                <input class="button" id="au" type="submit" value="Войти" style="border: none;">
            </form>
            <div class="button" id="reg" onclick="location.href='../RegistrationPage/registration_page.php';">Регистрация</div>
        </div>
        
        <?php 
        include "../footer.php";
        ?>
    </div>
</body>

</html>