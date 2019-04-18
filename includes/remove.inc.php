<?php
    session_start();
    require('db.inc.php');

    $_SESSION['movie_id'] = $_GET['role'];
    $movie_id = $_SESSION['movie_id'];
    $user_id = $_SESSION['id'];

    $delete_movie = $db->query("DELETE FROM favourite_movies WHERE movie_id = $movie_id AND user_id = $user_id");

    header("Location: ../home.php?success=moviedeleted");
?>
