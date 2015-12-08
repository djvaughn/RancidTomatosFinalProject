<!DOCTYPE html>
<html>

<head>
    <title>RT: Add a Review</title>
            <?php


            session_start();
            if (!isset($_SESSION['user'])) {
                header("location: login.php");
                exit;
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
                <!--
                <a rel="url" href="index.php">Home</a>
                <br />
                <?php if(!isset($_SESSION['user'])){ ?>
                    <a rel="url" href="login.php" >Login</a>
                    <br />
                <?php }else { ?>
                    <a rel="url" href="addMovie.php" >Add a Movie</a>
                    <br />
                    <a rel="url" href="">Logout</a>
                <?php } ?>

                <br /><br /> -->
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