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
?>
