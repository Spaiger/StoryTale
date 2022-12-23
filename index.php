<?php
session_start();
//var_dump($_SESSION);
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
    <title>Главная страница</title>
    <link rel="stylesheet" href="MainPage.css">
    <link rel="stylesheet" href="Pages/footer.css">
    <?php
    if (isset($_SESSION['user'])) {
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
                    $id = $_SESSION['user'];
                    echo  '<div class="button" id="but5" onclick="location.href=\'Pages/ProfilePage/profile.php?id_user='.$id.'\';">Профиль</div>';
                }

                ?>
            </div>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <?php  
             
            if (!isset($_SESSION['user'])) {
                echo '<div class="title">Новое</div>';
            } else {

                echo '<div class="pipi">
                <div class="title">Новое</div>
                </div>';
            }
            ?>
            <div class="blocks">
                <div class="stories" id="block1">s</div>
                <div class="stories" id="block2">s</div>
                <div class="stories" id="block3">s</div>
                <div class="stories" id="block4">s</div>
            </div>
        </div>
        <div class="footer">
            <div class="news">
                <p><a class="link" href="Pages/Others/Rules.php">Правила</a></p>
                <p><a class="link" href="index.php">Новости сайта</a></p>
            </div>
            <div class="social">s</div>
        </div>
    </div>
</body>

</html>