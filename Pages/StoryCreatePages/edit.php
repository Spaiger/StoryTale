<?php

session_start();
include '../../db.php';
$id = $_SESSION["user"];

//var_dump($_POST);
$id_story = $_POST["id_story"];
$name = $_POST["name"];
$genre = $_POST["genre"];
$description = (string)$_POST["description"];
$comment = $_POST["comment"];
$avatar = isset($_POST["avatar"])?$_POST["avatar"]:null;


$query = "update main_story_data
set avatar = '$avatar',
    genre = '$genre',
    name ='$name',
    description = '$description',
    comment = '$comment' 
where id_story = '$id_story';";
$res = mysqli_query($connection, $query);
if($res){
    //echo $id;
    header("location: ../ProfilePage/profile.php?id_user=$id");
}

?>