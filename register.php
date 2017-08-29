<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid12.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Archivo Black">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,700">
	<title>stefan bot</title>
</head>
<body>
<?php
include 'connection.php';
include 'classes.php';
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$submit = $_POST['submit'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
?>
	<div class="mainwrap">
		<div class="contentwrap">
			<nav>
				<h1 class="titlebanner">Stefan Bot</h1>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="portofoliu.html">Portfolio</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="login.php">Login</a></li>
					</ul>
			</nav>
			<div class="loginpage">
				<div class="titleh1"><h1>Register</h1></div>
				<form action="/register.php" method="POST">
					<label>Username</label>
					<p><input type="text" placeholder="Username" name="username"></p>
					<label>Password</label>
					<p><input type="password" placeholder="Password" name="password"></p>
					<label>Email</label>
					<p><input type="email" placeholder="Email" name="email"></p>
					<p><input type="submit" name="submit" value="Register"></p>
				</form>
				<?php
					$new_reg = new Register;
					if(!empty ($_POST['submit']) && (!empty($_POST['username']) && (!empty($_POST['password'])))) { ?>
					<div class="pborder">
					<?php 
						if (strlen($_POST['username'] < 4) && (strlen($_POST['password']) < 4 )) {
						 	echo "Your Username and Password must be at least 4 characters long!";
						 } else {
							$db_insert = $new_reg->reg($username, $hashed_password, $email); ?>
					</div>
				<?php } } ?>

			</div>
		</div>
	</div>
</body>
<footer>
	<div class="footerwrap">
		<div class="titleh1"><h1>Social</h1></div>
		<ul>
			<li><a href="#"><img src="images/facebook.png" width="45" height="45" alt="facebook"></a></li>
			<li><a href="#"><img src="images/linkedin.png" width="45" height="45" alt="linkedin"></a></li>
			<li><a href="#"><img src="images/github.png" width="45" height="45" alt="github"></a></li>
		</ul>
	</div>
</footer>
</html>
