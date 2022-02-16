<?php
require('../model/database.php');
require_once('../model/empFunctions.php');

//Creates or resumes session (if not already started)
if(!isset($_SESSION))
{
	session_start();
}

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
	//sets action to empList (when none is selected)
    if ($action == NULL) 
	{
        $action = 'empList';
    }
}

//selects chosen action
switch($action){
    //retrieves and displays current employee list
    case 'empList':
        $employees = getEmps();
        include('empsDisplay.php');
        break;
    //fires the employee specified employeeID
    case 'fireEmp':
        $empID = filter_input(INPUT_POST, 'empID');
        fireEmp($empID);

        //retrieves and displays updated employee list
        $employees = getEmps();
        include('empsDisplay.php');
        break;
    //opens new employee form
    case 'newEmp':
        include('newEmp.php');
        break;
    //retrieves variables from new employee form and hires new employee via the hireEmp function
    //then retrieves and displays updated employee list
    case 'hireEmp':
        $first = filter_input(INPUT_POST, 'first');
		$last = filter_input(INPUT_POST, 'last');
		$salary = filter_input(INPUT_POST, 'salary');
		$department = filter_input(INPUT_POST, 'dept');
		$email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'pass');

		$empName = $first." ".$last;

        //calls to add new employee to database
        hireEmp($empName,$salary,$department,$email,$password);
        
        //retrieves and displays updated employee list
        $employees = getEmps();
        include('empsDisplay.php');
        break;
} 
?>