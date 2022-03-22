<?php require_once('database.php'); ?>

<?php
// Retrieves all students from database
function getStudents() {
    global $db;
    $query = 'SELECT * FROM Students';
    $statement = $db->prepare($query);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;    
}

// Checks if the entered student email already exists in the database
function checkStuEmail($email){
    $found = false;

    $students = getStudents();

    // compares email from form with students emails from database,
    // if found then flags boolean variable
    foreach($students as $student){
        if($student['email'] == $email){
            $found = true;
            break;				
        }
    }
	
	return $found;
}

// Generates cryptographically secure verification code for new student account
function generateVerificationCode(){
    $bytes = random_bytes(5);
    $vCode = bin2hex($bytes);

    return $vCode;
}

// Inserts a new student into the database
function addStudent($email,$fName,$lName,$hashedPass){
    $vCode = generateVerificationCode();
    $verified = 0;

    global $db;
    $query = 'INSERT INTO STUDENTS
                 (email, fName, lName, pass, vCode, verified)
              VALUES
                (:email, :fName, :lName, :hashedPass, :vCode, :verified)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fName', $fName);
    $statement->bindValue(':lName', $lName);
    $statement->bindValue(':hashedPass', $hashedPass);
    $statement->bindValue(':vCode', $vCode);
    $statement->bindValue(':verified', $verified);
    $statement->execute();
    $statement->closeCursor();
}

// Updates the account password associated with the given student email
function updateStuPass($hashedPass, $stuEmail){
	global $db;
    $query = 'UPDATE STUDENTS
              SET pass = :hashedPass
              WHERE email = :stuEmail';
	$statement = $db->prepare($query);
    $statement->bindValue(':hashedPass', $hashedPass);
	$statement->bindValue(':stuEmail', $stuEmail);
    $statement->execute();
    $statement->closeCursor();
}
?>
