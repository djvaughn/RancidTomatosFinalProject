<!DOCTYPE html>
<html>

<head>
    <title>Rancid Tomatoes</title>
    <link rel="stylesheet" href="movie.css">
</head>

<body>
    <!--  A SPA with 2 views -->
    <?php
      if(isset($_GET['mode'])) {

        if ($_GET['mode'] === 'main') {

          require_once("./mainPage.php");

        }else if ($_GET['mode'] === 'login'){

          require_once("./loginRegistration.php");

        }else if ($_GET['mode'] === 'addMovie'){

          require_once("./addMovie.php");

        }else if ($_GET['mode'] === 'addReview'){

          require_once("./addReview.php");

        }

      }else if(isset($_GET['film'])) {
        $film = $film = $_GET["film"];
        header("'Location: reviewPage.php?film=$film");
        exit;
      }else{
         require_once("./mainPage.php");
      }
    ?>
</body>

</html>