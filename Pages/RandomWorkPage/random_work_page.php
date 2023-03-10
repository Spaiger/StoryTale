<?php session_start();include "../../db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RandomWork</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../icon/favicon-16x16.png">
    <link rel="manifest" href="../../icon/site.webmanifest">
    <link rel="mask-icon" href="../../icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
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
                <!-- <div class="NewStory">+</div> -->
                <div class="title">Случайные работы</div>
            </div>
            <?php
            //$id = $_GET["id_user"];
            
            $stmt = $connection->prepare("select * from main_story_data order by rand() limit 4;");
            //$res = mysqli_query($connection, "select * from main_story_data order by rand() limit 4;");
            $ans = [];
            $stmt->execute();
            $res = $stmt->get_result();
            
            
           
           // var_dump($stmt);
            //var_dump($res);
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