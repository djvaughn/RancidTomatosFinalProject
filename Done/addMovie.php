<!DOCTYPE html>
<html>

<head>
    <title>RT: Add a Movie</title>
            <?php
            session_start();
            if (!isset($_SESSION['user'])) {
                header("location: login.php");
                exit;
            }
            if (isset($_SESSION['failureToAdd'])) {
                $duplicateMovie = true;
            }
?>
    <meta charset="utf-8" />
    <link href="movie.css" type="text.css" rel="stylesheet" />
</head>

<body>
    <header>
        <img src="images/rancidbanner.png" alt="Rancid Tomatoes">
        <!-- may want to make this a link to the home page -->
        <!--    this needs to extend across the window -->
    </header>
    <div class="container">
        <div class="row main-header">
            <h1>Add a New Movie</h1>
        </div>
        <div class="main row">
            <section class="reviews-container">
                <aside class="ratings-container">
                    <img src="images/rottenlarge.png" alt="Rotten" />
                    <span class="addMovieInstr">Enter Movie Info Below:</span>
                    <img class="addMovieFresh" src="images/freshlarge.png" alt="Fresh" />
                </aside>
                <form action="controller.php" method="post" id = "addMovie" enctype="multipart/form-data"><br>
                    <!-- want to check title against database as typed? -->
                    Title: <br> <input type="text" name="addMovietitle" required><br><br>
                    Year: <br> <input type="number" name="year" min = "1900" max = "2016" required><br><br>
                    Director: <br> <input type="text" name="director"required><br><br>
                    Run Time (in minutes): <br> <input type="number" name="runTime" min = "1" required><br><br>
                    Box Office (in millions): <br> <input type="number" name="boxOffice" min = "1" required><br><br>
                    <fieldset class="field">

                    <legend>MPAA Rating</legend>

                    <input type="radio" value="G" name="mpaaRating" required/>G
                    <br>
                    <input type="radio" value="PG" name="mpaaRating">PG
                    <br>
                    <input type="radio" value="PG-13" name="mpaaRating">PG-13
                    <br>
                    <input type="radio" value="R" name="mpaaRating">R
                    <br>
                </fieldset>
                    <br >
                   Rating: <br> <input type="number" name="rating" min = "1" max = "100" required><br><br>

                   Movie Poster (PNG Files only): <input type ="file" name = "file" id ="file" required><br><br>
                    <input type="submit" value="Add Movie" >
                    <input type="button" value="Clear Form" onclick="clearFunction()">
                    <?php
                            if ($duplicateMovie == TRUE) {
                            ?>
                                <p>The movie already exists</p>

                            <?php
                            $duplicateMovie = False;
                            unset($_SESSION['failureToAdd']);
                            }
                            ?>
                </form>
            </section>
            <section class="overview">
                <a rel="url" href="randcidHome.php">Home</a>
                <br>
                <!-- put this as an if not signed in, make visible? -->
                <a rel="url"  href="login.php">Sign In</a><!-- do this as a link or not? -->
            </section>
            <footer class="row">
                <!-- it'd be cool to have a "top" link here -->
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