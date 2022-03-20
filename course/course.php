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
        //*needs logic for checking that the current date aligns with one of the selected days for a given course, and that the current time falls within the start/end time for it*
        //(if a lesson is not happening at the current time then do not generate code and instead display message saying that a class is not in progress)
        if(checkLessonDate($_SESSION['courseID'], date("Y-m-d"))){
            //if the current date has a lesson, check that the time is within the range of the lesson
            if(date('H:m:s') > $_SESSION('startTime') && date('H:m:s') < $_SESSION('endTime')){
                $_SESSION['attendanceCode'] = getAttendanceCode();
                echo "<script> alert('Attendance code has been generated for the lesson.'); </script>";
            }
        }
        else{
            echo "<script> alert('Class is not in progress: No code has been generated.'); </script>";
        }
        //*needs logic for displaying the code on the instructor's screen*
        //(CONDITION WITHIN THE 'courseDisplay.php' FILE)
        echo "<script> document.location='../course/course.php'; </script>"; //return to course page
        break;
    //downloads the selected attendance log
    case 'downloadLog' :
        echo "<script>
				alert('Downloading Selected Log...');
			</script>";
        //*needs logic for downloading the selected attendance log*
        //$selectedDate = $_POST['date'];
        //downloadLog($_SESSION['courseID'], $selectedDate)
        echo "<script> document.location='../course/course.php'; </script>"; //return to course page
        break;
}

?>