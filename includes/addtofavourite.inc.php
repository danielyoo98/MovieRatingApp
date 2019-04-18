<?php
    session_start();
    require('db.inc.php');

    $_SESSION['movie_id'] = $_GET['role'];
    $movie_id = $_SESSION['movie_id'];
    $user_id = $_SESSION['id'];

    $add_movie = $db->query("INSERT INTO favourite_movies (movie_id, user_id) VALUES ($movie_id, $user_id)");

    header("Location: ../home.php?success=movieadded");
?>
