<?php
 include '../../db.php';
//var_dump($_POST);

if (isset($_POST["name"]) && isset($_POST["id_user"]) &&isset($_POST["description"]) && isset($_POST["genre"]) && isset($_POST["img"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $genre = $_POST["genre"];
    $img = $_POST["img"];
    $id_user = $_POST["id_user"];
    $ava = "";
    $id_story = -1;
    $res = mysqli_query($connection, "select  max(id_story)`max` from main_story_data");
    $id = $res->fetch_array()["max"];
    if($id==null){
        $id_story = 1;
       
    }else{
        $id_story = $id+1;
        
    }
   
    mysqli_query($connection, "insert into main_story_data (id_story,id_user,name,genre,description,avatar) values ('$id_story','$id_user','$name','$genre','$description','$ava');");
    mysqli_query($connection, "insert into part_story_data value('$id_story')");
    mysqli_query($connection, "update  user_profile_data set count_publish = count_publish+1 where id_user =('$id_user')");
    header("Location: edit_story_page.php?id_story='$id_story'&id_user='$id_user'");
}

?>