<div class="appbar">
    <div class="button" id="but1" onclick="location.href='../GenrePage/genre_page.php';">Жанры</div>
    <div class="button" id="but2" onclick="location.href='../AuthorsPage/authors_page.php';">Авторы</div>
    <div class="button" id="but3" onclick="location.href='../PopularPage/popular_page.php';">Популярное</div>
    <div class="button" id="but4" onclick="location.href='../RandomWorkPage/random_work_page.php';">Случайная работа</div>
    <?php
    if (!isset($_SESSION['user'])) {
        echo '<div class="button" id="but5" onclick="location.href=\'../AuthorizationPage/authorization_page.php\';">Вход</div>';
    } else {
        $id = $_SESSION['user'];
        echo  '<div class="button" id="but5" onclick="location.href=\'../ProfilePage/profile.php?id_user='.$id.'\';">Профиль</div>';
    }
    ?>
</div>