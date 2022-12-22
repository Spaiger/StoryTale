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
    <title>Registration Page</title>
    <link rel="stylesheet" href="RegistrationPage.css">
    <link rel="stylesheet" href="../footer.css">
</head>
<body>
    <script src="MainPage.js"></script>
    <div class="con">
        <div class="content">
            <div class="title"><div class="text">Регистрация</div></div>
            <form action="reg.php" method="post">
                <div class="in">
                    <div class="ni2">
                        <input type="text" name="nickname" class="input" id="text" placeholder="Имя" required>
                    </div>
                </div>
                <div class="in">
                    <div class="ni2">
                        <input type="email" name="email" class="input" id="email" placeholder="Почта" required>
                    </div>
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
                </div>
                <div class="in">
                    <div class="ni2">
                        <input type="date" name="birthday" class="input" id="bir" placeholder="Дата рождения" required>
                    </div>
                </div>
                <div class="in">
                    <div class="ni2" id = "check">
                        <input type="checkbox" placeholder="Дата рождения" required>Я прочитал и согласен с <a href="../AuthorsPage/authors_page.html">правилами сайта</a>, <a href="../AuthorsPage/authors_page.html">пользовательским соглашением</a> и <a href="../AuthorsPage/authors_page.html">политикой в отношении обработки персональных данных</a>. </input>
                    </div>
                </div>
                <div>
                    <input class="button" id="au" name="submit_button"  type="submit" value="Регистрация" style="border: none;">
                </div>
            </form>
            <?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                }
            
            ?>
        </div>
        <?php 
        include "../footer.php";
        ?>
    </div>
</body>
</html>