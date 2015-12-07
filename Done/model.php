<?php
class Model
{
    private $DB;
    private $servername = 'localhost';
    private $database = 'rtomatoes';
    private $username = 'root';
    private $password = '';
    private $rowCount;
    private $quote;

    public function __construct() {
        try {
            $this->DB = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);

            // set the PDO error mode to exception
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }

    public function register($userId, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->DB->prepare("INSERT INTO users (userId, hash)
                VALUES (:userId, :hash) ");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':hash', $hash);
        $stmt->execute();
    }

    public function verified($userId, $password) {
        $stmt = $this->DB->prepare(" SELECT hash FROM users WHERE userId = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $user = $stmt->fetch();
        $hash = $user['hash'];
        if (password_verify($password, $hash)) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function uniqueUsername($userId) {
        $stmt = $this->DB->prepare(" SELECT * FROM users WHERE userId = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $user = $stmt->fetch();
        $rowCount = $stmt->rowCount();
        if ($rowCount == 0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function movieDoesNotExist($title) {
        $stmt = $this->DB->prepare(" SELECT * FROM movies WHERE title = :title");
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        $user = $stmt->fetch();
        $rowCount = $stmt->rowCount();
        if ($rowCount == 0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function isPNG($fileName) {

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $fileName);
        return ($mime === 'image/png');
    }

    public function getMoviesAsArray() {

        $stmt = $this->DB->prepare("SELECT title FROM movies");
        $stmt->execute();
        $allMovies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $allMovies;
    }

    public function getReviewAsArray($title) {

        $stmt = $this->DB->prepare("SELECT reviews.comment, reviews.rating, reviewers.firstName, reviewers.lastName, reviewers.publication
            FROM reviews INNER JOIN reviewers on reviews.userId = reviewers.userId
            WHERE reviews.title = :title");
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        $currentMovieReview = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $currentMovieReview;
    }

    public function getMovieInfo($title) {

        $stmt = $this->DB->prepare("SELECT year, director, mpaaRating, runTime, boxOffice, posterImage FROM movies where title = :title");
        $stmt->bindParam('title', $title);
        $stmt->execute();
        $movieInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $movieInfo;
    }

    public function addNewMovie($title, $year, $rating, $director, $mpaaRating, $runTime, $boxOffice, $posterImage) {
        $stmt = $this->DB->prepare("INSERT INTO movies (title, year, rating, director, mpaaRating , runTime, boxOffice, posterImage)
                VALUES(:title, :year, :rating, :director, :mpaaRating, :runTime, :boxOffice, :posterImage);");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':director', $director);
        $stmt->bindParam(':mpaaRating', $mpaaRating);
        $stmt->bindParam(':runTime', $runTime);
        $stmt->bindParam(':boxOffice', $boxOffice);
        $stmt->bindParam(':posterImage', $posterImage);
        $stmt->execute();
    }

    public function addNewReview($title, $userId, $comment, $rating) {

        $stmt = $this->DB->prepare("INSERT INTO reviews (title, userId, comment, rating) values(:title, :userId, :comment, :rating)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':rating', $rating);
        $stmt->execute();
    }

    public function addNewReviewer($userId, $firstName, $lastName, $publication) {

        $stmt = $this->DB->prepare("INSERT INTO reviewers (userId, firstName, lastName, publication) values(:userId, :firstName, :lastName, :publication)");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':publication', $publication);
        $stmt->execute();
    }
}
?>