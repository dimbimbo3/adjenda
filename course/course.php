<?php session_start(); //Resumes the session ?> 

<?php
require_once('../model/courseFunctions.php');
require_once('../model/rosterFunctions.php');
require_once('../model/attendanceFunctions.php');
require_once('../model/lessonFunctions.php');

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
        $course = getCourseByID($_SESSION['courseID']);
        $students = getStudentRosterByID($_SESSION['courseID']);
        $dates = getAttendanceDates($_SESSION['courseID']);
        include('courseDisplay.php');
        break;
    //generates the attendance code for the current lesson
    case 'takeAttendance' :
        $course = getCourseByID($_SESSION['courseID']);
        $date = new DateTime("now", new DateTimeZone('America/New_York') );
        $currentTime = $date->format('H:i:s');
        //checks if the current date has a lesson
        if(checkLessonDate($_SESSION['courseID'], date("Y-m-d"))){
            //if the current date has a lesson, then check that the time is within the range of the lesson's start and end
            if((strtotime($currentTime) >= strtotime($course['sTime'])) && (strtotime($currentTime) <= strtotime($course['eTime']))){
                echo '<script> alert("IN SECOND IF STATEMENT"); </script>';
                $_SESSION['attendanceCode'] = getAttendanceCode();
                echo "<script> alert('Attendance code has been generated for the current lesson.'); </script>";
            }
        }
        //else a lesson is not happening at the current time, so do not generate code and instead display message saying that a class is not in progress
        else{
            echo "<script> alert('NO CODE HAS BEEN GENERATED: The class is not in progress'); </script>";
        }
        
        echo "<script> window.location='../course/course.php'; </script>"; //return to course page
        break;
    //downloads the selected attendance log
    case 'downloadLog' :
        echo "<script>
				alert('Downloading Selected Log...');
			</script>";
        //*needs logic for downloading the selected attendance log*
        //$selectedDate = $_POST['date'];
        //downloadLog($_SESSION['courseID'], $selectedDate)
        echo "<script> window.location='../course/course.php'; </script>"; //return to course page
        break;
}

?>