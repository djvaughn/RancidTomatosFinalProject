<?php
    class Model {
        private $servername = 'localhost';
        private $database = 'quotes';
        private $username = 'root';
        private $password = '';
        private $rowCount;
        private $quote;

        public function __construct(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT rating, quote, author, id, flagged FROM quote ORDER BY rating DESC;");
                $stmt->execute();
                $this->rowCount = $stmt->rowCount();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $this->quote = $stmt->fetchAll();
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }

        public function getRowCount(){
            return $this->rowCount;
        }
         public function getAllQuotes(){
            return $this->quote;
        }
        public function isFlagged($i){
            return $this->quote[$i]['flagged']=="d";
        }
    }

    ?>