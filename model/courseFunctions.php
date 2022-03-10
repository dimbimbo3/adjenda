<?php require_once('database.php'); ?>

<?php
// Retrieves all courses associated with the given instructor email address from the database
function getCoursesByEmail($instructorEmail) {
    global $db;
    $query = 'SELECT * FROM COURSES
                WHERE instrEmail = :instrEmail';
    $statement = $db->prepare($query);
    $statement->bindValue(':instrEmail', $instructorEmail);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

//Retrieves the course with the given course ID
function getCourseByID($courseID){
    global $db;
    $query = 'SELECT * FROM COURSES
                WHERE id = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    return $course;
}

//Adds a new course to the database
function addCourse($name, $instrEmail, $days, $sTime, $eTime){
    global $db;
    $query = 'INSERT INTO COURSES
                 (name, instrEmail, days, sTime, eTime)
              VALUES
                (:name, :instrEmail, :days, :sTime, :eTime)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':instrEmail', $instrEmail);
    $statement->bindValue(':days', $days);
    $statement->bindValue(':sTime', $sTime);
    $statement->bindValue(':eTime', $eTime);
    $statement->execute();
    $statement->closeCursor();
}
?>
