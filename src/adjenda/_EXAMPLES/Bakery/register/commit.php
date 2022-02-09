<?php session_start(); //Resumes the session ?> 

<?php
require_once('../model/empFunctions.php');
require_once('../model/custFunctions.php');

// Defines error & success messages
	$in_use = "<p style=\"color:red\">Email already in database, please choose another email.</p>";
	$success = "<p style=\"color:green\">Customer account successfully created.</p>";

// Gets the entered form data
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$fname = $_POST['fname'];
	$minit = $_POST['minit'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	
//checks if email is already being used by a customer
	$custFound = checkCustEmail($email);

//checks if email is already being used by a employee
	if($custFound == false){
		$empFound = checkEmpEmail($email);
	}
	
// Checks if email was found to be already in use
	if($custFound == true || $empFound == true){
		// Sets error variable in session array
		$_SESSION["error"] = $in_use;
		// Returns to register screen
		echo "<script> document.location='register.php'; </script>";
	}
	else{
		// Sets success variable in session array
		$_SESSION["success"] = $success;
		// Encrypts the entered password
		$hashedPass = password_hash($pass, PASSWORD_DEFAULT);
		// Adds customer to the database
		addCust($email,$hashedPass,$fname,$minit,$lname,$phone,$street,$city,$state,$zip);
		// Returns to index (login screen)
		echo "<script> document.location='../index.php'; </script>";
	}
?>