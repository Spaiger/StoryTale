<?php
session_start();
include '../../db.php';


//var_dump($_GET);
//var_dump($_SESSION);
$equel = false;
if (isset($_SESSION["user"]) && isset($_GET["id_user"])) {
    $equel = $_GET["id_user"] == $_SESSION["user"];
    if (intval($_GET["id_user"]) != $_GET["id_user"]) {
        //echo 'sessia';
        header("location: ../../logout.php");
    }
}
if (isset($_GET["id_user"])) {
    $id_get = $_GET["id_user"];
    if (intval($_GET["id_user"]) != $_GET["id_user"]) {
        //echo 'user';
        header("location: ../../logout.php");
    }
}
$admin = false;
if (isset($_SESSION["admin"])) {
    $admin = true;
}
$dataName = mysqli_query($connection, "SELECT nickname from user_data where id_user = '$id_get'");
$name = $dataName->fetch_array()["nickname"];
if(!$name){
    header("location: ../../index.php");
}
$req = mysqli_query($connection, "SELECT avatar,count_publish from user_data where id_user = '$id_get'");


$dataProfile = $req->fetch_assoc();

$avatar = $dataProfile["avatar"] == null ? "" : $dataProfile["avatar"];
$count_publish = $dataProfile["count_publish"];
$followers = 0;



$res = mysqli_query($connection, "SELECT id_story from main_story_data  where status!=1 order by rand() limit 1");
$id_story  = $res->fetch_array()["id_story"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль <?php echo $name ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="ProfilePage.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
    <?php
    if ($equel) {
    } else {
        echo '<link rel="stylesheet" href="trash.css">';
    }
    ?>
</head>

<body>
    <script src="profile.js"></script>
    <div id="butmenu">
        <div id="cl" onclick="clo()">&#215;</div>
        <div id="mu">
            <div class="appbar1">
                <?php
                include "../../db.php";
                $res = mysqli_query($connection, "select id_story from main_story_data order by rand() limit 1");
                $id_story  = $res->fetch_array()["id_story"];
                $connection->close();
                ?>
                <div class="button" id="but1" onclick="location.href='../GenrePage/genre_page.php';">Жанры</div>
                <div class="button" id="but2" onclick="location.href='../AuthorsPage/authors_page.php';">Авторы</div>
                <div class="button" id="but3" onclick="location.href='../PopularPage/popular_page.php';">Популярное</div>
                <div class="button" id="but4" onclick="location.href='../ProfilePage/storypage.php<?php echo '?id_story=' . $id_story . '&type=rand' ?>';">Случайная работа</div>
                <?php
                if (isset($_SESSION["user"]) && isset($_GET["id_user"])) {
                    $id_sess = $_SESSION["user"];
                    if ($id_sess == $id_get) {
                        echo '<div class="button" id="but5" onclick="location.href=\'../../logout.php\';">Выйти</div>';
                    } else {
                        echo '<div class="button" id="but5" onclick="location.href=\'profile.php?id_user=' . $id_sess . '\';">Профиль</div>';
                    }
                } else {
                    echo '<div class="button" id="but5" onclick="location.href=\'../AuthorizationPage/authorization_page.php\';">Войти</div>';
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
    <div class="con" id="conn">
        <div class="content">
            <div class="appbar">
                <div class="button" id="but1" onclick="location.href='../GenrePage/genre_page.php';">Жанры</div>
                <div class="button" id="but2" onclick="location.href='../AuthorsPage/authors_page.php';">Авторы</div>
                <div class="button" id="but3" onclick="location.href='../PopularPage/popular_page.php';">Популярное</div>
                <div class="button" id="but4" onclick="location.href='../ProfilePage/storypage.php<?php echo '?id_story=' . $id_story . '&type=rand' ?>';">Случайная работа</div>
                <?php
                if (isset($_SESSION["user"]) && isset($_GET["id_user"])) {
                    $id_sess = $_SESSION["user"];
                    if ($id_sess == $id_get) {
                        echo '<div class="button" id="but5" onclick="location.href=\'../../logout.php\';">Выйти</div>';
                    } else {
                        echo '<div class="button" id="but5" onclick="location.href=\'profile.php?id_user=' . $id_sess . '\';">Профиль</div>';
                    }
                } else {
                    echo '<div class="button" id="but5" onclick="location.href=\'../AuthorizationPage/authorization_page.php\';">Войти</div>';
                }

                ?>


            </div>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi" justify-content="center" width="80vw" margin-left="0">
                <!-- <?php echo '<div class="button" onclick="location.href=\'profileworkspage.php?id_user=' . $id_get . '\'";>Все работы</div>'; ?> -->
                <?php
                if ($equel) {
                    if (!$admin) {
                        echo '
                    <div class="button" onclick="location.href=\'profileworkspage.php?id_user=' . $id_get . '\'";>Все работы</div>';
                    
                    }?>
                    <?php if (!$admin) { ?>
                        <div class="NewStory" onclick="location.href='../StoryCreatePages/story_create_main_page.php';">
                            +
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="button" margin-left = "0" onclick="location.href=\'profileworkspage.php?id_user=' . $id_get . '\'";>Все работы</div>';
                }
                ?>
            </div>
            <div class="profile">
                <div class="desc">
                    <div id="avatar"><img id="im" src="../../image/user/default.png"></div>
                    <!-- <div id="followers">
                        <p>Подписчики:</p>
                        <p><?php //echo $followers 
                            ?> &#9829;</p>
                    </div> -->
                </div>
                <div class="name">
                    <p id="username"><?php echo $name ?></p>
                    <?php if(!$admin){?>
                    <p id="workscount">Количество работ:
                        <?php
                        echo '<a id="count" href="profileworkspage.php?id_user=' . $id_get . '">';

                        echo $count_publish ?>
                        </a>
                    </p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        include "../footer.php";
        ?>
    </div>
</body>

</html>