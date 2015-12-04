<?php
session_start();
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $button = $_POST["Button"];
            $id =  $_POST["ID"];
            $model = $_POST["MODEL"];
            if ($button == "movie") {

            }
            else if ($button == "review") {
                $title = $_POST["TITLE"];
                $userid = $_POST["USERID"];
                $comment =  $_POST["COMMENT"];
                $rating = $_POST["RATING"];
                $model->addNewReview($title, $userid, $comment, $rating);
            }else if($button == "register"){
                $password = $_POST["PASSWORD"];
                $userid = $_POST["USERID"];
                $name =  $_POST["NAME"];
                $publication = $_POST["PUBLICATION"];
                $model->register($userid, $password, $name, $publication);

            }else if($button == "LOGIN"){
                $password = $_POST["PASSWORD"];
                $userid = $_POST["USERID"];
                if($model->verified($username, $password)){
                    $_SESSION['login'] = "TRUE";
                    $_SESSION['name'] = $userid;
                    header("Location: index.php?mode=main");
                    exit;
                }else{
                    $problem = "TRUE";
                    header("'Location: loginRegistrationPage.php?problem=$problem");
                    exit;
                }

            }else if($button == "LOGOUT"){
                unset($_SESSION['login']);
                unset($_SESSION['name']);
                setcookie('PHPSESSID', null, -1, '/');
                header("Location: index.html");
                exit;
            }
            require_once("./showQuotes.php");
        }
?>