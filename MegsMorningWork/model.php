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
            
            $stmt = $this->DB->prepare (" SELECT userid FROM users WHERE userid = :userid");
            $stmt->bindParam ( ':userid', $userid );
            $stmt->execute ();
            $useridMatches = $stmt->fetchAll ( PDO::FETCH_ASSOC );
            if(count($useridMatches) != 0){
                return FALSE;
            }

            $stmt1 = $this->DB->prepare (" INSERT INTO users (userid, name, hash, publication)
                VALUES (:userid, :name, :hash, :publication) ");
            $stmt1->bindParam ( ':userid', $userid );
            $stmt1->bindParam ( ':name', $name );
            $stmt1->bindParam ( ':hash', $hash );
            $stmt1->bindParam ( ':publication', $publication );
            $stmt1->execute ();
            return TRUE;
        }

        public function verified($username, $password) {
            $stmt = $this->DB->prepare(" SELECT username, hash FROM users WHERE username = :username");
            $stmt->bindParam ( ':username', $username );
            $stmt->execute ();
            $rowCount = $stmt->rowCount ();

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
            $stmt = $this->DB->prepare ( "SELECT * FROM movies WHERE title = :title ORDER BY id DESC, added" );
            $stmt->bindParam ( 'title', $title );
            $stmt->execute ();
            return $stmt->fetchAll ( PDO::FETCH_ASSOC );
        }

        public function addNewMovie($title, $year, $cast, $director, $producer, $mpaRating, $releaseDate, $synopsis, $productionCompany, $runTime, $genre, $releaseDate, $boxOffice, $links, $imagePath){
            $stmt = $this->DB->prepare ( "INSERT INTO movies (title, year, rating, imagePath, cast, director, producer , mpaRating, releaseDate, synopsis, productionCompany, runTime, genre, boxOffice, links)
                values(:title, :year, 0, :imagePath, :cast, :director, :producer , :mpaRating, :releaseDate, :synopsis, :productionCompany, :runTime, :genre, :boxOffice, :links)" );
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
            $stmt->bindParam ( 'boxOffice', $boxOffice );
            $stmt->bindParam ( 'releaseDate', $releaseDate );
            $stmt->bindParam ( 'links', $links );
            $stmt->bindParam ( 'imagePath', $imagePath);
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

            $stmt1->$this->DB->prepare ( "SELECT * FROM reviews WHERE title = :title AND rating= :rating" );
            $stmt1->bindParam ( 'title', $title );
            $stmt1->bindParam ( 'rating', $rating );
            $stmt1->execute ();
            $fresh = count($stmt1->fetchAll ( PDO::FETCH_ASSOC ));

            $stmt2 = $this->DB->prepare ("SELECT * FROM reviews WHERE title = :title");
            $stmt2->bindParam ( 'title', $title );
            $stmt2->execute ();
            $total = count($stmt2->fetchAll ( PDO::FETCH_ASSOC ));

            $newRating = ceil( $fresh/$total );

            $stmt3 = $this->DV->prepare( " UPDATE movies SET rating = :rating WHERE title = :title ");
            $stmt3->bindParam ( 'rating', $newRating );
            $stmt3->bindParam ( 'title', $title );
            $stmt3->execute ();
        }

        public function getNewestMovies(){
            $stmt = $this->DB->prepare ( "SELECT * FROM movies ORDER BY releaseDate LIMIT 4");
            $stmt->execute ();
            return $stmt->fetchAll ( PDO::FETCH_ASSOC );
        }

        public function autoCompleteResults($str){
            $stmt = $this->DB->prepare ("SELECT title, year FROM movies WHERE title, year LIKE $str ORDER BY title");
            $stmt->execute ();
            return $stmt->fetchAll ( PDO::FETCH_ASSOC );
        }
    }

    ?>