<?php
    session_start();
    if (!(isset($_SESSION['loggedin'])) || !($_SESSION['loggedin'] == true)) {
        header("Location: ../login.php?error=signin");
        exit();
    }
    $_SESSION['movie_id'] = $_GET['id'];
?>
