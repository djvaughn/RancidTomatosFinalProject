<?php
session_start();
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $button = $_POST["Button"];
            $id =  $_POST["ID"];
            $model = $_POST["MODEL"];
            if ($button == "addMovie") {
                $title = $_POST["title"];
                $year = $_POST["year"];
                $director = $_POST["director"];
                $producer = $_POST["producer"];
                $mpaaRating = $_POST["mpaaRating"];
                $releaseDate = $_POST["releaseDate"];
                $synopsis = $_POST["synopsis"];
                $productionCompany = $_POST["productionCompany"];
                $runTime = $_POST["runTime"];
                $genre = $_POST["genre"];
                $boxOffice = $_POST["boxOffice"];
                $links = $_POST["links"];
                $imagePath="";
                addNewMovie($title, $year, $cast, $director, $producer, $mpaaRating, $releaseDate, $synopsis, 
                    $productionCompany, $runTime, $genre, $releaseDate, $boxOffice, $links, $imagePath);
                header("Location: reviewPage.php?movie=$title");
            }
            else if ($button == "movieReview"){
                

            }
            else if ($button == "newReview") {
                $title = $_POST["TITLE"];
                $userid = $_POST["USERID"];
                $comment =  $_POST["COMMENT"];
                $rating = $_POST["RATING"];
                $model->addNewReview($title, $userid, $comment, $rating);
                $titlePass = str_replace (' ','',$title);
                $titlePass = substr ( $titlePass, 0, 27 );
                header ( " Location: index.php?film=$titlePass" );
                exit;
                
            }
            else if($button == "register"){
                $password = $_POST["PASSWORD"];
                $userid = $_POST["USERID"];
                $name =  $_POST["NAME"];
                $publication = $_POST["PUBLICATION"];

                if($model->register($userid, $password, $name, $publication)){
                    $_SESSION['login'] = "TRUE";
                    $_SESSION['name'] = $userid;
                    header ( "Location: index.php?mode=main" );
                    exit;
                }
                else{
                    $problem = "useridTaken"
                    header ( "Location: index.php?mode=login&problem=$problem" );
                    exit;
                }

            }
            else if($button == "LOGIN"){
                $password = $_POST["PASSWORD"];
                $userid = $_POST["USERID"];

                if($model->verified($username, $password)){
                    $_SESSION['login'] = "TRUE";
                    $_SESSION['name'] = $userid;
                    header("Location: index.php?mode=main");
                    exit;
                }
                else{
                    $problem = "notVerified";
                    header("'Location: index.php?mode=login&problem=$problem");
                    exit;
                }

            }
            else if($button == "LOGOUT"){
                unset ( $_SESSION['login']);
                unset ( $_SESSION['name']);
                setcookie ( 'PHPSESSID', null, -1, '/' );
                header ( "Location: index.html?mode=main" );
                exit;

            }
            else if($button == "search"){
                $str = $POST_["str"];
                $autoList = $model->autoCompleteResults($str);
                echo $autoList;
            }
            require_once("./model.php");
        }
?>