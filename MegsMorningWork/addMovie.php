<!DOCTYPE html>
<html>

<?php
/*require_once ('SOMETHING.PHP');*/
	/*set up variables we may need here*/
    /*
    $problem = $_GET["problem"];
    $message = "ERROR:  ";
    */
?>

<head>
	<title>RT: Add a Movie</title>
           <?php
            $loggedIn="no";
            $search="";

            session_start();
            if (!$_SESSION['login']) {
                header("location: loginPage.php?problem=notLogin");
                exit;
            }else{
                $loggedIn="yes";
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
        		<form action="controller.php" method="post" class="addForm"><br />
                    <!-- want to check title against database as typed? -->
        			Title: <br /> <input type="text" name="title" /><br />
        			Year: <br /> <input type="date" name="year" /><br />
        			Cast: <br /> <input type="text" name="cast" /><br />
        			Director: <br /> <input type="text" name="director" /><br />
        			Producer: <br /> <input type="text" name="producer" /><br />
        			MPAA Rating: <br /> <input type="radio" name="mpaaRating" value="G"/>G
                                        <input type="radio" name="mpaaRating" value="PG" />PG
                                        <input type="radio" name="mpaaRating" value="PG-13"/>PG-13
                                        <input type="radio" name="mpaaRating" value="R" />R
                                        <!-- do we want this one?
                                        <input type="radio" name="mpaaRating" value="NC-17" /> -->
                    <br />
        			Release Date: <br /> <input type="date" name="releaseDate" /><br />
        			Synopsis: <br /> <textarea name="synopsis" rows="10" cols="50"></textarea><br />
        			Production Company: <br /> <input type="text" name="productionCompany" /><br />
        			Run Time (in minutes): <br /> <input type="number" name="runTime" /><br />
        			Genre: <br /> <input type="text" name="genre" /><br />
        			Box Office: <br /> <input type="number" name="boxOffice" /><br />
                    <!--want to actually make these working links? if yes, check security? -->
        			Links: <br /> <input type="text" name="links" /><br />
                    <br />
                    <button type="button" value="clear" onclick="SOMETHING">Clear</button>
                    <br /><br />
                    <input type="hidden" value="" name="ID" />
                    <input type="hidden" value="addMovie" name="Button" />
                    <input type="submit" value="Submit" />
        		</form>
            </section>
            <section class="overview">
                <form action="index.html" method="get" >
                    <input type="hidden" name="mode" value="main" />
                    <input type="submit" value="Main" />
                </form>
                <form action="index.html" method="get">
                    <input type="hidden" name="mode" value="addReview" />
                    <input type="submit" value="Review a Movie" />
                </form>

                <div class="searchBoxDiv">
                    <input type="hidden" name="mode" value="search" />
                    <input type="text" value="" id="searchBox" onchange="autocomplete()" />
                    <br />
                    <div id="autoResultsBox" class="autoResultsBox" >
                        <textarea>
                            <ul>
                                <?= $myStmt = ""; ?>
                                <?= foreach($search as $match) { ?> 
                                    <?= $myStmt = $match['title'] . ', ' . $match['year'] ?>
                                        <li> 
                                            <div id="filler" onclick="fill()">
                                                <?= $myStmt ?>
                                            </div> 
                                        </li>
                                <?= } ?>
                            </ul>
                        </textarea>
                    </div>
                    <input type="submit" value="Search Movie" />
                </div>

                <br /><br /><br />
                <form action="index.html" method="get">
                <?=
                    if($loggedIn == "yes"){ ?>
                        <input type="hidden" name="mode" value="logout" />
                        <input type="submit" value="Logout" />
                    
                <?= }else{ ?>
                        <input type="hidden" name="mode" value="login" />
                        <input type="submit" value="Login" />
                <?= } ?>
                <br />
                
                </form>
            </section>
            <footer class="row">
                <p></p>
            </footer>
    	</div>
    </div>

    <script type="text/javascript">
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
    </script>
</body>

</html>