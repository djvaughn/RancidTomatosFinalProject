<?php
    class Model {
        private $DB;
        private $servername = 'localhost';
        private $database = 'rancidtomato';
        private $username = 'root';
        private $password = '';
        private $rowCount;
        private $quote;

        public function __construct(){
            try {
                $this->DB = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
                exit();
            }
        }

        public function register($userid, $password, $name, $publication) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->DB->prepare ("INSERT INTO users (userid, name, hash, publication)
                VALUES (:userid, :name, :hash, :publication) ");
            $stmt->bindParam(':userid', $userid);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':hash', $hash);
            $stmt->bindParam(':publication', $publication);
            $stmt->execute();
        }

        public function verified($username, $password) {
            $stmt = $this->DB->prepare(" SELECT username, hash FROM users WHERE username = :username");
            $stmt->bindParam (':username',$username);
            $stmt->execute();
            $rowCount = $stmt->rowCount();

            if ($rowCount != 0) {
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $user = $stmt->fetchAll();
                $hash = $user[0]['hash'];
                if (password_verify($password, $hash)) {
                    return TRUE;
                }
            }
            return FALSE;
        }

        public function getMoviesAsArray($title) {
            // possible values of flagged are 't', 'f';
            $stmt = $this->DB->prepare ( "SELECT * FROM movies WHERE title = :title ORDER BY id DESC, added" );
            $stmt->bindParam ( 'title', $title );
            $stmt->execute ();
            return $stmt->fetchAll ( PDO::FETCH_ASSOC );
        }

        public function addNewMovie($title, $year, $cast, $director, $producer, $mpaRating, $releaseDate, $synopsis, $productionCompany, $runTime, $genre, $releaseDate, $links){
            $stmt = $this->DB->prepare ( "INSERT INTO movies (title, year, rating, cast, director, producer , mpaRating, releaseDate, synopsis, productionCompany, runTime, genre boxOffice, links)
                values(:title, :year, 0, :cast, :director, :producer , :mpaRating, :releaseDate, :synopsis, :productionCompany, :runTime, :genre, :boxOffice, :links)" );
            $stmt->bindParam ( 'title', $title );
            $stmt->bindParam ( 'year', $year );
            $stmt->bindParam ( 'cast', $cast );
            $stmt->bindParam ( 'director', $director );
            $stmt->bindParam ( 'producer', $producer );
            $stmt->bindParam ( 'mpaRating', $mpaRating );
            $stmt->bindParam ( 'releaseDate', $releaseDate );
            $stmt->bindParam ( 'synopsis', $synopsis );
            $stmt->bindParam ( 'productionCompany', $productionCompany );
            $stmt->bindParam ( 'runTime', $runTime );
            $stmt->bindParam ( 'genre', $genre );
            $stmt->bindParam ( 'boxOffice', $releaseDate );
            $stmt->bindParam ( 'links', $links );
            $stmt->execute ();
        }

        public function getReviewAsArray($title) {
            // possible values of flagged are 't', 'f';
            $stmt = $this->DB->prepare ( "SELECT * FROM reviews WHERE title = :title ORDER BY id DESC, added" );
            $stmt->bindParam ( 'title', $title );
            $stmt->execute ();
            return $stmt->fetchAll ( PDO::FETCH_ASSOC );
        }

        public function addNewReview($title, $userid, $comment, $rating) {
            // possible values of flagged are 't', 'f';
           $stmt = $this->DB->prepare ( "INSERT INTO reviews (title, userid, comment, rating) values(:title, :userid, :comment, :rating)" );
            $stmt->bindParam ( 'title', $title );
            $stmt->bindParam ( 'userid', $userid );
            $stmt->bindParam ( 'comment', $comment );
            $stmt->bindParam ( 'rating', $rating );
            $stmt->execute ();
        }
    }

    ?>