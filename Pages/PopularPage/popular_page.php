<?php
session_start();
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
    <title>Популярное</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="PopularPage.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<link rel="stylesheet" href="../../styles/austyle.css">';
    }
    ?>
</head>
<body>
    <script src="popular_page.js"></script>
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
    <?php include '../menu.php'; ?>
    <div class="con" id = "conn">
        <div class="content">
        <?php include '../appbar.php'; ?>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <!-- <div class="NewStory">+</div> -->
                <div class="title">Популярное</div>
            </div>
            <?php
            //$id = $_GET["id_user"];
            $res = mysqli_query($connection, "SELECT * from main_story_data where status!=1 order by visit desc limit 5; ");
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
                                <div class="NewStory" onclick="location.href='../StoryCreatePages/edit_story_page.php?id_story=<?php echo $ans[$i - 1]['id_story'] ?>';">&#9998;</div>
                            </div>
                        <?php } ?>
                    </div>

            <?php
                }
                echo '</div>';
            }
            ?>
            <!-- <div class="blocks">
                <div class="stories" id="block1">s</div>
                <div class="stories" id="block2">s</div>
                <div class="stories" id="block3">s</div>
                <div class="stories" id="block4">s</div>
            </div> -->
        </div>
        <?php 
        include "../footer.php";
        ?>
    </div>
</body>
</html>