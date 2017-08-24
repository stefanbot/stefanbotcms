<?php 
ob_start();
session_start();
include 'connection.php';
if (isset($_SESSION['username'])) {
	"View messages:";
} else {
	"You must be logged in to see this page!";
	header("Location: login.php");
}
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
			<div class="titleh1"><h1>Your Messages</h1></div>
			<div class="messageswrap">
			<?php
				$newinbox = new Inbox;
				$newinbox->get_message();
			?>
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
<?php
class Inbox {
	public function get_message() {
		include 'connection.php';
		$stmt = $pdo->prepare("SELECT name, email, message FROM messages");
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach($result as $row) {
			echo "<div class='pborder'>";
			echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
			echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
			echo "<p class ='msg1'><strong>Message:</strong> " . $row['message'] . "</p>";
			echo "</div>";
		}
		if ($result == "") {
			echo "There are no messages!";
		}
	}
}
?>
</footer>
</html>