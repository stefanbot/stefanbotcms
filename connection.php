<?php 
try {
	$pdo = new PDO("mysql:host=localhost;dbname=xxx", "xxx", "xxx");
} catch(Exception $e) {
	die("Error: ". $e->getMessage());
}
?>
