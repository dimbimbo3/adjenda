<?php require_once('database.php'); ?>

<?php
// Checks if the current date is a lesson for the selected course
function checkLessonDate($courseID, $currentDate) {
    global $db;
    $query = 'SELECT * FROM LESSONS
                WHERE courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->execute();
    $lessons = $statement->fetchAll();
    $statement->closeCursor();

    $result = false;
    foreach($lessons as $lesson){
        if($currentDate == $lesson['ldate']){
            $result = true;
            break; //breaks out of the loop if found
        }
    }

    return $result;
}

//Generates the instructor's random attendance code for a given class lesson
function getAttendanceCode() {
    $attendcode = '';
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';   

    for ($i = 0; $i < 6; $i++) {
        $attendcode .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $attendcode;
}
?>
