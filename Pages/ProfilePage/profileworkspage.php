<?php
session_start();
include '../../db.php';
if (isset($_GET["id_user"])) {
    if (intval($_GET["id_user"]) != $_GET["id_user"]) {
        header("location: ../../logout.php");
    }
}
$admin = false;
if (isset($_SESSION['admin'])) {
    $admin = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все работы</title>
    <link rel="stylesheet" href="profileworks.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
    <script src="jquery-3.6.2.min.js" type="text/javascript">

    </script>
    <script>
        function one(id) {
            $.ajax({
                url: 'ajax.php',
                method: 'get',
                dataType: 'html',
                data: {
                    "id_story": id
                },
            });
        }
    </script>
</head>

<body>
    <script src="profileworks.js"></script>
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
                    location.reload();
                }
            });
        }
    </script>
    <div id="back">
        <div id="confirm">
            <!-- <div id="knopka">&#128938;</div> -->
            <div id="question">Вы уверенны что хотите удалить эту историю?</div>
            <div id="yorn">
                <div id="Yes">Да</div>
                <div id="No" onclick="retur()">Нет</div>
            </div>
        </div>
    </div>
    <?php include '../menu.php'; ?>
    <div class="con" id="conn">
        <div class="content">
            <?php include '../appbar.php'; ?>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <!--<div class="NewStory">+</div>-->
                <div class="title">Все работы</div>
            </div>
            <?php
            $id = $_GET["id_user"];
            $res = mysqli_query($connection, "select * from main_story_data where id_user = '$id';");
            $ans = [];
            while ($row = $res->fetch_assoc()) {

                $ans[] = $row;
            }

            // var_dump($ans[0]["id_story"]);

            //var_dump($res);
            //var_dump($res[6]);
            if ($res) {
                echo '<div class="blocks">';
                for ($i = 1; $i <= count($ans); $i++) {
            ?>

                    <div class="ad">
                        <div class="stories" id="block <?php echo $i; ?>" onclick="location.href='../ProfilePage/storypage.php?id_story=<?php echo $ans[$i - 1]['id_story'] ?>';">
                            <div class="storyContent">
                                <div class="number"><?php echo $i; ?></div>
                                <div class="imageContainer"><img class="image" src="../../image/story/default.png" width="50" height="50"></div>
                                <div class="name"><?php echo $ans[$i - 1]["name"]; ?> </div>
                                <div class="description"><?php echo $ans[$i - 1]["description"]; ?> </div>
                            </div>
                        </div>
                        <?php if ($admin) { ?>
                            <div class="admin">
                                <!--<div class="NewStory" onclick="location.href='../StoryCreatePages/delete.php?id_story=<?php //echo $ans[$i - 1]['id_story'] 
                                                                                                                            ?>';">&#128465;</div>-->
                                <div class="NewStory" onclick="one(<?php echo $ans[$i - 1]['id_story'] ?>)">&#128465;</div>
                                <div class="NewStory" onclick="location.href='../StoryCreatePages/edit_story_page.php?id_story=<?php echo $ans[$i - 1]['id_story'] ?> <?php echo '&id_user='.$id ?>';">&#9998;</div>
                            </div>
                        <?php } ?>
                    </div>

            <?php
                }
                echo '</div>';
            }
            ?>
            <!--
            <div class="stories" id="block1" onclick="location.href='storypage.php?id_story=1&id_user=1'">
                <div class="storyContent" >
                    <div class="number">1</div>
                    <div class="imageContainer"><img class="image" src="../../image/story/default.png" width="50" height="50"></div>
                    <div class="name">1234567890 1234567890 1234567890</div>
                    <div class="description">Это притча о самом лучшем котикеЭтЭто притча о самом лучшем котикео притча о самом лучшем котике</div>
                </div>
                <div class="likeContent">
                    <div class="numberCount">0</div>
                    <div class="like">&#x1f44d;</div>
                    
                </div>
            </div>
            <div class="stories" id="block1" onclick="location.href='storypage.php?id_story=1&id_user=1'">
                exmple
            </div>
        </div>
        -->
            <!-- <div class="blocks">
                <div class="stories" id="block1">s</div>
                <div class="stories" id="block2">s</div>
                <div class="stories" id="block3">s</div>
                <div class="stories" id="block4">s</div>
            </div> -->
        </div>
        <?php include "../footer.php"; ?>
    </div>
</body>

</html>