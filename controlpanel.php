<?php
session_start();
include 'connection.php';
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
	<title>Dashboard</title>
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
			<!-- control panel wrap start -->
			<div class="titleh1"><h1>Control Panel</h1></div>
			<div class="pborder">
				<?php 
					$userrank = new Rank;
					if($userrank->getrank($result['rank'] === 1)) {
						echo "<p> Your rank is: Administrator. </p>";
					} else {
						echo "<p> Your rank is: Normal User. </p>";
					}
					if (isset($_SESSION['username'])) {
						echo "<p> Welcome  " . "<strong>" . strtoupper($_SESSION['username']) . " </strong> ! </p>";
					} else {
						echo "You must be logged in to access this page!";
					}
					if($userrank->getrank($result['rank'] === 1)) { ?>
						<p>You can modify existing users ranks!</p>
						<form action="controlpanel.php" method="POST">
							<label>Username: </label>
							<input type="text" name="search">
							<label>Rank: </label>
							<select name="rank">
							<option value="0">Normal User</option>
							<option value="1">Administrator</option>
							</select>
							<input type="submit" name="submit" value="Submit">
						</form>
					<?php }
					$search = $_POST['search'];
					$rank_modify = $_POST['rank'];
					$submit1 = $_POST['submit'];
					?>
					<a href="blog.php">Blog</a>
					<a href="messages.php">Messages</a> 
					<a href="postblog.php">New Post</a>
					<?php
					if (isset($_POST['submit']) && !empty ($search)) {
						$userrank->modifyrank($search, $rank_modify);
						echo "Rank Changed!";
					}
					if (isset($_SESSION['username'])) { ?>
						<a href="logout.php">Logout</a>
					<?php
						}
					?>
			</div>
			<!-- control panel wrap end -->
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
<?php
class Rank {
	public function getrank($rank) {
		include 'connection.php';
		$stmt = $pdo->prepare("SELECT rank FROM members where username = ?");
		$stmt->bindParam(1, $_SESSION['username']);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result['rank'];
	}
	public function modifyrank($search, $rank_modify) {
		include 'connection.php';
		$stmt1 = $pdo->prepare("UPDATE members SET rank = $rank_modify WHERE username = ?");
		$stmt1->bindParam(1, $_POST['search']);
		$stmt1->execute();
	}
}
?>
</html>