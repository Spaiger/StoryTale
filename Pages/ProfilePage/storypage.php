<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link rel="stylesheet" href="GenrePage.css">
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
                <div class="NewStory">+</div>
                <!-- <div class="title">Все работы</div> -->
            </div>
            <div class="blocks">
                <div class="stories" id="block1">123 &#9829</div>
                <div class="name">
                    <p id="username">Название</p>
                    <p id="workscount">Анннотация:</p>
                </div>
            </div>
            <!-- <div class="blocks">
                <div class="stories" id="block1">s</div>
                <div class="stories" id="block2">s</div>
                <div class="stories" id="block3">s</div>
                <div class="stories" id="block4">s</div>
            </div> -->
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>