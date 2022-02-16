<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
require_once('../model/empFunctions.php');
require_once('../model/deptFunctions.php');
require_once('../model/custFunctions.php');

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to empList
    $action = 'empList';
}

//selects chosen action
switch($action){
    //retrieves and displays current employee list
    case 'empList':
        $employees = getEmps();
        include('empsDisplay.php');
        break;
    //makes the specified employeeID the manager of their department
    case 'makeDeptMan':
        $empID = filter_input(INPUT_POST, 'empID');
        
        makeDeptMan($empID);
        echo "<script>
				alert('Employee has been successfully made the manager of their department!');
			</script>";

        //retrieves and displays updated employee list
        $employees = getEmps();
        include('empsDisplay.php');
        break;
    //fires the employee specified employeeID
    case 'fireEmp':
        $empID = filter_input(INPUT_POST, 'empID');

        fireEmp($empID);
        echo "<script>
				alert('Employee has been successfully fired!');
			</script>";

        //retrieves and displays updated employee list
        $employees = getEmps();
        include('empsDisplay.php');
        break;
    //opens new employee form
    case 'newEmp':
        include('newEmp.php');
        break;
    //retrieves variables from new employee form and hires new employee via the addEmp function
    //then retrieves and displays updated employee list
    case 'hireEmp':
        $fName = filter_input(INPUT_POST, 'fName');
        $mInit = filter_input(INPUT_POST, 'mInit');
		$lName = filter_input(INPUT_POST, 'lName');
        $empPhone = filter_input(INPUT_POST, 'empPhone');
		$salary = filter_input(INPUT_POST, 'salary');
		$departmentID = filter_input(INPUT_POST, 'dept');
		$empEmail = filter_input(INPUT_POST, 'empEmail');
        $empPass = filter_input(INPUT_POST, 'empPass');

        //checks if email is already being used by a customer
	    $custFound = checkCustEmail($empEmail);

        //checks if email is already being used by a employee
        if($custFound == false){
            $empFound = checkEmpEmail($empEmail);
        }

		if($custFound == true || $empFound == true){
            // Sets error variable in session array
		    $_SESSION["empError"] = "<p style=\"color:red\">Email already in database, please choose another email.</p>";
            include('newEmp.php');
            break;
        }
        else{
            // Encrypts the entered password
		    $hashedPass = password_hash($empPass, PASSWORD_DEFAULT);

            //calls to add new employee to database
            addEmp($empEmail,$hashedPass,$fName,$mInit,$lName,$empPhone,$salary,$departmentID);
            echo "<script>
				alert('Employee has been successfully hired!');
			</script>";
            
            //retrieves and displays updated employee list
            $employees = getEmps();
            include('empsDisplay.php');
            break;
        }
} 
?>