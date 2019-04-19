<?php
 session_start();
 
 	if(!isset($_SESSION['uname'])){
 		header('Location: ../index.php');
 	}

$name = trim(filter_input(INPUT_POST, 'updateMedName', FILTER_SANITIZE_STRING));
$AID = trim(filter_input(INPUT_POST, 'updateMID', FILTER_VALIDATE_INT));

$safeName = preg_replace('/[^A-Za-z0-9\-]/', '', $name);

//validation
if(empty($safeName)){
 $safeName = "blank";
}

require_once('../Models/user_database.php');

$stmt = $db->prepare("UPDATE medications
			SET name = :name
			WHERE medicationID = :ID");

$stmt->bindParam(':name', $safeName);
$stmt->bindParam(':ID', $AID);
$stmt->bindParam(':name', $safeName);

$stmt->execute();
header('Location: ../views/admin_index.php');
?>