<!DOCTYPE html>
<html>
<header>
	<title>RT: Home</title>
	<meta charset="utf-8" />
	<link href="movie.css" type="text.css" rel="stylesheet" />
    <?php
        session_start();
        $search = "";
    ?>
</header>

<body>
	<header>
        <a rel="url" href="index.html"><img src="images/rancidbanner.png" alt="Rancid Tomatoes" /></a>

    </header>
	<div class="container">
		<div class="row main-header">
    		<h1>Rotten Tomatoes</h1>
    	</div>
    	<div class="main entryRow">
    		<section class="entryContainer">
    			<aside class="ratings-container">
                        <img src="images/rottenlarge.png" alt="Rotten" />
                        <span class="addMovieInstr"></span>
                        <img class="addMovieFresh" src="images/freshlarge.png" alt="Fresh" />
                </aside>
                <div class="row">
                	<div class="review-wrapper">
                        <div class="review">
                            <form action="controller.php" method="post" >
                                <input type="hidden" name="movieReq" value="Mortal Kombat">
                                    <a rel="url" href="controller.php"><img src="moviePoster/mortalKombat.png"></a>
                                </input>
                            </form>
                        </div>
                        <div class="author">
                            <img src="images/fresh.gif" />
                            <p class="mainMovieRating" id="mainRating1"> </p>
                        </div>
                	</div>
                	<div class="review-wrapper">
                        <div class="review">
                            <form action="controller.php" method="post" >
                                <input type="hidden" name="movieReq" value="Mortal Kombat">
                                    <a rel="url" href="controller.php"><img src="moviePoster/princessBride.png"></a>
                                </input>
                            </form>
                        </div>
                        <div class="author">
                            <img src="images/fresh.gif" />
                            <p class="mainMovieRating" id="mainRating2"> </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<div class="review-wrapper">
                        <div class="review">
                            <form action="controller.php" method="post" >
                                <input type="hidden" name="movieReq" value="Mortal Kombat">
                                    <a rel="url" href="controller.php"><img src="moviePoster/the Martian.png"></a>
                                </input>
                            </form>
                        </div>
                        <div class="author">
                            <img src="images/fresh.gif" />
                            <p class="mainMovieRating" id="mainRating3"> </p>
                        </div>
                    </div>
                	<div class="review-wrapper">
                        <div class="review">
                            <form action="controller.php" method="post" >
                                <input type="hidden" name="movieReq" value="Mortal Kombat">
                                    <a rel="url" href="controller.php"><img src="moviePoster/tmnt2.png"></a>
                                </input>
                            </form>
                        </div>
                        <div class="author">
                            <img src="images/fresh.gif" />
                            <p class="mainMovieRating" id="mainRating4"> </p>
                        </div>
                    </div>
                </div>
    		</section>
    		<section class="entryOverview">
                <a rel="url" href="index.php">Home</a>
                <br />
                <?php if(!isset($_SESSION['user'])){ ?>
                    <a rel="url" href="login.php" >Login</a>
                    <br />
                <?php }else { ?>
                    <a rel="url" href="addMovie.php" >Add a Movie</a>
                    <br />
                    <a rel="url" href="addReview.php" >Review a Movie</a>
                    <br />
                    <a rel="url" href="">Logout</a>
                <?php } ?>

                <br /><br />
                <div class="searchBoxDiv" action="controller.php">
                    <form>
                        <input type="hidden" name="mode" value="search" />
                        <input type="text" value="" id="searchBox" onchange="autocomplete()" />
                        <input type="submit" value="Search Movie" />
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
    <script type="text/javascript">
        //$search is meant to be an array of all matching search terms

        function autocomplete(){
            var str = document.getElementById("searchBox").value;
            var xhttp = new XMLHttpRequest();

            if(xhttp.readyState == 4 && xhttp.status == 200){
                var autoArray = JSON.parse(xhttp.responseText);
                $search = autoArray;
            }
            xhttp.open("POST",'controller.php?button=search&str=' + str, true); //WHATS HAPPENING HERE???? I DON'T KNOW WHAT THE MIDDLE ONE IS
            xhttp.send();
        }

        function fill(){
            var str = <?php echo $myStmt ?> ;
            document.getElementById("searchBox").value = str;
            //document.getElementById("searchBox").innerHTML = str; ???
        }
    </script>c
</body>

</html>