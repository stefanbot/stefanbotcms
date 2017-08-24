<?php 
try {
	$pdo = new PDO("mysql:host=localhost;dbname=botste6_db", "botste6_db", "steaua");
} catch(Exception $e) {
	die("Error: ". $e->getMessage());
}
?>
