<?php
    session_start();
    if (!(isset($_SESSION['loggedin'])) || !($_SESSION['loggedin'] == true)) {
        header("Location: ../login.php?error=signin");
        exit();
    }
    $_SESSION['movie_id'] = $_GET['role'];
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
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo '<a class="nav-link" href="signup.php">Log Out, '.$_SESSION['user'].'</a>';
                        }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
	<div class="jumbotron">
        <?php
            require('includes/db.inc.php');
            $movie_id = $_SESSION['movie_id'];
            $result = $db->query("SELECT movie_image_file, movie_title, director_id, genre, movie_description FROM movies WHERE movie_id = $movie_id");
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $movie = new stdClass();
                $movie->imgPath = "images/".$row["movie_image_file"];
                $movie->title = $row["movie_title"];
                $director_id = $row["director_id"];
                $movie->genre = $row["genre"];
                $movie->description = $row["movie_description"];
                $result2 = $db->query("SELECT director_name FROM directors WHERE director_id = $director_id");
                if (mysqli_num_rows($result2) > 0) {
                    $row = mysqli_fetch_assoc($result2);
                    $movie->director = $row["director_name"];
                }
            }
        ?>
		<h2 id="header"><?php echo $movie->title ?></h2>
	</div>
	<div class="body">
	<div class="container">
		<div class="movie-image">
			<img src="images/avengers.jpg" width="200px" height="200px">
		</div>
		<div class="info">
            <h3>Director</h3>
			<div class="director">
                <p><?php echo $movie->director ?></p>
			</div>

			<h3>Actors</h3>
			<div class="actors">
                <?php
                require('includes/db.inc.php');
                $result = $db->query("SELECT actor_id FROM actors_movies WHERE movie_id = $movie_id");
                mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
                $actor_id = $row['actor_id'];
                $result = $db->query("SELECT actor_name FROM actors WHERE actor_id = $actor_id");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $actors = new stdClass();
                        $actors->actor_name = $row["actor_name"];
                    }
                    foreach ($actors as $actor) { ?>
                        <li><a id="actor" href="#"><?php echo $actors->actor_name ?></a></li>
                <?php }
                }
                ?>
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
