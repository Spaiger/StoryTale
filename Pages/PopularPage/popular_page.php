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
                <!-- <div class="NewStory">+</div> -->
                <div class="title">Популярное</div>
            </div>
            <?php
            //$id = $_GET["id_user"];
            $res = mysqli_query($connection, "SELECT main_story_data.id_story, id_user, name, genre, description, comment, avatar,visit from main_story_data join part_story_data psd on main_story_data.id_story = psd.id_story  order by visit desc limit 5;");
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
                
                <div class="stories" id="block'.$i.'" onclick="location.href=\'storypage.php?id_story='.$ans[$i - 1]["id_story"].'\'">
                    <div class="storyContent" >
                        <div class="number">'.$i.'</div>
                        <div class="imageContainer"><img class="image" src="../../image/story/'.$ans[$i-1]["avatar"].'" width="50" height="50"></div>
                        <div class="name">'.$ans[$i-1]["name"].'</div>
                        <div class="description">'.$ans[$i-1]["description"].'</div>
                    </div>
               
                </div>
                
                ';
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