<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
// Retrieves all customers from database
function getCusts() {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from CUSTOMERS";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$customers[] = $row;
	  }
	$result->free();
	//close database connection
	$db->close();
    return $customers;    
}

// Retrieves the customer account information associated with the given email address
function getCustByEmail($custEmail){
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from CUSTOMERS
              where custEmail='".$custEmail."'";
	$result = $db->query($query);
	$customer = $result->fetch_assoc();
	$result->free();
	//close database connection
	$db->close();
    return $customer;
}

// Checks if the entered customer email already exists in the database
function checkCustEmail($email){
    $found = false;

    $customers = getCusts();

    // compares email from form with customer emails from database,
    // if found then flags boolean variable
    foreach($customers as $customer){
        if($customer['custEmail'] == $email){
            $found = true;
            break;				
        }
    }
	
	return $found;
}

// Inserts a new customer into the database
function addCust($email,$hashedPass,$fName,$mInit,$lName,$custPhone,$street,$city,$state,$zip){
	//open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "insert into CUSTOMERS(custEmail, custPass, fName, mInit, lName, custPhone, street, city, state, zip)
			  values('".$email."', '".$hashedPass."', '".$fName."', '".$mInit."', '".$lName."', '".$custPhone."', '".$street."', '".$city."', '".$state."', '".$zip."')";
	$result = $db->query($query);
	//close database connection
	$db->close();
}

// Updates the account information associated with the given customer email
function updateCustInfo($fName, $mInit, $lName, $phone, $street, $city, $state, $zip, $custEmail){
	//open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "update CUSTOMERS
			  set fName='".$fName."',mInit='".$mInit."',lName='".$lName."',custPhone='".$phone."',street='".$street."',city='".$city."',state='".$state."',zip='".$zip."'
			  where custEmail='".$custEmail."'";
	$result = $db->query($query);
	//close database connection
	$db->close();
}

// Updates the account password associated with the given customer email
function updateCustPass($hashedPass, $custEmail){
	//open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "update CUSTOMERS
			  set custPass='".$hashedPass."'
			  where custEmail='".$custEmail."'";
	$result = $db->query($query);
	//close database connection
	$db->close();
}
?>
