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
                <div class="alertmsg">Неправильная почта или пароль</div>
                <div class="in">
                    <div class="ni2"><input type="password" name="password" class="input" id="password" placeholder="Password" required></div>
                </div>
                <div class="alertmsg">Неправильная почта или пароль</div>
                <input class="button" id="au" type="submit" value="Войти" style="border: none;">
            </form>
            <div class="button" id="reg" onclick="location.href='../RegistrationPage/registration_page.php';">Регистрация</div>
        </div>
        <?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                }
            
            ?>
        <?php 
        include "../footer.php";
        ?>
    </div>
</body>

</html>