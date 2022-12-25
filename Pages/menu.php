<div id="butmenu">
    <div id="cl" onclick="clo()">&#215;</div>
    <div id="mu">
        <div class="appbar1">
            <div class="button" id="but1" onclick="location.href='../GenrePage/genre_page.php';">Жанры</div>
            <div class="button" id="but2" onclick="location.href='../AuthorsPage/authors_page.php';">Авторы</div>
            <div class="button" id="but3" onclick="location.href='../PopularPage/popular_page.php';">Популярное</div>
            <div class="button" id="but4" onclick="location.href='../ProfilePage/storypage.php<?php echo '?id_story='.$id.'&type=rand' ?>';">Случайная работа</div>
            <?php
            if (!isset($_SESSION['user'])) {
                echo '<div class="button" id="but5" onclick="location.href=\'../AuthorizationPage/authorization_page.php\';">Вход</div>';
            } else {
                $id = $_SESSION['user'];
                echo  '<div class="button" id="but5" onclick="location.href=\'../ProfilePage/profile.php?id_user='.$id.'\';">Профиль</div>';
            }

            ?>
        </div>
        <div class="footer1">
            <div class="news1">
                <div><a class="link" href="../Others/Rules.php">Правила</a></div>
                <div><a class="link" href="../../index.php">Новости сайта</a></div>
            </div>
        </div>
    </div>
</div>
 <div class="three" id="mb" onclick="menu()">&#9776;</div>