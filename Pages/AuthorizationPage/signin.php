<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: ../../index.php');
    }
    unset($_SESSION['msg']);
    include '../../db.php';
    $errorArray = array();

    if (!isset($_POST["password"])) {
         $_SESSION['msg'] = "Не указан пароль";
        $errorArray[] = (array("password" => false));
    }

    if (!isset($_POST["email"])) {
        $_SESSION['msg'] = "Не указан email адрес";
        $errorArray[] = (array("email" => false));
    }

    if (count($errorArray) == 0) {
        $userEmail = $_POST["email"];
        $userPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
        if (!ValidateUserEmail($userEmail)) {
            $_SESSION['msg'] = "Неправильный email адрес";
            $errorArray[] = (array("validUserEmail" => false));
        } else {
            $find = mysqli_query($connection, "select * from user_data where email = '$userEmail'");
            $user = $find->fetch_assoc();
        //var_dump($user);
            if(!($user)){
                $_SESSION['msg'] = "Не удалось найти такой email";
                header("Location: authorization_page.php");
            die;
            }
            if (!password_verify($_POST["password"], $user['password'])) {
                $_SESSION['msg'] = "Неправильный пароль";
                header("Location: authorization_page.php");
            die;
            } else {
                $idRes = mysqli_query($connection, "select id_user from user_data where email = '$userEmail'");
                $id = $idRes->fetch_assoc();
               
                $_SESSION["user"] = $id["id_user"];
            
                unset($_SESSION['msg']);
                header('Location: ../../index.php');
            }
        }
    }
    if (count($errorArray) > 0){
        header("Location: authorization_page.php");
    } 


    function ValidateUserEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
