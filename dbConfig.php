<?php
// Database configuration
$DB_host = "localhost" ;
$DB_username = "elephant" ;
$DB_password  = "@Watermelon" ;
$DB_name = "turlshortner" ;

// Create database connection
try{
    {
		$db = new PDO("mysql:host=$DB_host;dbname=$DB_name", $DB_username, $DB_password);
	   // echo "Connection Successful 200 OK ";
	}
}catch(PDOException $e){
    echo "Oop database connection failed: " . $e->getMessage();
}