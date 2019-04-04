<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Movie List</title>
</head>
<body>

<?php
?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">Movie Rating App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="movielist.php">Movies <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="postamovie.php">Post</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
	<div class="jumbotron">
		<h2 id="header">Movie Rating App</h2>
	</div>
	<div class="body">
	<div class="container">
		<div class="info">
            <h3>All Movies</h3>
            <div class="jumbotron scrollbox">
                <div class="movie">
                    <img class="float-left" src="images/avengers.jpg">
                    <h4 class="float-right">Avengers Infinity War</h4>
					<p class="float-right" id="director">Director: Russo Brothers</p>
					<p class="float-right" id="description">Genre: Action</p>
                    <p class="float-right" id="description">Description: The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe</p>
                </div>
                <div class="movie">
                    <img class="float-left" src="images/ironman.jpg">
                    <h4 class="float-right">Iron Man</h4>
					<p class="float-right" id="director">Director: Jon Favreau</p>
					<p class="float-right" id="description">Genre: Action</p>
                    <p class="float-right" id="description">Description: The film follows Tony Stark (Robert Downey Jr.), an industrialist and master engineer who builds a powered exoskeleton after a life-threatening incident, and becomes the technologically advanced superhero Iron Man.</p>
				</div>
				<div class="movie">
					<img class="float-left" src="images/grudge.jpg">
					<h4 class="float-right">The Grudge</h4>
					<p class="float-right" id="director">Director: Takashi Shimizu</p>
					<p class="float-right" id="description">Genre: Mystery/Thriller</p>
					<p class="float-right" id="description">Plot: Matthew Williams (William Mapother), his wife, Jennifer (Clea DuVall), and mother, Emma (Grace Zabriskie), are Americans making a new life in Tokyo.</p>
				</div>
				<div class="movie">
					<img class="float-left" src="images/para.jpg">
					<h4 class="float-right">Paranormal Activity</h4>
					<p class="float-right" id="director">Director: Oren Peli</p>
					<p class="float-right" id="description">Genre: Thriller/Indie</p>
					<p class="float-right" id="description">Plot: Soon after moving into a suburban tract home, Katie (Katie Featherston) and Micah (Micah Sloat) become increasingly disturbed by what appears to be a supernatural presence.</p>
				</div>
				<div class="movie">
					<img class="float-left" src="images/tazza.jpg">
					<h4 class="float-right">Tazza: The Hidden Card</h4>
					<p class="float-right" id="director">Director: Kang Hyeong-cheol</p>
					<p class="float-right" id="description">Genre: Drama/Crime</p>
					<p class="float-right" id="description">Plot: After Ham Dae-gil enters the gambling world, he is set up as the fall guy in a crooked deal. To get revenge, he enters a final game which could be fatal to the loser.</p>
				</div>
				<div class="movie">
					<img class="float-left" src="images/out.jpeg">
					<h4 class="float-right">The Outlaws</h4>
					<p class="float-right" id="director">Director: Kang Yoon-Sung</p>
					<p class="float-right" id="description">Genre: Crime/Thriller</p>
					<p class="float-right" id="description">Plot: Based on real events that occurred in 2007 dubbed the "Heuksapa Incident", the story follows a turf war that grows between a local gang that runs Garibong-dong in Guro District, Seoul.</p>
				</div>
                <div class="movie">
                    <img class="float-left" src="images/guardians.jpg">
                    <h4 class="float-right">Guardians Of The Galaxy</h4>
					<p class="float-right" id="director">Director: James Gunn</p>
					<p class="float-right" id="description">Genre: Action</p>
                    <p class="float-right" id="description">Description: To help fight Ronan and his team and save the galaxy from his power, Quill creates a team of space heroes known as the "Guardians of the Galaxy" to save the galaxy.</p>
                </div>
                <div class="movie">
                    <img class="float-left" src="images/thor.jpg">
                    <h4 class="float-right">Thor Ragnarok</h4>
					<p class="float-right" id="director">Director: Taika Waititi</p>
					<p class="float-right" id="description">Genre: Action</p>
                    <p class="float-right" id="description">Description: Thor is imprisoned on the other side of the universe and finds himself in a race against time to get back to Asgard to stop Ragnarok, the destruction of his home-world and the end of Asgardian civilization, at the hands of an all-powerful new threat, the ruthless Hela.</p>
                </div>
            </div>
    	</div>
	</div>
	<div class="jumbotron" id="footer">
    </div>
	</div>
</body>
</html>
