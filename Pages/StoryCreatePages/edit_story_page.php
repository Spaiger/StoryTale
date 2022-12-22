<?php
session_start();
include '../../db.php';
if (!isset($_SESSION['user'])) {
    header("location: ../../index.php");
} else if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] != (int)$_GET["id_user"]) {
        echo "fdfdfdfd";

        //header("location: ../../index.php");
    }
}


$id_story = $_GET["id_story"];
$id_user = $_GET["id_user"];
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
    <link rel="stylesheet" href="authorization_page.css">
</head>

<body>
    <script src="MainPage.js"></script>
    <div class="con">
        <div class="content">
            <div class="title">
                <div class="text">Создать</div>
            </div>
            <div class="form">
                <form action="edit.php" method="post" id="usrform" class="usrform">

                    <div class="in">
                       
                    <input type="hidden" name="id_story" value="<?php echo $id_story ?>">
                        <div class="ni2">
                        <?php //echo $avatar; 
                            ?>
                            <img style="border-radius: 50%;" src="../../testassets/maxresdefault.jpg" width="50" height="50" alt="">
                       
                            Обложка
                            <input type="file" class="input" id="image" name="img">
                        </div>
                    </div>
                    <div class="in">
                        <div class="ni2">Назание<input type="text" required name="name" class="input" id="name" value="<?php echo $name ?>"></div>
                    </div>
                    <div class="in">
                        <div class="ni2">
                            Жанр
                            <select name="genre" class="input" id="genre">
                                <option value="loh" <?php if ($genre == "loh") echo 'selected' ?>>Loh</option>
                                <option value="neloh" <?php if ($genre == "neloh") echo 'selected' ?>>NeLoh</option>
                            </select>
                        </div>
                    </div>
                    <div class="in">
                        <div class="ni2">Описание<input  value="<?php echo $description ?>"required style=" background-color:#ffffff; height: 8vh" type="text" name="description" class="input" id="description"></div>
                    </div>
                </form>
                <div class="commentWrap">
                    <div class="ni2">Содержимое<textarea required name="comment" class="comment" form="usrform"><?php echo $comment ?></textarea></div>
                </div>
            </div>

            <input class="button" id="au" form="usrform" type="submit" value="Редактировать историю" style="border: none;">
        </div>
        <div class="footer"></div>
    </div>
</body>

</html>