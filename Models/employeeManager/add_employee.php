<?php
 session_start();
 
 	if(!isset($_SESSION['uname'])){
 		header('Location: ../index.php');
 	}

$fName = trim(filter_input(INPUT_POST, 'addFName', FILTER_SANITIZE_STRING));
$lName = trim(filter_input(INPUT_POST, 'addLName', FILTER_SANITIZE_STRING));
$contactNum = trim(filter_input(INPUT_POST, 'addContactNum', FILTER_SANITIZE_STRING));
$position = trim(filter_input(INPUT_POST, 'addEmployeeTypes', FILTER_SANITIZE_STRING));
$user = trim(filter_input(INPUT_POST, 'addUserName', FILTER_SANITIZE_STRING));
$pass = trim(filter_input(INPUT_POST, 'addPass', FILTER_SANITIZE_STRING));

$safeUser = preg_replace('/[^A-Za-z0-9\-]/', '', $user);
$safeFName = preg_replace('/[^A-Za-z0-9\-]/', '', $fName);
$safeLName = preg_replace('/[^A-Za-z0-9\-]/', '', $lName);
$passHash = password_hash($pass, PASSWORD_DEFAULT);

//echo "b" . password_hash('b', PASSWORD_DEFAULT) . "------";
//echo "bob" . password_hash('b', PASSWORD_DEFAULT) . "------";

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
if(empty($position)){
$position = "rec";	
} 
if(empty($safeUser)){
header('Location: ../views/admin_index.php');
}
if(empty($pass)){
header('Location: ../views/admin_index.php');
}

require_once('../models/database.php');
echo $safeFName . "  " . $safeLName. "  " .$contactNum. "  " .$position. "  ".$safeUser."  ".$passHash;
$stmt = $db->prepare("INSERT INTO employees 
			(Employee_Types, Employee_FName, Employee_LName, Employee_ContactNum, Employee_UserName, Employee_Password) 
			VALUES (:pos, :fname, :lname, :num, :user, :pass)");

$stmt->bindParam(':fname', $safeFName);
$stmt->bindParam(':lname', $safeLName);
$stmt->bindParam(':num', $contactNum);
$stmt->bindParam(':pos', $position);
$stmt->bindParam(':user', $safeUser);
$stmt->bindParam(':pass', $passHash);

$stmt->execute();
header('Location: ../views/admin_index.php');

?>