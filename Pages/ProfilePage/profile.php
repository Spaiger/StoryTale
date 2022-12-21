<?php
var_dump($_GET);
$id = $_GET["id_user"];
echo $id;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="ProfilePage.css">
</head>
<body>
    <script src="MainPage.js"></script>
    <div class="con">
        <div class="content">
            <div class="appbar">
                <div class="button" id="but1" onclick="location.href='../GenrePage/genre_page.php';">Жанры</div>
                <div class="button" id="but2" onclick="location.href='../AuthorsPage/authors_page.php';">Авторы</div>
                <div class="button" id="but3" onclick="location.href='../PopularPage/popular_page.php';">Популярное</div>
                <div class="button" id="but4" onclick="location.href='../RandomWorkPage/random_work_page.php';">Случайная работа</div>
                <div class="button" id="but5" onclick="location.href='../AuthorizationPage/authorization_page.php';">Профиль</div>
            </div>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <div class="button" onclick="location.href='profileworkspage.php';">Все работы</div>
                <div class="NewStory">+</div>
            </div>
            <div class="profile">
                <div class="desc">
                    <div id="avatar"></div>
                    <div id="followers">
                        <p>Подписчики:</p>
                        <p>123 &#9829;</p>
                    </div>
                </div>
                <div class="name">
                    <p id="username">Имя пользователя</p>
                    <p id="workscount">Количество работ: <a id="count" href="profileworkspage.php">12</a></p>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>