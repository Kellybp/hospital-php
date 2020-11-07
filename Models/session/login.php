<?php

 if(!isset($_SESSION)) {
	 //Closes session on page close
	session_set_cookie_params(0);	 
	session_start();
	  }

$user = trim(filter_var($_POST['uname'], FILTER_SANITIZE_STRING));
$safeUser = preg_replace('/[^A-Za-z0-9\-]/', '', $user);
$safePass = trim(filter_var($_POST['Password'], FILTER_SANITIZE_STRING));

if(strlen($safeUser) > 30 ||  strlen($safeUser) > 30){
	header('Location: ../../index.php');
}else{
	require_once("../database.php");
	//To be fixed!!!!!!
	$query = 'SELECT Employee_UserName, Employee_Password, Employee_Types FROM Employees WHERE Employee_UserName = "' . $safeUser . '"';
	$users = $db->query($query);

	foreach($users as $user) : 
	$userName =  $user['Employee_UserName'];
	$passwordVerify = password_verify($safePass, $user['Employee_Password']);
	$type = $user['Employee_Types'];
	endforeach;	
	$location = "../../views/";
	if(isset($_SESSION['uname'])){
		unset($db);
		// echo 'here';
		// echo $_SESSION['uname'];
		// echo $_SESSION['type'];		
		// echo location($location);
		header('Location: '.location($location));
	}
	else{
		if(($safeUser == $userName) && ($passwordVerify)){
			$_SESSION['uname'] = $userName;
			$_SESSION['type'] = $type;
			unset($db);
			echo location($location);
			header('Location: '.location($location));
		}
		else{
			unset($db);
			header('Location: ../../index.php');
		}
	}
}

function location($location){

	switch($_SESSION['type']){
		case 'doc':
			return $location.'doc_index.php';
		case 'rec':
			return $location.'recep_index.php';
		case 'nurse':
			return $location.'nurse_index.php';
		case 'admin':
			return $location.'admin_index.php';
		default:
			session_destroy();
			return '../../index.php';
	}
}
?>