<?php
//This should already be in a session, so I will presume
//attack if someone tries to load this page
if(!isset($_SESSION)) {
	header('Location: ../index.php');
   }
    
	$dsn = 'mysql:host=localhost;dbname=opensource';
	$user = $_SESSION['type'];
	$pass = pass();

	try {
		$db = new PDO($dsn, $user, $pass);

	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		include('../gViews/database_error.php');
		exit();
	}

function pass(){
	switch($_SESSION['type']){
		case 'doc':
			return 'CIpAd&j84%7W';
		case 'rec':
			return 'Hk**b#7G3dC4';
		case 'nurse':
			return '^2ex5v7p@#B*';
		case 'admin':
			return 'c5SDcS2@lhL9';
		default:
			session_destroy();
			return 'nada';
	}
}
?>