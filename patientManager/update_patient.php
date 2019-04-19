<?php
 session_start();
 
 	if(!isset($_SESSION['uname'])){
 		header('Location: ../index.php');
 	}

$patientID = trim(filter_input(INPUT_POST, 'updatePID', FILTER_VALIDATE_INT));
$recordID = trim(filter_input(INPUT_POST, 'updateRID', FILTER_VALIDATE_INT));
$appointmentID = trim(filter_input(INPUT_POST, 'updateAID', FILTER_VALIDATE_INT));

$height = trim(filter_input(INPUT_POST, 'updateHeight', FILTER_VALIDATE_FLOAT));
$weight = trim(filter_input(INPUT_POST, 'updateWeight', FILTER_VALIDATE_FLOAT));
$temp = trim(filter_input(INPUT_POST, 'updateTemp', FILTER_VALIDATE_FLOAT));
$pRate = trim(filter_input(INPUT_POST, 'updatePRate', FILTER_VALIDATE_FLOAT));
$rRate = trim(filter_input(INPUT_POST, 'updateRRate', FILTER_VALIDATE_FLOAT));
$sys = trim(filter_input(INPUT_POST, 'updateSys', FILTER_VALIDATE_FLOAT));
$dia = trim(filter_input(INPUT_POST, 'updateDia', FILTER_VALIDATE_FLOAT));

$tempType = trim(filter_input(INPUT_POST, 'updateTempS', FILTER_SANITIZE_STRING));
$pHist = trim(filter_input(INPUT_POST, 'pHistory', FILTER_SANITIZE_STRING));
$fHist = trim(filter_input(INPUT_POST, 'fHistory', FILTER_SANITIZE_STRING));
$docNotes = trim(filter_input(INPUT_POST, 'docNote', FILTER_SANITIZE_STRING));
$fNotes = trim(filter_input(INPUT_POST, 'fNotes', FILTER_SANITIZE_STRING));

$safeHeight = safety($height);
$safeWeight = safety($weight);
$safeTemp = safety($temp);
$safeTempT = safety($tempType);
$safepRate= safety($pRate);
$saferRate = safety($rRate);
$safeSys = safety($sys);
$safeDia = safety($dia);

function safety($non){
	$safe = 0;
	$safe = preg_replace('/[^A-Za-z0-9\-]/', '', $non);
	if(empty($safe)){
		$safe = "0.00";
	}
	return $safe;
}

require_once('../Models/user_database.php');

$stmtA = $db->prepare("UPDATE appointments
SET height = :height, 
weight = :weight,
temp = :temp,
temp_site = :tempS,
pulse_rate = :pRate,
resp_rate = :rRate,
BP_Systolic = :Sys,
BP_Diastolic = :Dia,
docNotes = :doc
WHERE apptID = :ID");

$stmtA->bindParam(':height', $safeHeight);
$stmtA->bindParam(':weight', $safeWeight);
$stmtA->bindParam(':temp', $safeTemp);
$stmtA->bindParam(':tempS', $safeTempT);
$stmtA->bindParam(':pRate', $safepRate);
$stmtA->bindParam(':rRate', $saferRate);
$stmtA->bindParam(':Sys', $safeSys);
$stmtA->bindParam(':Dia', $safeDia);
$stmtA->bindParam(':doc', $docNotes);
$stmtA->bindParam(':ID', $appointmentID);

$stmtA->execute();


$stmtB = $db->prepare("UPDATE patients
SET personalHealthHistory = :p, 
familialHealthHistory = :f
WHERE patientID = :ID");

$stmtB->bindParam(':p', $pHist);
$stmtB->bindParam(':f', $fHist);
$stmtB->bindParam(':ID', $patientID);

$stmtB->execute();

$stmtC = $db->prepare("UPDATE records
SET further_notes = :fNotes
WHERE recordID = :ID");

$stmtC->bindParam(':fNotes', $fNotes);
$stmtC->bindParam(':ID', $recordID);

$stmtC->execute();

header('Location: ../views/doc_index.php');
?>