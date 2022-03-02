<?php session_start(); //Resumes the session ?> 

<?php
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
        include('dashDisplay.php');
        break;
    //user selects course
    case 'selectCourse':
        //retrieves the selected courseID and stores it as a session variable
        //$_SESSION["courseID"] = filter_input(INPUT_POST, 'courseNum');
        echo "<script> document.location='../course/course.php'; </script>";
        break;
}
?>