<?php
require_once('../model/empFunctions.php');

// Retrieves all departments from the database
function getDepts() {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select manID from DEPARTMENTS";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$depts[] = $row;
	  }
	$result->free();
	//close database connection
	$db->close();
    return $depts;    
}

// Determines if the given employee is the manager of their department
function checkDeptMan($empID){
    $depts = getDepts();
    $deptMan = false;

    foreach($depts as $dept){
        if($dept['manID'] == $empID){
            $deptMan = true;
            break;
        }
    }
    return $deptMan;
}

// Sets the given employee as the manager of their department
function makeDeptMan($empID){
    $empDeptID = getEmpDept($empID);
    date_default_timezone_set("America/New_York");
    $manStart = date("Y-m-d H:i:s");

    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
    //sets the manager start date to the current time
    $query1 = "update DEPARTMENTS
              set manStart='".$manStart."'
              where deptID='".$empDeptID."'";
	$result = $db->query($query1);
    //sets the managerID to the given employee's ID
	$query2 = "update DEPARTMENTS
              set manID='".$empID."'
              where deptID='".$empDeptID."'";
	$result = $db->query($query2);
	//close database connection
	$db->close();
}

// Removes the given employee from being the manager of their department,
// if they are found to be a department manager
function removeDeptMan($empID){
    date_default_timezone_set("America/New_York");
    $manStart = date("Y-m-d H:i:s");

    if(checkDeptMan($empID)){
        //open database connection - host, username, password, database
        @ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
        if (mysqli_connect_errno()) {
            echo 'Error: Could not connect to database.  Please try again later.';
            exit;
        }
        //sets manager start date to current time
        $query1 = "update DEPARTMENTS
                set manStart='".$manStart."'
                where manID='".$empID."'";
        $result = $db->query($query1);
        //sets manager ID to CEO
        $query2 = "update DEPARTMENTS
                set manID='1'
                where manID='".$empID."'";
        $result = $db->query($query2);
        //close database connection
        $db->close();
    }
}
?>