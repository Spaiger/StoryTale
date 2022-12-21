<?php
session_start();
var_dump($_GET);
$data = $_GET;
if(!isset($_SESSION['user'])){
    header("location: ../../index.php");
}else if(isset($_SESSION['user'])){
    if ($_SESSION['user'] != $_GET["id_user"]){
        header("location: ../../index.php");
    }        
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать историю</title>
    <link rel="stylesheet" href="authorization_page.css">
</head>

<body>
    <script src="MainPage.js"></script>
    <div class="con">
        <div class="content">
            <div class="title">
                <div class="text">Создать</div>
            </div>
            <form action="edit.php" method="post">
                <input type="hidden" name="id_user" value="<?php echo $_GET["id_user"] ?>">
                <input type="hidden" name="id_story" value="<?php echo $_GET["id_story"] ?>">
                <div class="in">
                    <div class="ni2">Обложка<input type="file" class="input" id="image" name="img" ></div>
                </div>
                <div class="in">
                    <div class="ni2">Назание<input type="text" name="name" class="input" id="name"  ></div>
                </div>
                <div class="in">
                    <div class="ni2">
                        Жанр
                        <select name="genre" class="input" id="genre">
                            <option value="loh">Loh</option>
                            <option value="neloh">NeLoh</option>
                        </select>
                    </div>
                </div>
                <div class="in">
                    <div class="ni2">Описание<input type="text" name="description" class="input" id="description" ></div>
                </div>
                <input class="button" id="au" type="submit" value="Создать историю" style="border: none;">
            </form>
        </div>
        <div class="footer"></div>
    </div>
</body>

</html>