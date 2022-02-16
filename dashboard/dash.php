<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to showOptions
    $action = 'showDash';
}

//selects chosen action
switch($action){
	//displays the dashboard
    case 'showDash':
        include('dashDisplay.php');
        break;
}
?>