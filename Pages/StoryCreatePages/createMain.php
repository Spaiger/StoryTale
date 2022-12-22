<?php
 include '../../db.php';
//var_dump($_POST);

if (isset($_POST["comment"]) && isset($_POST["name"]) && isset($_POST["id_user"]) &&isset($_POST["description"]) && isset($_POST["genre"]) && isset($_POST["img"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $genre = $_POST["genre"];
    $img = $_POST["img"];
    $id_user = $_POST["id_user"];
    $comment = $_POST["comment"];
    $ava = "";
    $id_story = -1;
    $res = mysqli_query($connection, "select  max(id_story)`max` from main_story_data");
    $id = $res->fetch_array()["max"];
    if($id==null){
        $id_story = 1;
       
    }else{
        $id_story = $id+1;
        
    }
    $vowels = array("</", "<", ">","`","\"","'","--","*",";");
    $name =str_replace($vowels, "", $name);
    $description =str_replace($vowels, "", $description);
    $comment = str_replace($vowels, "",$comment);
    $stmt = $connection->prepare("insert into main_story_data (id_story,id_user,name,genre,description,comment,avatar) values (?,?,?,?,?,?,?);");
    $stmt->bind_param("iisssss", $id_story,$id_user,$name,$genre,$description,$comment,$ava);
    $stmt->execute();
    //mysqli_query($connection, "insert into main_story_data (id_story,id_user,name,genre,description,comment,avatar) values ('$id_story','$id_user','$name','$genre','$description','$comment','$ava');");
    $stmt = null;
    $stmt = $connection->prepare("insert into part_story_data value(?)");
    $stmt->bind_param("i", $id_story);
    $stmt->execute();
    //mysqli_query($connection, "insert into part_story_data value('$id_story')");
    $stmt = null;
    $stmt = $connection->prepare("update  user_profile_data set count_publish = count_publish+1 where id_user =?");
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    //mysqli_query($connection, "update  user_profile_data set count_publish = count_publish+1 where id_user =('$id_user')");
    header("Location: edit_story_page.php?id_story='$id_story'&id_user='$id_user'");
}

?>