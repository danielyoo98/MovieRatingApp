<?php
    if (isset($_POST['login-submit'])) {
        require('db.inc.php');

        $username = $_POST['user'];
        $pwd = $_POST['password'];

        if (empty($username) || empty($pwd)) {
          header("Location: ../login.php?error=emptyfields&user=".$username);
          exit();
        } else {
          $sql = "SELECT * FROM users WHERE username=?";
          $stmt = mysqli_stmt_init($db);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
              $passCheck = password_verify($pwd, $row['password']);
              if ($passCheck == false) {
                header("Location: ../login.php?error=wrongpassword");
                exit();
              } else if ($passCheck == true) {
                session_start();
                $_SESSION['id'] = $row['id'];
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
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    }
    else {
      header("Location: ../login.php");
      exit();
    }
?>
