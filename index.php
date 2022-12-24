<?php
session_start();
//var_dump($_SESSION);
if (isset($_SESSION['user'])) {
    // header('Location: index.php');
    //session_unset();
   
}
include "db.php";
$res = mysqli_query($connection, "select id_story from main_story_data order by rand() limit 1");
$id  = $res->fetch_array()["id_story"];
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
                <div class="button" id="but4" onclick="location.href='Pages/ProfilePage/storypage.php<?php echo '?id_story='.$id.'&type=rand' ?>';">Случайная работа</div>
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
            
            <?php
            $res;
            ?>
            
            <div class="blocks">
                <div class="stories" id="block1"> <!--И сделать собственно что у админа в профиле во вкладвке все работы, просто 4 работы, которые соотвествуют новостям этим-->
                    <div class="tit">Здесь кароче заголовок новости(буквально 1-2 слова)</div>
                    <div class="tex">А здесь текст(тоже немного)</div>
                </div>
                <div class="stories" id="block2">
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
                </div>
            </div>
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
            <div class="social">s</div>
        </div>
    </div>
</body>

</html>