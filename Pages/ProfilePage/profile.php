<?php
session_start();
include '../../db.php';


//var_dump($_GET);
//var_dump($_SESSION);
$equel = false;
if(isset($_SESSION["user"]) && isset($_GET["id_user"]) ){
    $equel = $_GET["id_user"] == $_SESSION["user"];
    if( intval( $_GET["id_user"])!= $_GET["id_user"]){
        header("location: ../../logout.php");
    }
}
if(isset($_GET["id_user"])){
    if( intval( $_GET["id_user"])!= $_GET["id_user"]){
        header("location: ../../logout.php");
    }
}
$id = $_GET["id_user"];
$dataName = mysqli_query($connection, "select nickname from user_data where id_user = '$id'");
$name = $dataName->fetch_array()["nickname"];

$req = mysqli_query($connection, "select avatar,count_publish, followers from user_profile_data where id_user = '$id'");


$dataProfile = $req->fetch_assoc();

$avatar = $dataProfile["avatar"];
$count_publish = $dataProfile["count_publish"];
$followers = $dataProfile["followers"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?></title>
    <link rel="stylesheet" href="ProfilePage.css">
    <link rel="stylesheet" href="../footer.css">
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
                <div class="button" id="but5" onclick="location.href=\'logout.php\';">Выйти</div>
            </div>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
              <?php echo '<div class="button" onclick="location.href=\'profileworkspage.php?id_user=' . $id . '\'";>Все работы</div>';?>
              <?php 
              if($equel) echo'
              <div class="NewStory"  onclick="location.href=\'../StoryCreatePages/story_create_main_page.php\';">
                 +
                </div>'
                ?>
            </div>
            <div class="profile">
                <div class="desc">
                    <div id="avatar"><img src=""></div>
                    <div id="followers">
                        <p>Подписчики:</p>
                        <p><?php echo $followers ?> &#9829;</p>
                    </div>
                </div>
                <div class="name">
                    <p id="username"><?php echo $name ?></p>
                    <p id="workscount">Количество работ: 
                        <?php
                        echo '<a id="count" href="profileworkspage.php?id_user=' .$id . '">';
                        
                         echo $count_publish ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php 
        include "../footer.php";
        ?>
    </div>
</body>
</html>