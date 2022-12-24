<?php
 include '../../db.php';
//var_dump($_POST);

if (isset($_POST["comment"]) && isset($_POST["name"]) && isset($_POST["id_user"]) &&isset($_POST["description"]) && isset($_POST["genre"]) ) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $genre = $_POST["genre"];
    
    $id_user = $_POST["id_user"];
    $comment = $_POST["comment"];
   
    
    $vowels = array("</", "<", ">","`","\"","'","--","*",";");
    $name =str_replace($vowels, "", $name);
    $description =str_replace($vowels, "", $description);
    $comment = str_replace($vowels, "",$comment);
    $stmt = $connection->prepare("insert into main_story_data (id_user,name,genre,description,comment) values (?,?,?,?,?);");
    $stmt->bind_param("issss",$id_user,$name,$genre,$description,$comment);
    $stmt->execute();
    //mysqli_query($connection, "insert into main_story_data (id_story,id_user,name,genre,description,comment,avatar) values ('$id_story','$id_user','$name','$genre','$description','$comment','$ava');");
    $stmt = null;
    
    //mysqli_query($connection, "insert into part_story_data value('$id_story')");
    $stmt = null;
    $stmt = $connection->prepare("update  user_data set count_publish = count_publish+1 where id_user =?");
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    //mysqli_query($connection, "update  user_profile_data set count_publish = count_publish+1 where id_user =('$id_user')");
    header("Location: ../ProfilePage/profile.php?id_user=$id_user");
}

?>