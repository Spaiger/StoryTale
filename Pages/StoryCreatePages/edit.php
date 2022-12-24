<?php

session_start();
include '../../db.php';
$id = $_SESSION["user"];

var_dump($_POST);
$id_story = $_POST["id_story"];
$name = $_POST["name"];
$genre = $_POST["genre"];
$description = (string)$_POST["description"];
$comment = $_POST["comment"];
$avatar = isset($_POST["img"])?$_POST["img"]: "default.png";

$vowels = array("</", "<", ">","`","\"","'","--","*",";");
$name =str_replace($vowels, "", $name);
$description =str_replace($vowels, "", $description);
$comment = str_replace($vowels, "",$comment);

$stmt = $connection->prepare("update  main_story_data set name = ? , genre = ?,description = ?, comment = ? where id_story =?");
$stmt->bind_param("ssssi",$name,$genre,$description,$comment,$id_story);
$stmt->execute();
if($stmt){
   
    header("location: ../ProfilePage/profile.php?id_user=$id");
}
/*$query = "UPDATE main_story_data
set genre = '$genre',
    description =  '$description' ,
    name = '$name' ,
   
    comment =  '$comment'  
where id_story = '$id_story' ;";
$res = mysqli_query($connection, $query);

if($res){
    //echo $id;
    header("location: ../ProfilePage/profile.php?id_user=$id");
}
*/
?>