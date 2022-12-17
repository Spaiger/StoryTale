<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
    <link rel="stylesheet" href="AuthorsPage.css">
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
            <div class="input"><input type="text" class="search"></div>
            <div class="pipi">
                <!-- <div class="NewStory">+</div> -->
                <div class="title">Авторы</div>
            </div>
            <?php
                include '../../db.php';
                $usersData = mysqli_query($connection, "select distinct nickname,id_user from user_data  order by rand() limit 8;");
                for ($i=0; $i <2 ; $i++) { 
                    echo '<div class="blocks">';
                    for ($j=1; $j <=4 ; $j++) {
                        $userNick = $usersData->fetch_row();

                        echo '<a class="stories" href="../../profile.php?id_user='.$userNick[1].'" name="id_user" id="block'.$j.'">'.$userNick[0].'</a>';
                    }
                    
                    echo '</div>';
                }
            ?>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>