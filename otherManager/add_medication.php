<?php
 session_start();
 
 	if(!isset($_SESSION['uname'])){
 		header('Location: ../index.php');
 	}

$name = trim(filter_input(INPUT_POST, 'medName', FILTER_SANITIZE_STRING));

$safeName = preg_replace('/[^A-Za-z0-9\-]/', '', $name);

//validation
if(empty($safeName)){
 $safeFName = "blank";
}
if(empty($safeName)){
header('Location: ../views/admin_index.php');
}

require_once('../models/user_database.php');
$stmt = $db->prepare("INSERT INTO medications (name)
			VALUES (:name)");

$stmt->bindParam(':name', $safeName);

$stmt->execute();
header('Location: ../views/admin_index.php');

?>