<?php 

if (isset($_GET["id_story"])){
    $_SESSION["del_story"] = $_GET["id_story"];
}
include '../../db.php';
$id = $_GET["id_story"];
$res = mysqli_query($connection, 'select id_user from main_story_data where id_story = '.$id.'');
$id_user = $res->fetch_assoc()["id_user"];
mysqli_query($connection, 'delete from main_story_data where id_story = '.$id.'');
mysqli_query($connection, 'update  user_data set count_publish = count_publish-1 where id_user =' . $id_user . ' ');
?>