<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Популярное</title>
    <link rel="stylesheet" href="PopularPage.css">
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
        <?php include '../appbar.php'; ?>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <div class="NewStory">+</div>
                <div class="title">Популярное</div>
            </div>
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