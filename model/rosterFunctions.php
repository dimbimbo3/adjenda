<?php require_once('database.php'); ?>

<?php
// Retrieves all of the students in a class roster by the course's ID
function getStudentRosterByID($courseID) {
    global $db;
    $query = 'SELECT * FROM ROSTERS
                WHERE courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
}

//Retrieves all of the course IDs for the rosters that a student is in
function getRosterCourseIDsByEmail($stuEmail){
    global $db;
    $query = 'SELECT courseID FROM ROSTERS
                WHERE stuEmail = :stuEmail';
    $statement = $db->prepare($query);
    $statement->bindValue(':stuEmail', $stuEmail);
    $statement->execute();
    $courseIDs = $statement->fetchAll();
    $statement->closeCursor();
    return $courseIDs;
}

//Retrieves the roster enrollment status of the given student for the given course ID
function getRosterEnrollment($courseID, $stuEmail){
    global $db;
    $query = 'SELECT enrollment FROM ROSTERS
                WHERE courseID = :courseID AND stuEmail = :stuEmail';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->bindValue(':stuEmail', $stuEmail);
    $statement->execute();
    $enrollment = $statement->fetch();
    $statement->closeCursor();
    $status = $enrollment['enrollment'];
    return $status;
}
?>
