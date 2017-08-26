		$stmt = $pdo->prepare("INSERT INTO message(name, email, message) VALUES(?, ?, ?)");
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $message);
		$stmt->execute();
		$verifyifcomplete = $stmt->execute();
		if ( $verifyifcomplete == TRUE) {
			echo "Message Sent";
		} else {
			echo "Failed to send your message";
		}

	}
}
$name = $_POST['msgname'];
$email = $_POST['msgmail'];
$message = $_POST['msgmsg'];
$sendmsg = $_POST['msgsubmit'];

?>
