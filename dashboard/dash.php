<?php session_start(); //Resumes the session ?> 

<?php
require_once('../model/courseFunctions.php');
require_once('../model/rosterFunctions.php');

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to showDash
    $action = 'showDash';
}

//selects chosen action
switch($action){
	//displays the dashboard
    case 'showDash':
        //Determines if the user is a student or an instructor
        if($_SESSION["accType"] == "S"){
            //retrieves each courseID from the rosters that the student is in
            $courseIDs = getRosterCourseIDsByEmail($_SESSION["accEmail"]);
            //loops through all retrieved courseIDs and stores each course found in an array
            foreach($courseIDs as $courseID){
                $courses[] = getCourseByID($courseID['courseID']);
            }
        }
        elseif($_SESSION["accType"] == "I"){
            //retrieves all the courses associated with the instructor's email
            $courses = getCoursesByEmail($_SESSION["accEmail"]);
        }
        include('dashDisplay.php');
        break;
    //user selects course
    case 'selectCourse':
        //retrieves the selected courseID and stores it as a session variable
        $_SESSION["courseID"] = filter_input(INPUT_POST, 'courseNum');
        echo "<script> document.location='../course/course.php'; </script>";
        break;
}
?>