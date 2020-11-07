<?php
 session_start();
 
 	if(!isset($_SESSION['uname'])){
 		header('Location: ../index.php');
 	}

$empID = trim(filter_input(INPUT_POST, 'updateId', FILTER_VALIDATE_INT));
$fName = trim(filter_input(INPUT_POST, 'updateFName', FILTER_SANITIZE_STRING));
$lName = trim(filter_input(INPUT_POST, 'updateLName', FILTER_SANITIZE_STRING));
$contactNum = trim(filter_input(INPUT_POST, 'updateContactNum', FILTER_SANITIZE_STRING));
$currentlyWorking = trim(filter_input(INPUT_POST, 'updateCurrentlyWorking', FILTER_VALIDATE_INT));

$safeFName = preg_replace('/[^A-Za-z0-9\-]/', '', $fName);
$safeLName = preg_replace('/[^A-Za-z0-9\-]/', '', $lName);

//validation
if(empty($safeFName)){
 $safeFName = "blank";
}
if(empty($safeLName)){
 $safeLName = "blank";
}
if(empty($contactNum)){
$contactNum = "blank";
}
if(empty($currentlyWorking)){
$currentlyWorking = "1";	
} 

echo "UPDATE employees
			SET Employee_FName = ".$safeFName.", Employee_LName = ".$safeLName.", Employee_ContactNum = ". $contactNum .", Employee_CurrentlyWorking = ". $currentlyWorking."
			WHERE EmployeeID = ".$empID;
require_once('../Models/database.php');

$stmt = $db->prepare("UPDATE employees
			SET Employee_FName = :fname, Employee_LName = :lname, Employee_ContactNum = :num, Employee_CurrentlyWorking = :is_working
			WHERE EmployeeID = :empID");

$stmt->bindParam(':empID', $empID);
$stmt->bindParam(':fname', $safeFName);
$stmt->bindParam(':lname', $safeLName);
$stmt->bindParam(':num', $contactNum);
$stmt->bindParam(':is_working', $currentlyWorking);

$stmt->execute();
header('Location: ../views/admin_index.php');
?>