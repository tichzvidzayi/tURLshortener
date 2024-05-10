<?php
// Database configuration
/*
	$DB_host = "localhost" ;
	$DB_username = "your user name" ;
	$DB_password  = "your password" ;
	$DB_name = "turlshortner" ;
*/
// Create database connection
try { {
		$db = new PDO("mysql:host=$DB_host;dbname=$DB_name", $DB_username, $DB_password);
	}
} catch (PDOException $e) {
	echo "Oop database connection failed: " . $e->getMessage();
}
