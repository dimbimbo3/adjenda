<?php 

try {
  $db = new PDO('sqlite:../model/database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $db->exec(
    "create table STUDENTS(
        email varchar(255),
        fname varchar(255),
        lname varchar(255),
        pass varchar(255),
        verified tinyint(1) DEFAULT 0,
        PRIMARY KEY(email)
      );

    create table INSTRUCTORS(
        email varchar(255),
        fname varchar(255),
        lname varchar(255),
        pass varchar(255),
        PRIMARY KEY(email)
    );"
  );
    
  // Garbage collect db
  $db = null;
} catch (PDOException $ex) {
  echo $ex->getMessage();
}

?>