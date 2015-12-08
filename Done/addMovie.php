<!DOCTYPE html>
<html>

<head>
    <title>RT: Add a Movie</title>
            <?php
            $duplicateMovie = false;
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
        <a rel="url" href="mainPage.php"><img src="images/rancidbanner.png" alt="Rancid Tomatoes" /></a>
    </header>
    <div class="container">
        <div class="row main-header">
            <h1>Add a New Movie</h1>
        </div>
        <div class="main entryRow">
            <section class="reviews-container">
                <aside class="ratings-container">
                    <img src="images/rottenlarge.png" alt="Rotten" />
                    <span class="addMovieInstr">Enter Movie Info Below:</span>
                    <img class="addMovieFresh" src="images/freshlarge.png" alt="Fresh" />
                </aside>
                <div class="entry-wrapper">
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
                </div>
            </section>
            <section class="entryOverview">
                <a rel="url" href="index.php">Home</a>
                <br />
                <a rel="url" href="addReview.php" >Review a Movie</a>
                <br />
                <a rel="url" href="">Logout</a>
                <br /><br />
                <div class="searchBoxDiv">
                    <input type="hidden" name="mode" value="search" />
                    <input type="text" value="" id="searchBox" onchange="autocomplete()" />
                    <input type="submit" value="Search Movie" />
                    <br />
                    <div id="autoResultsBox" class="autoResultsBox" >
                        <!--<textarea rows="4" cols="20">
                            <ul>
                                <?= $myStmt = ""; ?>
                                <?php foreach($search as $match) { ?> 
                                    <?= $myStmt = $match['title'] . ', ' . $match['year'] ?>
                                        <li> 
                                            <div id="filler" onclick="fill()">
                                                <?= $myStmt ?>
                                            </div> 
                                        </li>
                                <?php } ?>
                            </ul>
                        </textarea> -->
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