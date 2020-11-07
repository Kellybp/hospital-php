<?php
 session_start();
 
 	if(!isset($_SESSION['uname'])){
 		header('Location: ../index.php');
 	}

$patientID = trim(filter_input(INPUT_POST, 'updatePID', FILTER_VALIDATE_INT));

$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
$bDay = trim(filter_input(INPUT_POST, 'bDay', FILTER_SANITIZE_STRING));
$address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING));
$gender = trim(filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING));
$insurance = trim(filter_input(INPUT_POST, 'insurance', FILTER_SANITIZE_STRING));
$Cname = trim(filter_input(INPUT_POST, 'Cname', FILTER_SANITIZE_STRING));
$Cnum = trim(filter_input(INPUT_POST, 'Cnum', FILTER_SANITIZE_STRING));
$Crel = trim(filter_input(INPUT_POST, 'Crel', FILTER_SANITIZE_STRING));

$safeName = safety($name);
$safePhone = safety($phone);
$safebDay = safety($bDay);
$safeAddress = safety($address);
$safeGender = safety($gender);
$safeInsurance = safety($insurance);
$safeCname = safety($Cname);
$safeCnum = safety($Cnum);
$safeCrel = safety($Crel);

function safety($non){
	$safe = 0;
	$safe = preg_replace('/[^A-Za-z0-9\-]/', '', $non);
	if(empty($safe)){
		$safe = "0.00";
	}
	return $safe;
}

require_once('../Models/database.php');

$stmt = $db->prepare("UPDATE patients
SET name = :name, 
homePhone = :phone,
birthDate = :bDay,
gender = :gender,
insurance = :insurance,
contactName = :cName,
contactNum = :cNum,
contactRelation = :rel,
WHERE apptID = :ID");

$stmt->bindParam(':name', $safeName);
$stmt->bindParam(':phone', $safePhone);
$stmt->bindParam(':bDay', $safebDay);
$stmt->bindParam(':add', $safeAddress);
$stmt->bindParam(':gender', $safeGender);
$stmt->bindParam(':insurance', $safeInsurance);
$stmt->bindParam(':cName', $safeCname);
$stmt->bindParam(':cNum', $safeCnum);
$stmt->bindParam(':rel', $safeCrel);

$stmt->execute();

header('Location: ../views/recep_index.php');
?>