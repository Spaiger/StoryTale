<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link rel="stylesheet" href="GenrePage.css">
</head>
<body>
    <script src="MainPage.js"></script>

    <div class="con">
        <div class="content">
        <?php include '../appbar.php'; ?>
            <div class="input"><input type="text" class="search"></div>
            <div class="pipi">
                <div class="NewStory">+</div>
                <!-- <div class="title">Все работы</div> -->
            </div>
            <div class="blocks">
                <div class="stories" id="block1">123 &#9829</div>
                <div class="name">
                    <p id="username">Название</p>
                    <p id="workscount">Анннотация:</p>
                </div>
            </div>
            <!-- <div class="blocks">
                <div class="stories" id="block1">s</div>
                <div class="stories" id="block2">s</div>
                <div class="stories" id="block3">s</div>
                <div class="stories" id="block4">s</div>
            </div> -->
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>