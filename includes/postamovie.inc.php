<?php 
    session_start();
    // include the database configuration file
    require('db.inc.php');

    // file upload path
    $targetDir = "../images/";
    $fileName = basename($_FILES['file']['name']); // returns the basename (i.e. avengers.jpg)
    $targetFilePath = $targetDir . $fileName; // returns something like images/averngers.jpg
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); // returns the extension (i.e. jpg)

    $director = $_POST['director'];
    $title = $_POST['title'];

    // if post button is pressed
    if (isset($_POST['submit']) && !empty($_FILES['file']['name']) && !empty($director) && !empty($title)) {
        $desc = $_POST['desc'];
        // allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        
        if (in_array($fileType, $allowTypes)) {
            // upload file to specified path (i.e. ../images/toy.jpeg)
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                // insert into database
                $insert_director = $db->query("INSERT INTO directors (director_name) VALUES ('$director')");
                $sql = $db->query("SELECT director_id FROM directors WHERE director_name='$director' LIMIT 1");
                $result = mysqli_fetch_object($sql);
                $insert_movieinfo = $db->query("INSERT INTO movies (movie_image_file, movie_title, director_id, genre, movie_description) VALUES ('$fileName', '$title', '$result->director_id', 'fun', '$desc')");
                if ($insert_director) {
                    header("Location: ../movielist.php");
                }
            }
        }
    }
?>
