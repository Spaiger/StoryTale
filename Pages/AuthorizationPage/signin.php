<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: ../../index.php');
    }

    include '../../db.php';
    $errorArray = array();

    if (!isset($_POST["password"])) {
        $errorArray[] = (array("password" => false));
    }

    if (!isset($_POST["email"])) {
        $errorArray[] = (array("email" => false));
    }

    if (count($errorArray) == 0) {
        $userEmail = $_POST["email"];
        $userPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
        if (!ValidateUserEmail($userEmail)) {
            $errorArray[] = (array("validUserEmail" => false));
        } else {
            $find = mysqli_query($connection, "select * from user_data where email = '$userEmail'");
            $user = $find->fetch_assoc();

            if (!password_verify($_POST["password"], $user['password'])) {
                $errorArray[] = (array("IncorrectPassword" => false));
            } else {
                $_SESSION["user"] = $userEmail;

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
?>