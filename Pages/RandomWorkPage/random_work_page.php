<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RandomWork</title>
    <link rel="stylesheet" href="RandomWorkPage.css">
    <link rel="stylesheet" href="../footer.css">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<link rel="stylesheet" href="../../styles/austyle.css">';
    }
    ?>
</head>

<body>
    <script src="MainPage.js"></script>
    <div class="con">
        <div class="content">
            <?php
            include "../appbar.php";
            ?>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <div class="NewStory">+</div>
                <div class="title">Случайные работы</div>
            </div>
            <?php
            //$id = $_GET["id_user"];
            include "../../db.php";
            $res = mysqli_query($connection, "select * from main_story_data order by rand() limit 4;");
            $ans = [];
            while ($row = $res->fetch_assoc()) {

                $ans[] = $row;
            }

            // var_dump($ans[0]["id_story"]);
            //var_dump($ans[1]["id_story"]);
            //var_dump($res);
            //var_dump($res[6]);
            if ($res) {
                echo '<div class="blocks">';
                for ($i = 1; $i <= count($ans); $i++) {
                    echo ' <div class="stories" id="block' . $i . '" onclick="location.href=\'../ProfilePage/storypage.php?id_story=' . $ans[$i - 1]["id_story"] . '\'">'.$ans[$i - 1]["name"].'</div>';
                }



                echo '</div>';
            }
            ?>
            <div class="blocks">
                <div class="stories" id="block1">s</div>
                <div class="stories" id="block2">s</div>
                <div class="stories" id="block3">s</div>
                <div class="stories" id="block4">s</div>
            </div>
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