<?php 
ob_start();
session_start();
?>
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
	include 'classes.php';
	$checkrank = new Rank;
	if($checkrank->getrank($result['rank'] === 1)) {
	$blogtitle = filter_input(INPUT_POST, 'blogtitle', FILTER_SANITIZE_STRING);
	$blogcontent = filter_input(INPUT_POST, 'blogcontent', FILTER_SANITIZE_STRING);
	$blogsubmit = $_POST['blogsubmit'];
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
			<div class="titleh1"><h1>Blog Dashboard</h1></div>
			<!--Post to blog form start -->
			<form method="POST" action="postblog.php">
				<label>Title</label>
				<p><input class="blogclassform" type="text" name="blogtitle" placeholder="Your Post Title"></p>
				<label>Content</label>
				<p><textarea type="text" name="blogcontent" placeholder="Your Post Contents"></textarea></p>
				<p><input type="submit" name="blogsubmit" value="SEND"></p>
			</form>
			<!--Post to blog form end -->
			<?php if (isset($blogsubmit) && (!empty($blogtitle) && (!empty($blogcontent)))) { ?>
				<div class="pborder"> <?php
					$newpost = new Blogpost;
					$newpost->post_msg($blogtitle, $blogcontent);
			} ?></div>
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
<?php } else {
	echo "You can't access this page!";
} 
?>
</html>