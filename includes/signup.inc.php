<?php
   if (isset($_POST['signup-submit'])) {
       require('db.inc.php');

       $name = $_POST['name'];
       $username = $_POST['user'];
       $email = $_POST['email'];
       $pwd = $_POST['password'];

       if (empty($name) || empty($username) || empty($email) || empty($pwd)) {
         header("Location: ../signup.php?error=emptyfields&name=".$name."&user=".$username."&email=".$email);
         exit();
       } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
         header("Location: ../signup.php?error=invalidemailusername&name=".$name);
         exit();
       } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         header("Location: ../signup.php?error=invalidemail&name=".$name."&user=".$username);
         exit();
       } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
         header("Location: ../signup.php?error=invalidusername&name=".$name."&email=".$email);
         exit();
       } else {
         $sql = "SELECT username FROM users WHERE username=?";
         $stmt = mysqli_stmt_init($db);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
           header("Location: ../signup.php?error=sqlerror");
           exit();
         } else {
           mysqli_stmt_bind_param($stmt, "s", $username);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
           if ($resultCheck > 0) {
             header("Location: ../signup.php?error=usertaken&name=".$name."&email=".$email);
             exit();
           } else {
             $sql = "INSERT INTO users (username, full_name, password, email) VALUES (?, ?, ?, ?)";
             if (!mysqli_stmt_prepare($stmt, $sql)) {
               header("Location: ../signup.php?error=sqlerror");
               exit();
             } else {
               $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
               mysqli_stmt_bind_param($stmt, "ssss", $username, $name, $hashedpwd, $email);
               mysqli_stmt_execute($stmt);
               header("Location: ../signup.php?signup=success");
               exit();
             }
           }
         }
       }
       mysqli_stmt_close($stmt);
       mysqli_close($db);
   }
   else {
     header("Location: ../signup.php");
     exit();
   }
?>
