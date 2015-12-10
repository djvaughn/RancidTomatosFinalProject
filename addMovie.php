<!DOCTYPE html>
<html>

<head>
    <title>RT: Add a Movie</title>
            <?php
                /*
   Uses a session to check if the user has logged in .  If they haven't, then they will be redirected to the login page
   Then the session checks for an error.
    */
            $duplicateMovie = false;
            $noMovie = false;
            session_start();
            if (!isset($_SESSION['user'])) {
                header("location: login.php");
                exit;
            }
            if (isset($_SESSION['failureToAdd'])) {
                $duplicateMovie = true;
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
                    <form action="redirect.php" method="get">
                        <!-- <input type="hidden" name="mode" value="search" /> -->
                        <input type="search" name ="movie" id="searchBox" />
                        <!-- onchange="autocomplete()" -->
                        <input type="submit" value="Search Movie" />
                                    <?php
                                if ($noMovie == TRUE) {
                                ?>
                                    <p>The movie doesn't exist</p>

                                <?php
                                $noMovie = False;
                                unset($_SESSION['noMovie']);
                                }
                                ?>
                </form>
                    <br />
                    <div id="autoResultsBox" >
                        hey there
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
function findMovies(){
    var str = document.getElementById("searchText").value;
    if(str.length == 0){

    }else{
        //document.getElementById("autoResultsBox").value = "hey";
        document.getElementById("autoResultsBox").style.display = none;
    }
}

function findMovies1(){
    var str = document.getElementById("searchText").value;
    if(str.length == 0){
        return;
    }else{
        document.getElementById("autoResultsBox").value = "hey";
        //document.getElementById("autoResultsBox").display = block;
    }

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var autoArray = JSON.parse(xhttp.responseText);
            var toReturn = ""
            var N = autoArray.length;
            var i=0;
            if(N > 0){
                toReturn = "<ul>"
                for(i=0; i<N; i++){
                    toReturn += '<li id="searchMatches" onclick="fill(' + autoArray[i]['match'] + ')">' + autoArray[i]['match'] + '</li><br />';
                }
                toReturn += "</ul>"
            }
            document.getElementById("autoResultsBox").innerHTML = $toReturn;
            //document.getElementById("autoResultsBox").visibility = visible;
        }
    }

    xhttp.open("POST","controller.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("searchString="+str);


}
function fill(str){
    document.getElementById("searchText").value = str;
   // document.getElementById("autoResultsBox").visibility = hidden;
}
</script>
</body>

</html>