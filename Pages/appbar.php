<div class="appbar">
    <div class="button" id="but1" onclick="location.href='..Pages/GenrePage/genre_page.php';">Жанры</div>
    <div class="button" id="but2" onclick="location.href='..Pages/AuthorsPage/authors_page.php';">Авторы</div>
    <div class="button" id="but3" onclick="location.href='..Pages/PopularPage/popular_page.php';">Популярное</div>
    <div class="button" id="but4" onclick="location.href='..Pages/RandomWorkPage/random_work_page.php';">Случайная работа</div>
    <?php
        if (!isset($_SESSION['user'])) {
            echo '<div class="button" id="but5" onclick="location.href=\'..Pages/AuthorizationPage/authorization_page.php\';">Вход</div>';
        } else {
            echo  '<div class="button" id="but5" onclick="location.href=\'..Pages/RegistrationPage/registration_page.php\';">Профиль</div>';
        }
    ?>
</div>