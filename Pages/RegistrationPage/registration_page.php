<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: ../../index.php');
}
//var_dump($today);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="RegistrationPage.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
</head>

<body>
    <script src="reg.js"></script>
    <!-- <?php include '../menu.php'; ?> -->
    <div class="con" id="conn">
        <div class="content">
            <div class="title">
                <div class="text">Регистрация</div>
            </div>
            <form action="reg.php" method="post" class="form">
                <div class="in">
                    <div class="ni2">
                        <input type="text" name="nickname" class="input" id="Text" placeholder="Имя" required>
                    </div>
                 <!--   <div class="alertmsg">Неправильная почта или пароль</div>-->
                </div>
                <div class="in">
                    <div class="ni2">
                        <input type="email" name="email" class="input" id="email" placeholder="Почта" required>
                    </div>
                <!--    <div class="alertmsg">Неправильная почта или пароль</div>-->
                </div>
                <div class="in">
                    <div class="ni2">
                        <input type="password" name="password" class="input" id="password" placeholder="Пароль" required>
                    </div>
                </div>
                <div class="in">
                    <div class="ni2">
                        <input type="password" name="password_confirm" class="input" id="repassword" placeholder="Повторите пароль" required>
                    </div>
                <!--    <div class="alertmsg">Неправильная почта или пароль</div>-->
                </div>
                <div class="in">
                    <div class="ni2">
                        <input type="date" name="birthday" class="input" id="bir" placeholder="Дата рождения" required>
                    </div>
                    <div class="alertmsg"> <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            ?></div>
                </div>
                <div class="in">
                    <div class="ni2" id="check">
                        <input type="checkbox" placeholder="Дата рождения" id="check1" required>
                        <div id="check2">
                            Я прочитал и согласен с
                            <a href="../AuthorsPage/authors_page.html">правилами сайта</a>.
                        </div>
                    </div>
                </div>
                <div id="reg">
                    <input class="button" id="au" name="submit_button" type="submit" value="Регистрация" style="border: none;">
                </div>
            </form>
           
        </div>
        <?php
        include "../footer.php";
        ?>
    </div>
</body>

</html>