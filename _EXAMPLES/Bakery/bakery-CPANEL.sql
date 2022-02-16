create table CATEGORIES(
	catID int NOT NULL AUTO_INCREMENT,
	catName varchar(255) NOT NULL,
	PRIMARY KEY(catID)
);
create table PRODUCTS(
	prodID int NOT NULL AUTO_INCREMENT,
	categoryID int NOT NULL,
	prodName varchar(255) NOT NULL,
	price decimal(10,2) NOT NULL,
	stock int NOT NULL,
	imageLoc varchar(255) NOT NULL,
	PRIMARY KEY(prodID),
	FOREIGN KEY(categoryID) REFERENCES CATEGORIES(catID)
);
create table DEPARTMENTS(
	deptID int NOT NULL AUTO_INCREMENT,
	deptName varchar(255) NOT NULL,
	PRIMARY KEY(deptID)
);
create table EMPLOYEES(
	empID int NOT NULL AUTO_INCREMENT,
	empEmail varchar(255) NOT NULL,
	empPass varchar(255) NOT NULL,
	fName varchar(255) NOT NULL,
	mInit char NOT NULL,
	lName varchar(255) NOT NULL,
	empPhone varchar(255) NOT NULL,
	hireDate datetime NOT NULL,
	salary decimal(10,2) NOT NULL,
	departmentID int NOT NULL,
	PRIMARY KEY(empID),
	FOREIGN KEY(departmentID) REFERENCES DEPARTMENTS(deptID)
);
create table CUSTOMERS(
	custEmail varchar(255) NOT NULL UNIQUE,
	custPass varchar(255) NOT NULL,
	fName varchar(255) NOT NULL,
	mInit char NOT NULL,
	lName varchar(255) NOT NULL,
	custPhone varchar(255) NOT NULL,
	street varchar(255) NOT NULL,
	city varchar(255) NOT NULL,
	state varchar(2) NOT NULL,
	zip varchar(5) NOT NULL,
	PRIMARY KEY(custEmail)
);
create table ORDERS(
	ordID int NOT NULL AUTO_INCREMENT,
	ordTotal decimal(10,2),
	ordDate datetime NOT NULL,
	customerEmail varchar(255) NOT NULL,
	PRIMARY KEY(ordID),
	FOREIGN KEY(customerEmail) REFERENCES CUSTOMERS(custEmail)
);
create table ORDERITEMS(
	orderID int NOT NULL,
	productID int NOT NULL,
	quantity int NOT NULL,
	cost decimal(10,2) NOT NULL,
	CONSTRAINT oiPK PRIMARY KEY(orderID, productID),
	FOREIGN KEY(orderID) REFERENCES ORDERS(ordID),
	FOREIGN KEY(productID) REFERENCES PRODUCTS(prodID)
);
-- populate the database
insert into CATEGORIES(catName) VALUES
('Brownies'),
('Cakes'),
('Cookies'),
('Donuts'),
('Puddings');

insert into PRODUCTS(categoryID,prodName,price,stock,imageLoc) VALUES
(1,'Blondie',2.50,2,'images/blondie.jpg'),
(1,'Cheesecake',2.50,5,'images/cheesecake.jpg'),
(1,'Cookies and Cream',2.50,5,'images/cookiesandcream.jpg'),
(1,'Fudge',2.50,5,'images/fudge.jpg'),
(1,'Marshmallow',2.50,5,'images/marshmallow.jpg'),
(1,'Mint',2.50,5,'images/mint.jpg'),
(2,'Angel Food',15.00,3,'images/angelfood.jpg'),
(2,'Carrot',15.00,3,'images/carrot.jpg'),
(2,'Crumb',15.00,3,'images/crumb.jpg'),
(2,'Pineapple Upside-down',15.00,3,'images/pineappleupsidedown.jpg'),
(2,'Pound',15.00,3,'images/pound.jpg'),
(2,'Tiramisu',15.00,3,'images/tiramisu.jpg'),
(3,'Chocolate Chip',2.00,12,'images/chocolatechip.jpg'),
(3,'Gingerbread',2.00,12,'images/gingerbread.jpg'),
(3,'Macaroon',2.00,12,'images/macaroon.jpg'),
(3,'Oatmeal Raisin',2.00,12,'images/oatmealraisin.jpg'),
(3,'Peanut Butter',2.00,12,'images/peanutbutter.jpg'),
(3,'Shortbread',2.00,12,'images/shortbread.jpg'),
(4,'Apple Cider',3.50,6,'images/applecider.jpg'),
(4,'Boston Cream',3.50,6,'images/bostoncream.jpg'),
(4,'Chocolate Frosted',3.50,6,'images/chocolatefrosted.jpg'),
(4,'French Cruller',3.50,6,'images/frenchcruller.jpg'),
(4,'Glazed',3.50,6,'images/glazed.jpg'),
(4,'Strawberry Sprinkled',3.50,6,'images/strawberrysprinkled.jpg'),
(5,'Banana',1.50,8,'images/banana.jpg'),
(5,'Caramel Apple',1.50,8,'images/caramelapple.jpg'),
(5,'Chocolate Raspberry',1.50,8,'images/chocolateraspberry.jpg'),
(5,'Red Velvet',1.50,8,'images/redvelvet.jpg'),
(5,'Rice',1.50,8,'images/rice.jpg'),
(5,'Vanilla',1.50,8,'images/vanilla.jpg');

insert into DEPARTMENTS(deptName) VALUES
('CEO'),
('Accounting'),
('Customer Service');

insert into EMPLOYEES(empEmail,empPass,fName,mInit,lName,empPhone,hireDate,salary,departmentID) VALUES
('fdecker@gmail.com','$2y$10$6mOFLcCnwOc7CElNMv838eFwr6zfmxu8CcveEUVkY1sYDbV4yStca','Francis','P','Decker','(989) 118-4343','2021-04-26 00:00:00',55000,1),
('mmackey@gmail.com','$2y$10$iEHGyhifwdiFsJKpuOzZ/e7T1b4ZGaJOXTySZpsHTXUA3OICL3awe','Melissa','A','Mackey','(742) 828-6624','2021-05-03 09:27:41',42000,2),
('jwickens@gmail.com','$2y$10$VZlPRT1GC.s03WgCRA0yFenn4PChYBon4cARObvv0bzbh8fN0MdDu','Jimbo','Q','Wickens','(628) 473-5839','2021-09-26 12:55:19',25000,3);

alter table DEPARTMENTS ADD manID int;
alter table DEPARTMENTS ADD manStart datetime;
alter table DEPARTMENTS ADD CONSTRAINT FOREIGN KEY(manID) REFERENCES EMPLOYEES(empID);

UPDATE DEPARTMENTS SET manID=1, manStart='2021-04-26 00:00:00' WHERE deptID=1;
UPDATE DEPARTMENTS SET manID=2, manStart='2021-05-03 09:27:41' WHERE deptID=2;
UPDATE DEPARTMENTS SET manID=3, manStart='2021-09-26 12:55:19' WHERE deptID=3;

insert into CUSTOMERS(custEmail,custPass,fName,mInit,lName,custPhone,street,city,state,zip) VALUES
('test@gmail.com','$2y$10$J8g.KOemwVEbl4/v77mrzezT.iwx15zI7IsiSWsnGeuSNIx9GpVLC','Nigel','C','Finster','(973) 123-4567','63 Easy Street','Nowhere','NJ','07123');

insert into ORDERS (ordDate,customerEmail) VALUES
('2021-11-21 19:43:18','test@gmail.com');

insert into ORDERITEMS(orderID,productID,quantity,cost) VALUES
(1,5,1,1*(SELECT price FROM PRODUCTS WHERE prodID = 5)),
(1,13,2,2*(SELECT price FROM PRODUCTS WHERE prodID = 13)),
(1,30,1,1*(SELECT price FROM PRODUCTS WHERE prodID = 30));

UPDATE ORDERS
SET ordTotal = (SELECT SUM(cost) FROM ORDERITEMS WHERE orderID = 1) * (1 + 0.07)
WHERE ordID = 1;

UPDATE PRODUCTS
SET stock = stock - (SELECT quantity FROM ORDERITEMS WHERE productID = 5)
WHERE prodID = 5;

UPDATE PRODUCTS
SET stock = stock - (SELECT quantity FROM ORDERITEMS WHERE productID = 13)
WHERE prodID = 13;

UPDATE PRODUCTS
SET stock = stock - (SELECT quantity FROM ORDERITEMS WHERE productID = 30)
WHERE prodID = 30;