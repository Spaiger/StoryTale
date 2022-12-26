<?php
session_start();
include '../../db.php';
if (!isset($_SESSION['user'])) {
    header("location: ../../index.php");
} else if (isset($_SESSION['user'])) {
    if(!isset($_SESSION["admin"])){
        if ($_SESSION['user'] != (int)$_GET["id_user"] ) {
            echo "fdfdfdfd";
    
            header("location: ../../index.php");
        }
    }
    
}

if(isset($_SESSION["admin"])){
    $id_user = null;
}
else{
    $id_user = $_GET["id_user"];
}
$id_story = $_GET["id_story"];

$res = mysqli_query($connection, "select * from main_story_data where id_story='$id_story';");

$res = $res->fetch_assoc();

$name = $res["name"];
$genre = $res["genre"];
$description = $res["description"];
$comment = $res["comment"];
$avatar = $res["avatar"];

//$data = $data->fetch_array();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать историю</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="storycreate.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
</head>

<body>
    <script src="allpage.js"></script>
    <?php include '../menu.php'; ?>
    <div class="con" id = "conn">
        <div class="content">
            <div class="title">
                <div class="text">Редактировать</div>
            </div>
            <div class="form">
                <form action="edit.php" method="post" id="usrform" class="usrform">

                    <div class="in">
                       
                    <input type="hidden" name="id_story" value="<?php echo $id_story ?>">
                        <div class="ni2">
                        <?php //echo $avatar; 
                            ?>
                            <!-- <img style="border-radius: 50%;" src="../../testassets/maxresdefault.jpg" width="50" height="50" alt="">
                       
                            Обложка
                            <input type="file" class="input" id="image" name="img"> -->
                        </div>
                    </div>
                    <div class="in">
                        <div class="ni2"><div id="de">Назание</div><input type="text" required name="name" class="input" id="name" value="<?php echo $name ?>"></div>
                    </div>
                    <div class="in">
                        <div class="ni2">
                            <p class="kostil"><div id="de1">Жанр</div></p>
                            <select name="genre" class="input" id="genre">
                                <option value="fantasy" <?php if ($genre == "fantasy") echo 'selected' ?>>Фентези</option>
                                <option value="science_fiction" <?php if ($genre == "science_fiction") echo 'selected' ?>>Научная фантастика</option>
                                <option value="dramaturg" <?php if ($genre == "dramaturg") echo 'selected' ?>>Драматургия</option>
                                <option value="detective" <?php if ($genre == "detective") echo 'selected' ?>>Детективы</option>
                            </select>
                        </div>
                    </div>
                    <div class="in">
                        <div class="ni2"><div id="de2">Описание</div><input  value="<?php echo $description ?>"required style=" background-color:#ffffff; height: 8vh" type="text" name="description" class="input" id="description"></div>
                    </div>
                </form>
                <div class="commentWrap">
                    <div class="ni2">
                    <div id="de3">Содержимое</div><textarea required name="comment" class="comment" id ="val"form="usrform"><?php echo $comment ?></textarea></div>
                </div>
            </div>

            <input class="button" id="au" form="usrform" type="submit" value="Сохранить изменения " style="border: none;">
        </div>
        <?php 
        include "../footer.php";
        ?>
    </div>
</body>

</html>