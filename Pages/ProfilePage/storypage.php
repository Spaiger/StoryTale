<?php
session_start();
if (!isset($_GET["id_story"])) {

    header("location: ../../index.php");
} else {
    if (intval($_GET["id_story"]) != $_GET["id_story"]) {
        header("location: ../../logout.php");
    }
}

if(isset($_SESSION["user"])){
    $id_session = $_SESSION["user"];
}else{
    $id_session = null;
}

$id_story = $_GET["id_story"];
include '../../db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link rel="stylesheet" href="storypage.css">
    <link rel="stylesheet" href="../footer.css">
</head>

<body>
    <script src="MainPage.js"></script>

    <div class="con">
        <div class="content">
            <?php
            include '../appbar.php';
            
            $res = mysqli_query($connection, "SELECT * from main_story_data where id_story ='$id_story'");
            $res = $res->fetch_assoc();
            $name = $res["name"];
            $annotation = $res["description"];
            $description = $res["comment"];
            $avatar = $res["avatar"];
            $id_user = $res["id_user"];

            $flag = false;
           // var_dump($id_user);
            //var_dump($id_session);
            if($id_user==$id_session){
                $flag = true;
                
            }

            mysqli_query($connection, "UPDATE  part_story_data set visit = visit+1 where id_story = '$id_story'");
           


            ?>
    
            <div class="blocks">
                <div class="stories" id="block1">123 &#9829</div>
                <div class="name">
                <p id="username"><?php echo $name ?></p>  
                    
                    <p id="workscount">Анннотация:<?php echo $annotation ?></p>
                </div>
                <div class="description">
                    <?php echo $description ?>
                </div>
            <?php if($flag){ ?>
                <div class="button" onclick="location.href='../StoryCreatePages/edit_story_page.php<?php echo '?id_story='.$id_story.'&id_user='.$id_user ?>';">Редактировать</div>
            <?php }?>
            </div>


        </div>
        <?php include '../footer.php'; ?>
    </div>
</body>

</html>