<?php
session_start();
$admin = false;
if (isset($_SESSION['admin'])) {
    $admin = true;
}
include "db.php";
$res = mysqli_query($connection, "SELECT id_story from main_story_data where status!=1 order by rand() limit 1 ");
$id_story  = $res->fetch_array()["id_story"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
    <link rel="mask-icon" href="icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="MainPage.css">
    <link rel="stylesheet" href="Pages/footer.css">
    <link rel="stylesheet" href="Pages/menustyle.css">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<link rel="stylesheet" href="AuMainPage.css">';
    }
    ?>

</head>

<body>
    <script src="MainPage.js"></script>
    <div id="butmenu">
        <div id="cl" onclick="clo()">&#215;</div>
        <div id="mu">
            <div class="appbar1">
                <div class="button" id="but1" onclick="location.href='Pages/GenrePage/genre_page.php';">Жанры</div>
                <div class="button" id="but2" onclick="location.href='Pages/AuthorsPage/authors_page.php';">Авторы</div>
                <div class="button" id="but3" onclick="location.href='Pages/PopularPage/popular_page.php';">Популярное</div>
                <div class="button" id="but4" onclick="location.href='Pages/ProfilePage/storypage.php<?php echo '?id_story='.$id_story.'&type=rand' ?>';">Случайная работа</div>
                <?php
                if (!isset($_SESSION['user'])) {
                    echo '<div class="button" id="but5" onclick="location.href=\'Pages/AuthorizationPage/authorization_page.php\';">Вход</div>';
                } else {
                    $id_sess = $_SESSION['user'];
                    echo  '<div class="button" id="but5" onclick="location.href=\'Pages/ProfilePage/profile.php?id_user='.$id_sess.'\';">Профиль</div>';
                }

                ?>
            </div>
            <div class="footer1">
                <div class="news1">
                    <div><a class="link" href="Pages/Others/Rules.php">Правила</a></div>
                    <div><a class="link" href="index.php">Новости сайта</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="three" id="mb" onclick="menu()">&#9776;</div>
    <div class="con" id = "conn">
        <div class="content">
            <div class="appbar">
                <div class="button" id="but1" onclick="location.href='Pages/GenrePage/genre_page.php';">Жанры</div>
                <div class="button" id="but2" onclick="location.href='Pages/AuthorsPage/authors_page.php';">Авторы</div>
                <div class="button" id="but3" onclick="location.href='Pages/PopularPage/popular_page.php';">Популярное</div>
                <div class="button" id="but4" onclick="location.href='Pages/ProfilePage/storypage.php<?php echo '?id_story='.$id_story.'&type=rand' ?>';">Случайная работа</div>
                <?php
                if (!isset($_SESSION['user'])) {
                    echo '<div class="button" id="but5" onclick="location.href=\'Pages/AuthorizationPage/authorization_page.php\';">Вход</div>';
                } else {
                    $id = $_SESSION['user'];
                    echo  '<div class="button" id="but5" onclick="location.href=\'Pages/ProfilePage/profile.php?id_user='.$id_sess.'\';">Профиль</div>';
                }

                ?>
            </div>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="title">Новости сайта</div>
                        
            <div class="blocks">
                <?php 
                $res = mysqli_query($connection, "SELECT * from main_story_data where status=1");
                $ans = [];
                  while ($row = $res->fetch_assoc()) {

                $ans[] = $row;
             }
               
                for ($i=1; $i <=4 ; $i++) { 
                    
                    
                ?>
                    
                <div class="stories" id="block<?php echo $i; ?>" onclick="location.href='Pages/Others/admin_page.php?id_story=<?php echo $ans[$i-1]['id_story'] ?>';"> <!--И сделать собственно что у админа в профиле во вкладвке все работы, просто 4 работы, которые соотвествуют новостям этим-->
                    <div class="tit"><?php echo $ans[$i-1]["name"] ?></div>
                    <div class="tex"><?php echo $ans[$i-1]["description"] ?></div>
                </div>
            <?php }?>
            </div> 
            <!--   <div class="stories" id="block2">
                    <div class="tit">Здесь кароче заголовок новости(буквально 1-2 слова)</div>
                    <div class="tex">А здесь текст(тоже немного)</div>
                </div>
                <div class="stories" id="block3">
                    <div class="tit">Здесь кароче заголовок новости(буквально 1-2 слова)</div>
                    <div class="tex">А здесь текст(тоже немного)</div>
                </div>
                <div class="stories" id="block4">
                    <div class="tit">Здесь кароче заголовок новости(буквально 1-2 слова)</div>
                    <div class="tex">А здесь текст(тоже немного)</div>
                </div>-->
            
          <!--  <div class="blocks">
                <div class="stories" id="block1">s</div>
                <div class="stories" id="block2">s</div>
                <div class="stories" id="block3">s</div>
                <div class="stories" id="block4">s</div>
            </div>-->
        </div>
        <div class="footer">
            <div class="news">
                <p><a class="link" href="Pages/Others/Rules.php">Правила</a></p>
                <p><a class="link" href="index.php">Новости сайта</a></p>
            </div>
        </div>
    </div>
</body>

</html>