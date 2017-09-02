<?php 
session_start();
include 'connection.php';
include 'classes.php';
$userrank = new Rank;
if($userrank->getrank($result['rank'] === 1)) {
	$idis = $_GET['id'];
	$stmt = $pdo->prepare("DELETE FROM blog WHERE  post_id = ? LIMIT 1");
	$stmt->bindParam(1, $idis);
	$deleted = $stmt->execute();
	if ($deleted == TRUE) {
		echo "Your Post was deleted";
	} else {
		echo "Nope";
	}
} else {
	echo "You don't have the premission to delete this post!";
}
?>