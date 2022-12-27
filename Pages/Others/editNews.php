<?php
session_start();
var_dump($_POST);
include '../../db.php';
if (isset($_POST['id_story']) && isset($_POST['name']) && isset($_POST['description'])) {
    $id_story = $_POST['id_story'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $vowels = array("</", "<", ">", "`", "\"", "'", "--", "*", ";");
    $name = str_replace($vowels, "", $name);
    $description = str_replace($vowels, "", $description);
    $stmt = $connection->prepare("update  main_story_data set name = ? ,description = ? where id_story = ?");
    $stmt->bind_param("ssi", $name, $description, $id_story);
    $stmt->execute();
    if ($stmt) {
        
        header("location: ../../index.php");
    }
} else {
    echo 'loh';
    header("location: ../../index.php");
}
