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
    <title>Movie Details</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movielist.php">Movies</a>
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
		<h2 id="header">Avengers Endgame</h2>
	</div>
	<div class="body">
	<div class="container">
		<div class="movie-image">
			<img src="images/avengers.jpg" width="200px" height="200px">
		</div>
		<div class="info">
			<h3>Actors</h3>
			<div class="actors">
				<li><a id="actor" href="#">Robert Downey Junior</a></li>
				<li><a id="actor" href="#">Chris Evans</a></li>
				<li><a id="actor" href="#">Chris Hemsworth</a></li>
				<li><a id="actor" href="#">Scarlett Johansson</a></li>
			</div>
			<h3>Description</h3>
			<div class="description">
				<p>The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe</p>
			</div>

			<h3>Reviews</h3>
			<div class="jumbotron scrollbox">
				<div id="user-review">
					moviewater1011: 10/10 this movie was hilarious!
				</div>
				<div id="user-review">
					avengersguy223: 10/10 i watch this every day.
				</div>
				<div id="user-review">
					User 3: 10/10
				</div>
				<div id="user-review">
					User 4: 10/10
				</div>
				<div id="user-review">
					User 5: 10/10
				</div>
				<div id="user-review">
					User 6: 10/10
				</div>
				<div id="user-review">
					User 7: 10/10
				</div>
				<div id="user-review">
					User 8: 10/10
				</div>
				</button>
			</div>
			<button class="btn btn-dark" id="comment-btn">
			<a href="#" id="anchor">Add Review</a>
		</div>
	</div>
	<div class="jumbotron" id="footer">
    </div>
	</div>
</body>
</html>
