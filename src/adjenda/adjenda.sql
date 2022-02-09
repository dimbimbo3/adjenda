-- create and select the database
drop database if exists adjendaDatabase;
create database adjendaDatabase;
use adjendaDatabase;

create table STUDENTS{
    email varchar(255),
    fname varchar(255),
    lname varchar(255),
    pass varchar(255),
    verified tinyint(1) DEFAULT 0,
    PRIMARY KEY(email)
}

insert into STUDENTS(email,fname,lname,pass) values
('imbimbod2@montclair.edu','Dan','Imbimbo','test');

-- Create a user named clearview with password as clearviewpass
GRANT SELECT, INSERT, DELETE, UPDATE
ON adjendaDatabase.*
TO adjenda@localhost
IDENTIFIED BY 'adjendapass';