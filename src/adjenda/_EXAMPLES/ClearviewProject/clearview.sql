-- create and select the database
drop database if exists clearviewDatabase;
create database clearviewDatabase;
use clearviewDatabase;

create table Categories(
	categoryID int NOT NULL AUTO_INCREMENT,
	categoryName varchar(255) NOT NULL,
	PRIMARY KEY(categoryID)
);
create table Products(
	productID int NOT NULL AUTO_INCREMENT,
	categoryID int NOT NULL,
	productName varchar(255) NOT NULL,
	price decimal(10,2) NOT NULL,
	imageLocation varchar(255) NOT NULL,
	PRIMARY KEY(productID),
	FOREIGN KEY(categoryID) REFERENCES Categories(categoryID)
);
create table Departments(
	deptID int NOT NULL AUTO_INCREMENT,
	deptName varchar(255) NOT NULL,
	PRIMARY KEY(deptID)
);
create table Employees(
	empID int NOT NULL AUTO_INCREMENT,
	deptID int NOT NULL,
	empName varchar(255) NOT NULL,
	salary decimal(10,2) NOT NULL,
	email varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	PRIMARY KEY(empID),
	FOREIGN KEY(deptID) REFERENCES Departments(deptID)
);
create table Orders(
	orderID int NOT NULL AUTO_INCREMENT,
	orderTotal decimal(10,2),
	orderDate datetime NOT NULL,
	custName varchar(255) NOT NULL,
	custAddress varchar(255) NOT NULL,
	custZip varchar(255) NOT NULL,
	custCard varchar(255) NOT NULL,
	PRIMARY KEY(orderID)
);
create table OrderItems(
	orderID int NOT NULL,
	productID int NOT NULL,
	itemQuantity int NOT NULL,
	itemCost decimal(10,2) NOT NULL,
	CONSTRAINT oiPK PRIMARY KEY(orderID, productID),
	FOREIGN KEY(orderID) REFERENCES Orders(orderID),
	FOREIGN KEY(productID) REFERENCES Products(productID)
);

-- populate the database
insert into Categories(categoryName) VALUES
('Produce'),
('Beverages'),
('Tools');

insert into Products(categoryID,productName,price,imageLocation) VALUES
(1,'Honeycrisp Apple',1.34,'images/apple.jpg'),
(1,'Navel Orange',0.88,'images/orange.jpg'),
(2,'Alpine Spring Water, 1 Gal',0.98,'images/water.jpg'),
(2,'Dairy Pure Whole Milk, 1 Gal',4.42,'images/milk.jpg'),
(3,'Claw Hammer, 16oz',6.95,'images/hammer.jpg'),
(3,'Reversible Screwdriver, 6-in-1',7.95,'images/screwdriver.jpg');

insert into Departments(deptName) VALUES
('CEO'),
('Customer Service'),
('Accounting');

insert into Employees(deptID,empName,salary,email,password) VALUES
(1,'Francis Decker',55000,'fdecker@gmail.com','bossman'),
(2,'Jimbo Wickens',25000,'jwickens@gmail.com','ezpass'),
(3,'Melissa Mackey',42000,'mmackey@gmail.com','mathguru');

insert into Orders(orderDate,custName,custAddress,custZip,custCard) VALUES
('2021-04-28 23:59:59','Nigel Poedep','123 Easy Street, Nowhere, NJ','01234','0123 4567 8901 2345');

insert into OrderItems(orderID,productID,itemQuantity,itemCost) VALUES
(1,1,2,(SELECT price FROM Products WHERE productID = 1)),
(1,3,1,(SELECT price FROM Products WHERE productID = 3)),
(1,5,1,(SELECT price FROM Products WHERE productID = 5));

UPDATE Orders SET orderTotal = (SELECT SUM(itemQuantity*itemCost) FROM OrderItems WHERE orderID = 1) WHERE orderID = 1;

-- Create a user named clearview with password as clearviewpass
GRANT SELECT, INSERT, DELETE, UPDATE
ON clearviewDatabase.*
TO clearview@localhost
IDENTIFIED BY 'clearviewpass';