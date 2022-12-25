<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Жанры</title>
    <link rel="stylesheet" href="GenrePage.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<link rel="stylesheet" href="../../styles/austyle.css">';
    }
    ?>
</head>

<body>
    <script src="genre_page.js"></script>
    <?php include '../menu.php'; ?>
    <div class="con" id = "conn">
        <div class="content">
            <?php include '../appbar.php' ?>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <!-- <div class="NewStory">+</div> -->
                <div class="title">Жанры</div>
            </div>
            <?php include '../../db.php'; ?>
            
            <div class="blocks">
                <div class="stories" id="block1"  onclick="location.href='current_genre.php?genre=detective'">
                    <div class="containerGenre">
                        <div class="avatar"><img src="../../image/genre/detective.png" alt="детективы" class="image"></div>
                        <div class="name">Детективы</div>
                    </div>
                </div>
                <div class="stories" id="block2" onclick="location.href='current_genre.php?genre=dramaturg'">
                    <div class="containerGenre">
                        <div class="avatar"><img src="../../image/genre/dramaturg.png" alt="драматургия" class="image"></div>
                        <div class="name">Драматургия</div>
                    </div>
                </div>
                <div class="stories" id="block3" onclick="location.href='current_genre.php?genre=fantasy'">
                    <div class="containerGenre">
                        <div class="avatar"><img src="../../image/genre/fantasy.png" alt="фентези" class="image"></div>
                        <div class="name">Фентези</div>
                    </div>
                </div>
                <div class="stories" id="block4" onclick="location.href='current_genre.php?genre=science_fiction'">
                    <div class="containerGenre">
                        <div class="avatar"><img src="../../image/genre/science_fiction.png" alt="научная фантастика" class="image"></div>
                        <div class="name">Научная <br> фантастика</div>
                    </div>
                </div>
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