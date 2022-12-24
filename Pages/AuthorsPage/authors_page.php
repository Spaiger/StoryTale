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
                <!-- <div class="NewStory">+</div> -->
                <div class="title">Авторы</div>
            </div>
            <?php
            include '../../db.php';
            $usersData = mysqli_query($connection, "SELECT distinct nickname,user_data.id_user,upd.avatar from user_data JOIN user_profile_data upd on user_data.id_user = upd.id_user order by rand() limit 8 ;");
            for ($i = 0; $i < 2; $i++) {
                echo '<div class="blocks">';
                for ($j = 1; $j <= 4; $j++) {
                    $userDataRow = $usersData->fetch_row();

                   // echo '<div class="stories" onclick="location.href=\'../ProfilePage/profile.php?id_user=' . $userDataRow[1] . '\'" name="id_user" id="block' . $j . '">' . $userDataRow[0] . '</div>';
                    echo '
                    <div class="stories" onclick="location.href=\'../ProfilePage/profile.php?id_user='.$userDataRow[1].'\'" name="id_user" id="block'.$j.'">
                        <div class="user">
                            <div class="avatar"><img src="../../image/user/'. $userDataRow[2].'" alt="" width="50" ></div>
                            <div class="nickname">'.$userDataRow[0].'</div>
                        </div>
                    </div>
                    ';
                }

                echo '</div>';
            }
            ?>
            
        </div>
        <?php
        include "../footer.php";
        ?>
    </div>
</body>

</html>