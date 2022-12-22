<?php
session_start();
include '../../db.php';
if (isset($_GET["id_user"])) {
    if (intval($_GET["id_user"]) != $_GET["id_user"]) {
        header("location: ../../logout.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все работы</title>
    <link rel="stylesheet" href="profileworks.css">
    <link rel="stylesheet" href="../footer.css">
    <script src="jquery-3.6.2.min.js" type="text/javascript">
       
   </script>
   <script> 
     function one(id) {
          $.ajax({
            url: 'ajax.php',
            method: 'get',
            dataType: 'html',
            data: {"id_story":id },
          });
        }
</script>
</head>

<body>
    <script src="MainPage.js"></script>
    
    <div class="con">
        <div class="content">
            <?php include '../appbar.php'; ?>
            <!-- <div class="input"><input type="text" class="search"></div> -->
            <div class="pipi">
                <div class="NewStory">+</div>
                <div class="title">Все работы</div>
            </div>
            <?php
            $id = $_GET["id_user"];
            $res = mysqli_query($connection, "select * from main_story_data where id_user = '$id';");
            $ans = [];
            while($row =$res->fetch_assoc()){
                
                $ans[] = $row;
            }

           // var_dump($ans[0]["id_story"]);
            
            //var_dump($res);
            //var_dump($res[6]);
            if($res){
                echo '<div class="blocks">';
                for ($i=1; $i <= count($ans); $i++) {
                    echo ' <div class="stories" id="block'.$i.'" onclick="location.href=\'../StoryCreatePages/edit_story_page.php?id_story='.$ans[$i-1]["id_story"].'&id_user='.$id.';\'">'.$ans[$i-1]["name"].'</div>';
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
       <?php include "../footer.php"; ?>
    </div>
</body>

</html>