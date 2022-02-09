<?php
//retrieves all employees from database
function getEmps() {
    global $db;
    $query = 'SELECT * FROM Employees';
    $statement = $db->prepare($query);
    $statement->execute();
    $employees = $statement->fetchAll();
    $statement->closeCursor();
    return $employees;    
}

//removes employee with specified ID from database
function fireEmp($empID) {
    global $db;
    $query = 'DELETE FROM Employees
              WHERE empID = :empID';
    $statement = $db->prepare($query);
    $statement->bindValue(':empID', $empID);
    $statement->execute();
    $statement->closeCursor();
}

//inserts new employee into database
function hireEmp($empName,$salary,$department,$email,$password){
    global $db;
    $query = 'INSERT INTO Employees
                 (deptID, empName, salary, email, password)
              VALUES
                (:deptID, :empName, :salary, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':deptID', $department);
    $statement->bindValue(':empName', $empName);
    $statement->bindValue(':salary', $salary);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
?>