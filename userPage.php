    <?php

$servername = 'localhost';
$database = 'quotes';
$username = 'root';
$password = '';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO quote (quote, author, rating, flagged)
    VALUES (:quote, :author, :rating, :flagged)");
    $stmt->bindParam(':quote', $quote);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':flagged', $flagged);

    // insert a row
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            $quote = $_POST["quote"];

                            $author = $_POST["author"];

                            $rating = 0;

                            $flagged = 'f';
                          }
    $stmt->execute();


    require_once("./quotes.php");
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>
