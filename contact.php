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
	<!-- Contact form php start here -->
<?php 
include 'classes.php';
$name = htmlspecialchars($_POST['msgname']);
$email = $_POST['msgmail'];
$message = htmlspecialchars($_POST['msgmsg']);
$sendmsg = htmlspecialchars($_POST['msgsubmit']);
?>
	<!-- Contact form php end here-->
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
			<div class="contactpage">
				<div class="titleh1"><h1>Contact</h1></div>
				<div class="formwrap">
					<form method="POST" action="contact.php">
						<label>Name</label>
						<p><input type="text" name="msgname" placeholder="Your Name"></p>
						<label>Email</label>
						<p><input type="email" name="msgmail" placeholder="Email Address"></p>
						<label>Message</label>
						<p><textarea placeholder="Your Message" name="msgmsg"></textarea><p>
						<input type="submit" name="msgsubmit" value="SEND">
					</form>
					<?php
						if (isset($sendmsg) && (!empty($name) && !empty($email) && !empty($message))) { ?>
						<div class="pborder">
						<?php 
							$newmessage = new Message();
							$newmessage->send_msg($name, $email, $message);
						?>
						</div>
						<?php } ?>
				</div>

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