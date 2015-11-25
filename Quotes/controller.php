<?php
        $servername = 'localhost';
        $database = 'quotes';
        $username = 'root';
        $password = '';
        header ( "Location: quotes.php" );
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $button = $_POST["Button"];
            $id =  $_POST["ID"];
            $rating =  $_POST["QR"];
            if ($button == "+") {
                $rating += 1;
                try {

                    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE quote SET rating=:rating WHERE id= :id";
                    // Prepare statement
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    // execute the query
                    $stmt->execute();
                }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
                $conn = null;
            }
            else if ($button == "-") {
                $rating -= 1;
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE quote SET rating=:rating WHERE id= :id";
                    // Prepare statement
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    // execute the query
                    $stmt->execute();
                }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
                $conn = null;
            }else{
                $flagged = "d";
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE quote SET flagged=:flagged WHERE id= :id";
                    // Prepare statement
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':flagged', $flagged, PDO::PARAM_INT);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    // execute the query
                    $stmt->execute();
                }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
                $conn = null;

            }
            require_once("./showQuotes.php");
        }
?>