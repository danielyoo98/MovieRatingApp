<?php
    session_start();
    // include the database configuration file
    require('db.inc.php');

    // file upload path
    $targetDir = "../images/";
    $fileName = basename($_FILES['file']['name']); // returns the basename (i.e. avengers.jpg)
    $targetFilePath = $targetDir . $fileName; // returns something like images/averngers.jpg
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // returns the extension (i.e. jpg)

    $director = $_POST['director'];
    $actors = $_POST['actor'];
    $title = $_POST['title'];

    // if post button is pressed
    if (isset($_POST['submit'])) {
        if (empty($_FILES['file']['name']) || empty($director) && !empty($title)) {
            header("Location: ../postamovie.php?error=emptyfields");
            exit();
        }
        $desc = $_POST['desc'];
        // allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

        if (in_array($fileType, $allowTypes)) {
            // upload file to specified path (i.e. ../images/toy.jpeg)
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                // insert into database

                $result = $db->query("SELECT director_id FROM directors WHERE director_name = '$director'");
                if (mysqli_num_rows($result) == 0) {
                    $insert_director = $db->query("INSERT INTO directors (director_name) VALUES ('$director')");
                }
                $sql = $db->query("SELECT director_id FROM directors WHERE director_name='$director' LIMIT 1");
                $result = mysqli_fetch_object($sql);
                $insert_movieinfo = $db->query("INSERT INTO movies (movie_image_file, movie_title, director_id, genre, movie_description) VALUES ('$fileName', '$title', '$result->director_id', 'fun', '$desc')");

                for ($x = 0; $x < sizeof($actors); $x++) {
                    $result = $db->query("SELECT actor_id FROM actors WHERE actor_name = '$actors[$x]'");
                    if (mysqli_num_rows($result) == 0) {
                        $insert_actor = $db->query("INSERT INTO actors (actor_name) VALUES ('$actors[$x]')");
                    }
                    $result = $db->query("SELECT actor_id FROM actors WHERE actor_name = '$actors[$x]'");
                    mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);
                    $actor_id = $row['actor_id'];
                    $result2 = $db->query("SELECT movie_id FROM movies WHERE movie_title = '$title'");
                    mysqli_num_rows($result2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $movie_id = $row2['movie_id'];
                    $insert_actor = $db->query("INSERT INTO actors_movies (actor_id, movie_id) VALUES ($actor_id, $movie_id)");
                }

                if ($insert_movieinfo) {
                    header("Location: ../movielist.php");
                }
            }
        }
    }

?>
