<?php
require_once ("model.php");
$theModel = new Model();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginID']) && isset($_POST['loginPassword'])) {
        $userId = $_POST['loginID'];
        $password = $_POST['loginPassword'];
        session_start();
        if ($theModel->verified($userId, $password)) {
            $_SESSION['user'] = $userId;
            header("Location: index.php");
        }
        else {
            $_SESSION['loginProblem'] = 'Username and/or Password';
            header("Location: login.php");
        }
    }
    else if (isset($_POST['registerID']) && isset($_POST['registerPassword'])) {
        $firstName = htmlspecialchars(trim($_POST['registerFName']));
        $lastName = htmlspecialchars(trim($_POST['registerLName']));
        $publication = htmlspecialchars(trim($_POST['publication']));
        $userId = $_POST['registerID'];
        $password = $_POST['registerPassword'];
        session_start();
        if ($theModel->uniqueUsername($userId)) {
            $theModel->register($userId, $password);
            $theModel->addNewReviewer($userId, $firstName, $lastName, $publication);
            $_SESSION['user'] = $userId;
            header("Location: index.php");
        }
        else {
            $_SESSION['registerProblem'] = 'Username not unique';
            header("Location: login.php");
        }
    }
    else if (isset($_POST['addMovietitle'])) {
        $title = htmlspecialchars(trim($_POST['addMovietitle']));

        if ($theModel->movieDoesNotExist($title)) {

            if (!isset($_FILES['file']['error']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                echo "" . $_FILES['file']['error'];
                die("Upload failed with error");
            }

            if (!$theModel->isPNG($_FILES['file']['tmp_name'])) {
                die("Cannot upload the file as it is not a PNG file");
            }
            $filePath = "/Applications/XAMPP/xamppfiles/htdocs/Done/moviePoster/" . $title . ".png";
            if (!file_exists($filePath)) {
                if (!move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
                    echo "Upload failed.";
                }
            }
            $filePath = "moviePoster/" . $title . ".png";
            $year = htmlspecialchars(trim($_POST['year']));
            $director = htmlspecialchars(trim($_POST['director']));
            $runTime = htmlspecialchars(trim($_POST['runTime']));
            $boxOffice = htmlspecialchars(trim($_POST['boxOffice']));
            $mpaaRating = htmlspecialchars(trim($_POST['mpaaRating']));
            $theModel->addNewMovie($title, $year, 0, $director, $mpaaRating, $runTime, $boxOffice, $filePath, 0, 0);
            session_start();
            $_SESSION["movie"] = $title;
            header("Location: movie.php");
        }
        else {
            session_start();
            $_SESSION['failureToAdd'] = true;
            header("Location: addMovie.php");
        }
    }
    else if (isset($_POST['reviewReview'])) {
        $title = htmlspecialchars(trim($_POST['addReviewtitle']));
        if (!$theModel->movieDoesNotExist($title)) {
            $rating = htmlspecialchars(trim($_POST['rating']));
            $review = htmlspecialchars(trim($_POST['reviewReview']));
            session_start();
            $userId = $_SESSION['user'];
            $theModel->addNewReview($title, $userId, $review, $rating);
            $theModel->updateMovieReview($title, $rating);
            $_SESSION["movie"] = $title;
            header("Location: movie.php");
        }else{
            $_SESSION["noMovie"] = true;
            header("Location: addReview.php");
        }
    }
}
?>