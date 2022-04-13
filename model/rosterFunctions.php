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

// Drops a student from the current course selected by instructor
function dropStudent($stuEmail, $courseID){
    global $db;
    $query = 'DELETE FROM ROSTERS WHERE stuEmail = :stuEmail AND courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->bindValue(':stuEmail', $stuEmail);
    $statement->execute();
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

// Generates cryptographically secure enrollment code for new student in roster
function generateEnrollmentCode(){
    $bytes = random_bytes(5);
    $eCode = bin2hex($bytes);

    return $eCode;
}

// Checks if a student is in the given course's roster
function checkRosterForStudent($courseID, $stuEmail){
    global $db;
    $query = 'SELECT * FROM ROSTERS
                WHERE courseID = :courseID AND stuEmail = :stuEmail';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->bindValue(':stuEmail', $stuEmail);
    $statement->execute();
    $checked = $statement->fetch();
    $statement->closeCursor();

    $inRoster = false;
    if(!empty($checked))
        $inRoster = true;

    return $inRoster;
}
?>
