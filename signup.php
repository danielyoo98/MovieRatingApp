<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['user']);
    unset($_SESSION['loggedin']);
    session_destroy();
    $_SESSION = array();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {
			font-family: 'Roboto', sans-serif;
			background: #282828;
		}
	</style>
	<title>Sign Up</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="row color signup-row">
					<div class="col-md-12">
						<ul id="login-signup-links">
							<a href="login.php">Log In </a>
							<span> | </span>
							<a href="signup.php" class="active-in"> Sign Up</a>
						</ul>
						<form action="includes/signup.inc.php" method="post">
							<label class="label control-label">Full Name</label>
							<input type="text" class="form-control" name="name" placeholder="Full Name">
							<label class="label control-label">Username</label>
							<input type="text" class="form-control" name="user" placeholder="Username">
							<label class="label control-label">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email">
							<label class="label control-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
							<button type="submit" name="signup-submit" class="btn btn-dark btn-login">Sign Up</button>
							<a href="login.php"><p id="password-text" class="text-center">Already have an account?</p></a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</body>
</html>
