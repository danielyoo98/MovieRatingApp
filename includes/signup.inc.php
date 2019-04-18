<?php
   if (isset($_POST['signup-submit'])) { // checks if the signup button has been clicked
       require('db.inc.php');

       $name = $_POST['name']; // grabs the value inputted into the sign up form
       $username = $_POST['user'];
       $email = $_POST['email'];
       $pwd = $_POST['password'];

       if (empty($name) || empty($username) || empty($email) || empty($pwd)) { // checks for empty fields
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
         $stmt = mysqli_stmt_init($db); // initializes prepared statement
         if (!mysqli_stmt_prepare($stmt, $sql)) { // checks to see if the statement failed to prepare
           header("Location: ../signup.php?error=sqlerror");
           exit();
         } else {
           mysqli_stmt_bind_param($stmt, "s", $username); // binds the input with the statement
           mysqli_stmt_execute($stmt); // executes it
           mysqli_stmt_store_result($stmt); // stores the result
           $resultCheck = mysqli_stmt_num_rows($stmt);
           if ($resultCheck > 0) { // if the username exists in the database
             header("Location: ../signup.php?error=usertaken&name=".$name."&email=".$email); // the username is taken and user has to reinput another username in the form
             exit();
         } else { // new user is created with the username inputted
             $sql = "INSERT INTO users (username, full_name, password, email) VALUES (?, ?, ?, ?)";
             if (!mysqli_stmt_prepare($stmt, $sql)) {
               header("Location: ../signup.php?error=sqlerror");
               exit();
             } else {
               $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT); // hashes the password
               mysqli_stmt_bind_param($stmt, "ssss", $username, $name, $hashedpwd, $email); // binds the statement with the user input
               mysqli_stmt_execute($stmt); // executes the statement
               header("Location: ../signup.php?signup=success");
               exit();
             }
           }
         }
       }
       mysqli_stmt_close($stmt); // closes statement
       mysqli_close($db); // closes database connection
   }
   else {
     header("Location: ../signup.php");
     exit();
   }
?>
