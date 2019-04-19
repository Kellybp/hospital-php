<?php
 session_start();
 
 	if(!isset($_SESSION['uname'])){
 		header('Location: ../index.php');
 	}

$name = trim(filter_input(INPUT_POST, 'updateAllName', FILTER_SANITIZE_STRING));
$AID = trim(filter_input(INPUT_POST, 'updateAID', FILTER_VALIDATE_INT));

$safeName = preg_replace('/[^A-Za-z0-9\-]/', '', $name);

//validation
if(empty($safeName)){
 $safeName = "blank";
}

require_once('../Models/user_database.php');

$stmt = $db->prepare("UPDATE allergies
			SET name = :name
			WHERE allergyID = :ID");

$stmt->bindParam(':name', $safeName);
$stmt->bindParam(':ID', $AID);

$stmt->execute();
header('Location: ../views/admin_index.php');
?>