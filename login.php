<?php 
ob_start();
session_Start();
include 'classes.php'; 
?>
<!doctype <!DOCTYPE html>
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
$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];
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
				<div class="titleh1"><h1>Login</h1></div>
				<?php if ($_SESSION['username'] == "") { ?>
				<form action="/login.php" method="POST">
					<label>Username</label>
					<p><input type="text" placeholder="Username" name="username"></p>
					<label>Password</label>
					<p><input type="password" placeholder="Password" name="password"></p>
					<p><input type="submit" name="submit" value="Login"></p>
				</form>
				<div class="pborder"><p>Not a member? <a href="/register.php">Register Now!</a></p></div>
				<?php
				} else { ?>
				<div class="pborder"><p><a href="/controlpanel.php">Control Panel</a></p></div>
				<div class="pborder"><p><a href="/logout.php">Logout</a></p></div>
				<?php } ?>
				<!-- Login php start -->
				<?php 
				$new_login = new User;
				if(isset($_POST['submit'])){
					$new_login->log_in($username, $password);
				}
				?>
				<!-- Login php end -->
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