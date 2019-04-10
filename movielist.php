<?php
    session_start();
    if (!(isset($_SESSION['loggedin'])) || !($_SESSION['loggedin'] == true)) {
        header("Location: ../login.php?error=signin");
        exit();
    }
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="app.js"></script>
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
		<h2 id="header">Movie Rating App</h2>
	</div>
	<div class="body">
	<div class="container">
		<div class="info">
            <h3>All Movies</h3>
            <div class="jumbotron scrollbox" id="lists">
                <?php
                require('includes/db.inc.php');
                $result = $db->query("SELECT movie_image_file, movie_title, movie_description, movie_id FROM movies");
                $director_result = $db->query("SELECT director_name FROM directors");
                $movies = array();
                $directors = array();
                if (mysqli_num_rows($result) > 0) {
                    while (($row = mysqli_fetch_assoc($result)) && ($row2 = mysqli_fetch_assoc($director_result))) {
                        $movie = new stdClass();
                        $movie->id = $row['movie_id'];
                        $movie->imgPath = "images/".$row["movie_image_file"];
                        $movie->title = $row["movie_title"];
                        $movie->director = $row2["director_name"];
                        $movie->genre = "Action";
                        $movie->description = $row["movie_description"];
                        array_push($movies, $movie);
                    }
                    foreach ($movies as $movie) { ?>
                        <div class="movie">
                        <a href="moviedetails.php?role=<?= $movie->id ?>"><img class="float-left" src="<?php echo $movie->imgPath ?>"></a>
                        <h4 class="float-right"><?php echo $movie->title ?></h4>
                        <p class="float-right" id="director"><?php echo $movie->director ?></p>
                        <p class="float-right" id="description">Genre: <?php echo $movie->genre ?></p>
                        <p class="float-right" id="description">Description: <?php echo $movie->description ?></p>
                        </div>
                <?php }
                }
                ?>
            </div>
    	</div>
	</div>
	<div class="jumbotron" id="footer">
    </div>
	</div>
</body>
</html>
