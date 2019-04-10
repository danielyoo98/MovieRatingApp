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
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="app.js"></script>
    <title>Post a Movie</title>
</head>
<body>
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
                <li class="nav-item">
                    <a class="nav-link" href="movielist.php">Movies</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="postamovie.php">Post <span class="sr-only">(current)</span></a>
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
		<h2 id="header">Post a Movie</h2>
	</div>
	<div class="body">
		<form class="form" method="POST" enctype="multipart/form-data" action="includes/postamovie.inc.php">
			<h3 id="label">Upload Picture:</h3><br>
			<input type="file" id="movie-image-input" name="file"><br><br>
		<div class="form-group">
			<h3 id="label">Title</h3>
			<input type="text" class="form-control" id="movie-title-input" placeholder="Enter title" name="title">
		</div>
        <div class="form-group">
			<h3 id="label">Director</h3>
			<input list="directors" class="form-control" id="director-input" placeholder="Director" name="director">
                <datalist id="directors">
                    <?php
                    require('includes/db.inc.php');
                    $result = $db->query("SELECT director_name FROM directors");
                    $directors = array();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $director = new stdClass();
                            $director->director_name = $row["director_name"];
                            array_push($directors, $director);
                        }
                        foreach ($directors as $director) { ?>
                            <option value="<?php echo $director->director_name?>">
                    <?php }
                    }
                    ?>
                </datalist>
		</div>
		<div class="form-group">
			<h3 id="label">Actors</h3>
			<div id="actor-inputs">
				<input list="actors" class="form-control" id="movie-actors-input" placeholder="Actor" style="margin-bottom: 0px; border-top: 1px solid black" name="actor[]">
					<datalist id="actors">
                        <?php
                        require('includes/db.inc.php');
                        $result = $db->query("SELECT actor_name FROM actors");
                        $actors = array();
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $actor = new stdClass();
                                $actor->actor_name = $row["actor_name"];
                                array_push($actors, $actor);
                            }
                            foreach ($actors as $actor) { ?>
                                <option value="<?php echo $actor->actor_name?>">
                        <?php }
                        }
                        ?>
					</datalist>
			</div>
			<button type="button" class="btn btn-dark" onclick="addActorInput()">Add</button>
		</div>
		<div class="form-group">
			<h3 id="label">Description</h3>
			<input type="text" class="form-control" id="movie-description-input" placeholder="Description" name="desc">
		</div>
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		<button type="cancel" class="btn btn-danger"><a href="home.php">Cancel</a></button>
		</form>
	<div class="jumbotron" id="footer">
	</div>
	</div>
</body>
</html>
