<?php
require('../model/database.php');

// Resumes session and defines error message
	session_start();
	$error = "<p style=\"color:red\">Invalid login. Please try again.</p>";

// Gets the entered form data
    $email = $_POST['email'];
    $pass = $_POST['pass'];
	
// Retrieves array of employees from database
	$query = 'SELECT * FROM employees';
	$statement = $db->prepare($query);
	$statement->execute();
	$employees = $statement->fetchAll();
    $statement->closeCursor();
	
// Compares email from form with emails from database, if found
// then compares the pass from form with the password from database
	$found = false;
	foreach($employees as $employee){
		if($employee['email'] == $email){
			if($employee['password'] == $pass){
				$found = true;
				break;
			}				
		}
	}
	
// Checks if the email/password combination was found
	if($found == true){
		// Sets name variable in session array
		$_SESSION["email"] = $email;
		header('Location:empsTable.php');
	}
	else{
		// Sets error variable in session array
		$_SESSION["error"] = $error;
		// Returns to index (login screen)
		header('Location:login.php');
	}
?>