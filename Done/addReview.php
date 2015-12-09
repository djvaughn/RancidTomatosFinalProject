<!DOCTYPE html>
<html>

<head>
    <title>RT: Add a Review</title>
            <?php

            $noMovie = false;
            session_start();
            if (!isset($_SESSION['user'])) {
                header("location: login.php");
                exit;
            }
              if (isset($_SESSION['noMovie'])) {
                $noMovie = true;
            }

?>
    <meta charset="utf-8" />
    <link href="movie.css" type="text.css" rel="stylesheet" />
</head>

<body>
    <header>
        <a rel="url" href="mainPage.php"><img src="images/rancidbanner.png" alt="Rancid Tomatoes" /></a>
    </header>
    <div class="container">
        <div class="row main-header">
            <h1>Add a Movie Review</h1>
        </div>
        <div class="main entryRow">
            <section class="reviews-container">
                <aside class="ratings-container">
                    <img src="images/rottenlarge.png" alt="Rotten" />
                    <span class="addMovieInstr">Enter Review Below:</span>
                    <img class="addMovieFresh" src="images/freshlarge.png" alt="Fresh" />
                </aside>
                <div class="entry-wrapper">
                    <form action="controller.php" method="post" id = "addReview" enctype="multipart/form-data"><br>
                        Title: <br> <input type="text" name="addReviewtitle" required><br><br>
                         <fieldset class="field">

                        <legend>My Rating</legend>

                        <input type="radio" value="F" name="rating" required/>Fresh
                        <br>
                        <input type="radio" value="R" name="rating">Rotten
                        <br>
                    </fieldset>
                        <br >
                        Review: <br> <textarea rows="10" cols="50" name="reviewReview" required maxlength=500></textarea><br><br>
                        <input type="submit" value="Add Review" >
                        <input type="button" value="Clear Form" onclick="clearFunction()">
                                <?php
                                if ($noMovie == TRUE) {
                                ?>
                                    <p>The movie does not exist</p>

                                <?php
                                $noMovie = False;
                                unset($_SESSION['noMovie']);
                                }
                                ?>
                    </form>
                </div>
            </section>
            <section class="entryOverview">
                <a rel="url" href="index.php">Home</a>
                <br />
                <a rel="url" href="addMovie.php" >Add a Movie</a>
                <br />
                <a rel="url" href="">Logout</a>
                <br /><br />
                <div class="searchBoxDiv">
                   <form id="searchForm" action="movie.php" method="post">
                    <input type="search" id="searchText" name="searchText" oninput="findMovies()">
                     <input type="submit" id="movieSearch" name="movieSearch" value="Search">
                </form>
                    <br />
                    <div id="autoResultsBox" class="autoResultsBox" >
                    </div>
                </div>
            </section>
            <footer class="row">
                <p></p>
            </footer>
        </div>
    </div>

    <script>
function clearFunction() {
    document.getElementById("addMovie").reset();
}
</script>
</body>

</html>