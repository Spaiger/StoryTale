<?php
session_start();

if(isset($_GET["genre"])){
    $get_genre = $_GET["genre"];
    
    if($get_genre == "detective"){$value = "Детективы";}
    if($get_genre == "science_fiction"){$value = "Научная фантастика";}
    if($get_genre == "fantasy"){$value = "Фентези";}
    if($get_genre == "dramaturg"){$value = "Драматургия";}
}else{
    header("location: genre_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $value ?></title>
    <link rel="stylesheet" href="CurrentGenre.css">
    <link rel="stylesheet" href="../footer.css">
    <link rel="stylesheet" href="../menustyle.css">
    <?php
    if (isset($_SESSION['user'])) {
        echo '<link rel="stylesheet" href="../../styles/austyle.css">';
    }
    ?>
</head>

<body>
    <script src="current_genre_page.js"></script>
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
    <div class="con" id = "conn">
        <div class="content">
            <?php include '../appbar.php' ?>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <!-- <div class="NewStory">+</div> -->
                <div class="title"><?php echo $value ?></div>
            </div>
            <?php include '../../db.php';
            

            $res = mysqli_query($connection, "SELECT * from main_story_data where genre = '$get_genre'");
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
                   // echo ' <div class="stories" id="block' . $i . '" onclick="location.href=\'../StoryCreatePages/edit_story_page.php?id_story=' . $ans[$i - 1]["id_story"] . '&id_user=' . $id . ';\'">' . $ans[$i - 1]["name"] . '</div>';
                    
                echo '
                
                <div class="ad">
                    <div class="stories" id="block'.$i.'" onclick="location.href=\'../ProfilePage/storypage.php?id_story='.$ans[$i - 1]["id_story"].'\'">
                        <div class="storyContent" >
                            <div class="number">'.$i.'</div>
                            <div class="imageContainer"><img class="image" src="../../image/story/default.png" width="50" height="50"></div>
                            <div class="name">'.$ans[$i-1]["name"].'</div>
                            <div class="description">'.$ans[$i-1]["description"].'</div>
                        </div>
                    </div>
                    <div class="admin">
                        <div class="NewStory" onclick="delet()">&#128465;</div>
                        <div class="NewStory">&#9998;</div>
                    </div>
                </div>
                
                ';
                }

                  echo '</div>';
                  /*'.$ans[$i-1]["avatar"].'*/
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