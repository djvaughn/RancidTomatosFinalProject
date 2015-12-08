<!DOCTYPE html>
<html>

<head>
    <title>RT: Add a Review</title>
            <?php

/*
            session_start();
            if (!isset($_SESSION['user'])) {
                header("location: login.php");
                exit;
            }
*/
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
            <h1>Add a Movie Review</h1>
        </div>
        <div class="main row">
            <section class="reviews-container">
                <aside class="ratings-container">
                    <img src="images/rottenlarge.png" alt="Rotten" />
                    <span class="addMovieInstr">Enter Review Below:</span>
                    <img class="addMovieFresh" src="images/freshlarge.png" alt="Fresh" />
                </aside>
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