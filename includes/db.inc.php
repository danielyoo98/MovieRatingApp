<?php
    $user = 'root';
    $password = 'password';
    $dbname = 'movie_rating_project';
    $host = 'localhost';
    $port = 3306;

    $db = mysqli_connect("$host:$port", $user, $password, $dbname);
?>
