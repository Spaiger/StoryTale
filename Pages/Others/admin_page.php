<?php
session_start();

if (isset($_SESSION['admin'])) {
    if(isset($_GET["id_story"])){
        $id_get = $_GET["id_story"];
    }
} else {

    header('Location: ../../index.php');
}
include '../../db.php';

$res = mysqli_query($connection, "SELECT name,description from main_story_data where id_story = $id_get");
$res = $res->fetch_assoc();
//var_dump($id_get);
$name = $res["name"];
$description = $res["description"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новость</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
</head>

<body>
    <script src="admin.js"></script>
    <?php include '../menu.php'; ?>
    <div class="con" id = "conn">
        <div class="content">
            <div class="form">
                <form action="editNews.php" method="post" id="usrform" class="usrform">
                    <input type="hidden" name="id_story" value="<?php echo $id_get ?>">
                    <!--<div class="in">
                        <div class="ni2">Обложка<input type="file" class="input" id="image" name="img"></div>
                    </div>
-->
                    <div class="in">
                        <div class="ni2">
                            <div id="de">Назание</div>
                            <input type="text" name="name" class="input" id="name" required value="<?php echo $name;?>">
                        </div>
                    </div>
                </form>
                <div class="commentWrap">
                    <div class="ni2">
                        <div id="de3">Содержимое</div>
                        <textarea name="description" class="comment" form="usrform" id = "val" required>
                            <?php echo $description; ?>
                        </textarea>
                    </div>
                </div>
            </div>
            <input class="button" id="au" form="usrform" type="submit" value="Сохранить изменения" style="border: none;">
        </div>
        <?php 
        include "../footer.php";
        ?>
    </div>
</body>

</html>