<?php session_start(); //Resumes the session ?> 

<?php
//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to showCourse
    $action = 'showCourse';
}

//selects chosen action
switch($action){
	//displays the course
    case 'showCourse':
        //$course = getCourseByID() using session courseNum
        //$roster = getClassRoster() using session courseNum
        //$lesson = getLesson() using session courseNum
        include('courseDisplay.php');
        break;
}
?>