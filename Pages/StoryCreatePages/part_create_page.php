<?php
session_start();
var_dump($_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization Page</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="authorization_page.css">
    <link rel="stylesheet" href="../footer.css">s
</head>
<body>
    <script src="MainPage.js"></script>
    <div class="con">
        <div class="content">
            <div class="title"><div class="text">Создать</div></div>
            <form>
                <div class="in"><div class="ni2">Назание<input type="text" class="input" id="name" placeholder="Email" required></div></div>
                <div class="in"><div class="ni2">Описание<input type="text" class="input" id="description" placeholder="Email" required></div></div>
                <input class="button" id="au" type="submit" value="Войти" style="border: none;">
            </form>
        </div>
        <?php 
        include "../footer.php";
        ?>
    </div>
</body>
</html>