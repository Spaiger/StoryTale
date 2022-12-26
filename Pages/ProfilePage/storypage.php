<?php
session_start();
if (!isset($_GET["id_story"])) {

    header("location: ../../index.php");
} else {
    if (intval($_GET["id_story"]) != $_GET["id_story"]) {
        header("location: ../../logout.php");
    }
}

if (isset($_SESSION["user"])) {
    $id_session = $_SESSION["user"];
} else {
    $id_session = null;
}
$admin = false;
if (isset($_SESSION["admin"])) {
    $admin = true;
}
$id_story_get = $_GET["id_story"];
include '../../db.php';


$res = mysqli_query($connection, "SELECT * from main_story_data where id_story ='$id_story_get'");
$res = $res->fetch_assoc();
$name = $res["name"];
$annotation = $res["description"];
$description = $res["comment"];
$avatar = $res["avatar"];
$id_user = $res["id_user"];
$res = mysqli_query($connection, "SELECT nickname from user_data where id_user ='$id_user'");
$nickname = $res->fetch_assoc()["nickname"];

?>
<!DOCTYPE html>
<html lang="en">
<?php


$flag = false;
// var_dump($id_user);
//var_dump($id_session);
if ($id_user == $id_session || $admin) {
    $flag = true;
}

mysqli_query($connection, "UPDATE  main_story_data set visit = visit+1 where id_story = '$id_story_get'");



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="storypage.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<link rel="stylesheet" href="../../styles/austyle.css">';
    }
    ?>
</head>

<body>
    <script src="storypage.js"></script>
    <!-- <div id="back">
        <div id="confirm">
            <div id="knopka">&#128938;</div>
            <div id="question">Вы уверенны что хотите удалить эту историю?</div>
            <div id="yorn">
                <div id="Yes">Да</div>
                <div id="No" onclick="retur()">Нет</div>
            </div>
        </div>
    </div> -->

    <script src="../../jquery-3.6.2.min.js"></script>
    <script type="text/javascript">
        function one(id) {
            $.ajax({
                url: '/storytale/Pages/GenrePage/ajax.php',
                method: 'get',
                dataType: 'html',
                data: {
                    "id_story": id
                },
                success: function() {
                    location.href="../../index.php";
                }
            });
        }
    </script>

    <?php include '../menu.php'; ?>
    <div class="con" id="conn">
        <div class="content">
            <?php
            include '../appbar.php';
            ?>
            <div id="ns">
                <div class="NewStory" id="ns1" onclick="location.href='../ProfilePage/storypage.php<?php echo '?id_story=' . $id_story_get . '&type=rand' ?>';">&#8635;</div>
                <?php if ($flag) { ?>
                    <div class="NewStory" onclick="one(<?php echo $id_story_get ?>)">&#128465;</div>
                <?php } ?>
            </div>
            <div class="blocks" id="mda">
                <div id="bu">
                    <div id="edit2" onclick="back()">Назад</div>
                </div>
                <div id="title">
                    <div id="Name"><?php echo $name ?></div>
                </div>
                <div id="story"><?php echo $description ?></div>
                <div class="mde">
                    <div class="pre" id="left">
                        <div class="stories" id="block1"><img src="../../image/story/default.png" alt=""></div>
                        <div class="butt">
                            <div class="ava" onclick="location.href='profile.php?id_user=<?php echo $id_user ?>';"><img src="../../image/user/default.png" id="image">
                                <p class="nick"><?php echo $nickname ?></p>
                            </div>
                            <?php if ($flag) { ?>
                                <div id="edit" onclick="location.href='../StoryCreatePages/edit_story_page.php<?php echo '?id_story=' . $id_story_get . '&id_user=' . $id_user ?>';">Редактировать</div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="about" id="right">
                        <div class="name">
                            <p id="username"><?php echo $name ?></p>
                            <p id="ann">Анннотация: <?php echo $annotation ?></p>
                        </div>
                        <div id="edit1" onclick="read()">Читать</div>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../footer.php'; ?>
    </div>
</body>

</html>