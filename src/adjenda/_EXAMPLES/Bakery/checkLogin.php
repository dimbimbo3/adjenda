<?php session_start(); //Resumes the session ?> 

<?php
// Defines error message
	$error = "<p style=\"color:red\">Invalid login. Please try again.</p>";

// Gets the entered form data
    $email = $_POST['email'];
    $pass = $_POST['pass'];
	
// Retrieves array of customers from database
	//open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from CUSTOMERS";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$customers[] = $row;
	  }
	$result->free();
	//close database connection
	$db->close();
	
// Compares email from form with emails from database, if found
// then compares the pass from form with the hashed password from database
	$foundCust = false;
	foreach($customers as $customer){
		if($customer['custEmail'] == $email){
			if(password_verify($pass,$customer['custPass'])){
				$foundCust = true;
				break;
			}				
		}
	}
	
// Checks if the email/password combination was found
	if($foundCust == true){
		// Sets name variable in session array
		$_SESSION["email"] = $email;
		echo "<script> document.location='customer/about.php'; </script>";
	}
// If not, then checks if the user is an employee
	else{
		// Retrieves array of employees from database
			//open database connection - host, username, password, database
			@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
			if (mysqli_connect_errno()) {
				echo 'Error: Could not connect to database.  Please try again later.';
				exit;
			}
			$query = "select * from EMPLOYEES";
			$result = $db->query($query);
			while($row = $result->fetch_assoc()) {
				$employees[] = $row;
			}
			$result->free();
			//close database connection
			$db->close();
			
		// Compares email from form with emails from database, if found
		// then compares the pass from form with the password from database
			$foundEmp = false;
			foreach($employees as $employee){
				if($employee['empEmail'] == $email){
					if(password_verify($pass,$employee['empPass'])){
						$foundEmp = true;
						break;
					}				
				}
			}
			
		// Checks if the email/password combination was found
			if($foundEmp == true){
				// Sets name variable in session array
				$_SESSION["email"] = $email;
				echo "<script> document.location='employee/empsTable.php'; </script>";
			}
			else{
				// Sets error variable in session array
				$_SESSION["error"] = $error;
				// Returns to index (login screen)
				echo "<script> document.location='index.php'; </script>";
			}
	}
?>