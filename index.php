<?php
session_start();
if (isset($_SESSION['user'])) {
    // header('Location: index.php');
    //session_unset();
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <?php
    if (!isset($_SESSION['user'])) {
        echo '<link rel="stylesheet" href="MainPage.css">';
    } else {
        echo '<link rel="stylesheet" href="AuMainPage.css">';
    }
    ?>

</head>

<body>
    <script src="MainPage.js"></script>
    <div class="con">
        <div class="content">
            <div class="appbar">
                <div class="button" id="but1" onclick="location.href='Pages/GenrePage/genre_page.php';">Жанры</div>
                <div class="button" id="but2" onclick="location.href='Pages/AuthorsPage/authors_page.php';">Авторы</div>
                <div class="button" id="but3" onclick="location.href='Pages/PopularPage/popular_page.php';">Популярное</div>
                <div class="button" id="but4" onclick="location.href='Pages/RandomWorkPage/random_work_page.php';">Случайная работа</div>
                <?php
                if (!isset($_SESSION['user'])) {
                    echo '<div class="button" id="but5" onclick="location.href=\'Pages/AuthorizationPage/authorization_page.php\';">Вход</div>';
                } else {
                    echo  '<div class="button" id="but5" onclick="location.href=\'Pages/RegistrationPage/registration_page.php\';">Профиль</div>';
                }

                ?>
            </div>
            <div class="input"><input type="text" class="search"></div>
            <?php  
             
            if (!isset($_SESSION['user'])) {
                echo '<div class="title">Новое</div>';
            } else {
                
                echo '<div class="pipi">';
                echo '<div class="NewStory">+</div>';
                echo '<div class="title">Новое</div>';
                echo '</div>';
            }
            ?>
            <div class="blocks">
                <div class="stories" id="block1">s</div>
                <div class="stories" id="block2">s</div>
                <div class="stories" id="block3">s</div>
                <div class="stories" id="block4">s</div>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>

</html>