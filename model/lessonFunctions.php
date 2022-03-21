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
?>
