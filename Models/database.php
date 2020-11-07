<?php
//This should already be in a session, so I will presume
//attack if someone tries to load this page
if(!isset($_SESSION)) {
	header('Location: ../index.php');
   }
    
	$dsn = 'mysql:host=localhost;dbname=DATABASETABLENAME';
	$user = 'USERNAME';
	$pass = 'PASSWORD';

	try {
		$db = new PDO($dsn, $user, $pass);

	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		include('../../views/database_error.php');
		exit();
	}
?>