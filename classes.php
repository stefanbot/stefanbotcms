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
class User {
	public function log_in($username, $password) {
		include 'connection.php';
		$stmt = $pdo->prepare("SELECT * FROM members where username = ?");
		$stmt->bindParam(1, $username);
		$stmt->execute();
		$result = $stmt->fetch();
		$yourpassword = $result['password'];
		if($result && password_verify($password, $yourpassword)){
			echo "User Logged in!"  . "</p>";
			$_SESSION['username'] = $username;
			header('Location: login.php');
		} else {
			echo "<p>" . "Logging in failed!"  . "</p>";
		}
	}
}
Class Register {
	 public function reg($username, $password, $email) {
	 	include 'connection.php';
		$stmt = $pdo->prepare("INSERT INTO members(username, password, email) VALUES(?, ?, ?)");
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$stmt->bindParam(1, $username);
		$stmt->bindParam(2, $password);
		$stmt->bindParam(3, $email);
		$verifyifcomplete = $stmt->execute();
		if ( $verifyifcomplete == TRUE) {
			echo "Registration Complete";
		} else {
			echo "Registration Failed";
		}

	}
}
Class Blogpost {
	public function post_msg($blogtitle, $blogcontent) {
	 	include 'connection.php';
		$stmt = $pdo->prepare("INSERT INTO blog(title, content) VALUES(?, ?)");
		$blogtitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
		$blogcontent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
		$stmt->bindParam(1, $blogtitle);
		$stmt->bindParam(2, $blogcontent);
		$posttoblog = $stmt->execute();
		if ( $posttoblog == TRUE) {
			echo "New post created!";
		} else {
			echo "Failed to create new post!";
		}
	}
}
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
		$search = filter_input(INPUT_POST, 'rank', FILTER_SANITIZE_STRING);
		$stmt1->bindParam(1, $search);
		$stmt1->execute();
	}
}
class Blogcontents {
	public function get_contents() {
		include 'connection.php';
		$stmt = $pdo->prepare("SELECT title, content FROM blog");
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach ($result as $row) {
			echo "<div class='titleh1'<h1>";
			echo $row['title'];
			echo "</h1></div>";
			echo "<div class='pborder'>";
			echo "<p>" . $row['content'] . "</p>";
			echo "</div>";
			echo "<p class='authorpost'>" . "Author: " . strtoupper($_SESSION['username']) . "</p>";
		}
		if($result == ""){
			echo "There's no title!";
		}
	}
}
Class Message {
	public function send_msg($name, $email, $message) {
	 	include 'connection.php';
		$stmt = $pdo->prepare("INSERT INTO messages(name, email, message) VALUES(?, ?, ?)");
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
		$stmt->bindParam(1, $name);
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $message);
		$msgissent = $stmt->execute();
		if ( $msgissent == TRUE) {
			echo "Message Sent";
		} else {
			echo "Failed to send your message";
		}
	}
}
?>