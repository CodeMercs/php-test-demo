<?php
	/* PHP 7 */
	$dbhost = HOST;
	$dbuser = DATABASE_USER;
	$dbpass = DATABASE_PASSWORD;
	$dbname = DATABASE;
	$conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname) or die('Error with MySQL connection');
?>




