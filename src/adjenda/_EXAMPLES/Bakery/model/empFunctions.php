<?php
require_once('../model/deptFunctions.php');

// Retrieves all employees from database
function getEmps() {
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
    return $employees;    
}

// Retrieves the department ID of the given employee
function getEmpDept($empID){
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select departmentID from EMPLOYEES
              where empID ='".$empID."'";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$departmentID = $row['departmentID'];
	  }
	$result->free();
	//close database connection
	$db->close();
    return $departmentID;  
}

// Removes employee with specified ID from database
function fireEmp($empID) {
    removeDeptMan($empID);
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "delete from EMPLOYEES
              where empID='".$empID."'";
	$result = $db->query($query);
	//close database connection
	$db->close();
}

// Checks if the entered employee email already exists in the database
function checkEmpEmail($email){
    $found = false;

    $employees = getEmps();

    // compares email from form with employee emails from database,
    // if found then flags boolean variable
    foreach($employees as $employee){
        if($employee['empEmail'] == $email){
            $found = true;
            break;				
        }
    }
	
	return $found;
}

// Inserts new employee into database
function addEmp($empEmail,$hashedPass,$fName,$mInit,$lName,$empPhone,$salary,$departmentID){
	date_default_timezone_set("America/New_York");
    $hireDate = date("Y-m-d H:i:s");

    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
    $query = "insert into EMPLOYEES(empEmail,empPass,fName,mInit,lName,empPhone,hireDate,salary,departmentID)
			  values('".$empEmail."', '".$hashedPass."', '".$fName."', '".$mInit."', '".$lName."', '".$empPhone."', '".$hireDate."', '".$salary."', '".$departmentID."')";
    $result = $db->query($query);
	//close database connection
	$db->close();
}
?>