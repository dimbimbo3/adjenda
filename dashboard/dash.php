<?php session_start(); //Resumes the session ?> 

<?php
require_once('../model/courseFunctions.php');
require_once('../model/rosterFunctions.php');
require_once('../model/lessonFunctions.php');

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
	//Displays the dashboard
    case 'showDash':
        //determines if the user is a student or an instructor
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
    //User selects course
    case 'selectCourse':
        //retrieves the selected courseID and stores it as a session variable
        $_SESSION["courseID"] = filter_input(INPUT_POST, 'courseID');
        echo "<script> document.location='../course/course.php'; </script>";
        break;
    //Instructor creates a new course
    case 'createCourse':
        //Course Name
        $courseName = filter_input(INPUT_POST, 'courseName');

        //Course Days
        $selectedDays = $_POST['selectedDays']; //array of checked days
        $days = seperateDays($selectedDays); //seperates the selected days by slashes

        //Course Time
        $duration = filter_input(INPUT_POST, 'duration'); //selected duration
        $startHours = filter_input(INPUT_POST, 'startHours'); //selected start hours
        $startMinutes = filter_input(INPUT_POST, 'startMinutes'); //selected start minutes
        $endHrsMins = $calculateEndHrsMins($duration, $startHours, $starMinutes); //calculates endHours & endMinutes (returns array)
        $endHours = $endHrsMins[0]; //course ending hours
        $endMinutes = $endHrsMins[1]; //course ending minutes
        $startTime = "".$startHours.":".$startMinutes.":00"; //created start time from start hours and minutes
        $endTime = "".$endHours.":".$endMinutes.":00"; //created end time from end hours and minutes

        //adds the created course to the database 
        //*create an if statement that prevents the course's creation if the day and time overlaps with a course from the given instructor!!!*
        //*(get all courses' start and end times that coincide with the instructor's email and check if the start time of the new course is within that range)*
        addCourse($courseName, $_SESSION["accEmail"], $days, $startTime, $endTime);

        //Students
        //$selectedStudents = $_POST['selectedDays']; //Array of checked students
        //*need to add the initially selected students to the class roster table under the course's ID, therefore need to retrieve the newly created course's ID by the course's name*

        //Lessons
        //*need to create the lessons records that correspond with the selected days for the selected semesterSTART to semesterEND*
        $semester = filter_input(INPUT_POST, 'semester');
        $months = getSemesterMonths($semester);

        //reloads the dashboard with the newly created course shown
        echo "<script> document.location='dash.php'; </script>";
        break;
}

///////////////////////////////
//FUNCTIONS FOR COURSE CREATION
///////////////////////////////

// Creates a string containing the given selected days seperated by slashes
function seperateDays($selectedDays){
    $days = "";

    //seperates each day by a foward slash
    for($i = 0; $i < count($selectedDays); $i++){
        $days .= $selectedDays[$i]."/";
    }
    //remove the last slash from the days string
    $days = rtrim($days, "/");

    return $days;
}

// Calculates the endHours and endMinutes of the course based on the selected duration and start time
function calculateEndHrsMins($duration, $startHours, $startMinutes){
    //determines the duration hours and minutes based on the selected duration
    if($duration == 1){
        $durationHours = 1;
        $durationMinutes = 15;
    }
    elseif($duration == 2){
        $durationHours = 2;
        $durationMinutes = 30;
    }
    elseif($duration == 3){
        $durationHours = 3;
        $durationMinutes = 0;
    }

    //calculates the end hours and minutes by adding the duration to the start time
    $hours = $startHours + $durationHours;
    $minutes = $startMinutes + $durationMinutes;
    //if the end minutes equals 60 or more then adds an hour to the end time and leaves the difference as the minutes
    if($minutes >= 60){
        $hours += 1;
        $minutes -= 60;
    }

    //adds a leading zero to the hours (endTime[0]) or minutes (endTime[1]) if they are only one digit
    $endHrsMins = array();
    $endHrsMins[0] = str_pad(strval($hours), 2, "0", STR_PAD_LEFT); //endHours
    $endHrsMins[1] = str_pad(strval($minutes), 2, "0", STR_PAD_LEFT); //endMinutes

    return $endHrsMins;
}

// Determines the months of the course based on the given semester
function getSemesterMonths($semester) {
    //determines the semester start and end based on the selected semester
    if($semester == "FALL"){
        $months = array("September", "October", "November", "December");
        //$semesterSTART = "September";
        //$semesterEND = "December";
    }
    elseif($semester == "SPRING"){
        $months = array("January", "February", "March", "April", "May");
        //$semesterSTART = "January";
        //$semesterEND = "May";
    }
    elseif($semester == "WINTER"){
        $months = array("December", "January");
        //$semesterSTART = "December";
        //$semesterEND = "January";
    }
    elseif($semester == "SUMMER"){
        $months = array("May", "June", "July");
        //$semesterSTART = "May";
        //$semesterEND = "July";
    }

    return $months;
}
?>