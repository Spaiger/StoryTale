<?php

include '../../db.php';

if(!isset($_GET["id_story"])){
    header("location: ../../index.php");
}
$id_story = $_GET["id_story"];

