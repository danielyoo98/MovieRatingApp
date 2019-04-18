<?php
    if (isset($_POST['login-submit'])) { // checks if the submit button has been clicked 
        require('db.inc.php');

        $username = $_POST['user'];
        $pwd = $_POST['password'];

        if (empty($username) || empty($pwd)) { // checks for empty fields, if fields are empty, this code does not run at all
          header("Location: ../login.php?error=emptyfields&user=".$username); // changes location to specified url
          exit(); // exits php code
        } else {
          $sql = "SELECT * FROM users WHERE username=?";
          $stmt = mysqli_stmt_init($db);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "s", $username); // adds the input for the username into the prepared statement
            mysqli_stmt_execute($stmt); // creates the statement
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
              $passCheck = password_verify($pwd, $row['password']); // verifies the password by unhashing and comparing
              if ($passCheck == false) { // if the password check fails
                header("Location: ../login.php?error=wrongpassword");
                exit();
            } else if ($passCheck == true) { // if the password check passes
                session_start(); // creates a new session
                $_SESSION['id'] = $row['id']; // adds the following user information to the session so that they can be accessed later
                $_SESSION['user'] = $row['username'];
                $_SESSION['loggedin'] = true;

                header("Location: ../home.php?login=success");
                exit();
              } else {
                header("Location: ../login.php?error=wrongpwd");
                exit();
              }
            } else {
              header("Location: ../login.php?error=nouser");
              exit();
            }
          }
        }
        mysqli_stmt_close($stmt); // closes the prepared statements. We dont have to do this, but it is good practice to close
        mysqli_close($db); // closes the database access
    }
    else {
      header("Location: ../login.php");
      exit();
    }
?>
