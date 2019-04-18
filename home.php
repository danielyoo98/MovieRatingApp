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
    <title>Home</title>
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
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
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
        <h2 id="header">Movie Rating App</h2>
    </div>
    <div class="body">
    <div class="container">
        <div class="buttons">
            <button class="btn btn-dark btn1">
                <a href="postamovie.php">Post A Movie</a>
            </button>
            <button class="btn btn-dark btn2">
                <a href="movielist.php">View All Posts</a>
            </button>
        </div>
        <div class="info">
            <h3>My Movies</h3>
            <div class="jumbotron scrollbox">
                <?php
                $user_id = $_SESSION['id'];
                require('includes/db.inc.php');
                $result = $db->query("SELECT movie_id FROM favourite_movies WHERE user_id = $user_id");
                mysqli_num_rows($result);
                $movies = array(); // creates an array for all of the movies
                $directors = array();
                if (mysqli_num_rows($result) > 0) { // checks to see if $result returns anything
                    while ($row = mysqli_fetch_assoc($result)) { // if it does, it goes through each item until every item has been processed
                        $movie = new stdClass(); // creates new class object to store properties
                        $movie_id = $row['movie_id'];
                        $movie_result = $db->query("SELECT movie_image_file, movie_title, movie_description, movie_id, director_id FROM movies WHERE movie_id = $movie_id");
                        mysqli_num_rows($movie_result);
                        $movie_result = mysqli_fetch_assoc($movie_result);
                        $director_id = $movie_result['director_id'];
                        $director_result = $db->query("SELECT director_name FROM directors WHERE director_id = $director_id");
                        mysqli_num_rows($director_result);
                        $director_result = mysqli_fetch_assoc($director_result);
                        $movie->id = $row['movie_id'];
                        $movie->imgPath = "images/".$movie_result["movie_image_file"];
                        $movie->title = $movie_result["movie_title"];
                        $movie->director = $director_result["director_name"];
                        $movie->genre = "Action";
                        $movie->description = $movie_result["movie_description"];
                        array_push($movies, $movie); // pushes the movie instance class into array of multiple movie classes
                    }
                    foreach ($movies as $movie) { // loops through each movie
                        ?>
                        <div class="movie">
                            <a href="moviedetails.php?role=<?= $movie->id ?>"><img class="float-left" src="<?php echo $movie->imgPath ?>"></a>
                            <h4 class="float-right"><?php echo $movie->title ?></h4>
                            <p class="float-right" id="director"><?php echo $movie->director ?></p>
                            <p class="float-right" id="description">Genre: <?php echo $movie->genre ?></p>
                            <p class="float-right" id="description">Description: <?php echo $movie->description ?></p>
                            <a href="includes/remove.inc.php?role=<?= $movie->id ?>"><img src="images/remove.png" style="height: 50px; width: 50px"></a>
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
