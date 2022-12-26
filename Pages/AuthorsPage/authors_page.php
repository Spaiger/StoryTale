<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторы</title>
    <link rel="stylesheet" href="AuthorsPage.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<link rel="stylesheet" href="../../styles/austyle.css">';
    }
    ?>
</head>

<body>
    <script src="author_page.js"></script> 
    <?php include '../menu.php'; ?>
    <div class="con" id = "conn">
        <div class="content">
            <?php include '../appbar.php'; ?>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <!-- <div class="NewStory">+</div> -->
                <div class="title">Авторы</div>
            </div>
            <div class="kost">
            <?php
            include '../../db.php';
            $usersData = mysqli_query($connection, "SELECT distinct nickname,id_user,avatar from user_data order by rand() limit 8 ;");
            for ($i = 0; $i < 4; $i++) {
                echo '<div class="blocks" id="b'.$i.'">';
                for ($j = 1; $j <= 2; $j++) {
                    $userDataRow = $usersData->fetch_row();

                   // echo '<div class="stories" onclick="location.href=\'../ProfilePage/profile.php?id_user=' . $userDataRow[1] . '\'" name="id_user" id="block' . $j . '">' . $userDataRow[0] . '</div>';
                    echo '
                    <div class="stories" onclick="location.href=\'../ProfilePage/profile.php?id_user='.$userDataRow[1].'\'" name="id_user" id="block'.$j.'">
                        <div class="user">
                            <div class="avatar"><img class="image" src="../../image/user/'. $userDataRow[2].'" alt="" width="50" ></div>
                            <div class="nickname">'.$userDataRow[0].'</div>
                        </div>
                    </div>
                    ';
                }

                echo '</div>';
            }
            ?>
            </div>
        </div>
        <?php
        include "../footer.php";
        ?>
    </div>
</body>

</html>