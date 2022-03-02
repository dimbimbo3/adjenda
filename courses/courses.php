<?php session_start(); //Resumes the session ?> 

<?php
//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to showOptions
    $action = 'showCourses';
}

//selects chosen action
switch($action){
	//displays the course
    case 'showCourses':
        include('coursesDisplay.php');
        break;
}
?>