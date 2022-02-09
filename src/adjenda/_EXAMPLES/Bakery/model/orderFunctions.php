<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
// Add an item to the cart
function addItem($item) {
    //If item already exists in cart, increment quantity
    if (isset($_SESSION['cart'][$item['productID']])) {
        $_SESSION['cart'][$item['productID']]['quantity']++;
        return;
    }
	//Else adds item array to session cart
    else{
        $_SESSION['cart'][$item['productID']] = $item;
    }
}

// Gets total of cart items
function getTotal() {
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += ($item['price'] * $item['quantity']);
    }
    $total = number_format($subtotal * (1 + 0.07), 2);
    return $total;
}

// Inserts order into database
function addOrder($customerEmail){
    $orderTotal = getTotal();
    date_default_timezone_set("America/New_York");
    $orderDate = date("Y-m-d H:i:s");
    //open database connection - host, username, password, database
    @ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.';
        exit;
    }
    $query = "insert into ORDERS(ordTotal, ordDate, customerEmail)
              values('".$orderTotal."', '".$orderDate."', '".$customerEmail."')";
    $result = $db->query($query);
    //close database connection
    $db->close();

    //add the order items to the database using the same orderID
    $orderID = getOrderID($orderDate,$orderTotal,$customerEmail);
    addOrderItems($orderID);
}

// Retrieve orderID for use with addOrderItems function
function getOrderID($orderDate, $orderTotal, $customerEmail){
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select ordID from ORDERS
              where ordDate='".$orderDate."'
              and ordTotal ='".$orderTotal."'
              and customerEmail ='".$customerEmail."'";
	$result = $db->query($query);
	$order = $result->fetch_assoc();
	$result->free();
	//close database connection
	$db->close();
    return $order['ordID'];
}

// Inserts order items into OrderItems table
function addOrderItems($orderID){
    foreach ($_SESSION['cart'] as $item){
        $cost = number_format($item['quantity'] * $item['price'], 2);
        
        //open database connection - host, username, password, database
        @ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
        if (mysqli_connect_errno()) {
            echo 'Error: Could not connect to database.  Please try again later.';
            exit;
        }
        $query = "insert into ORDERITEMS(orderID, productID, quantity, cost)
                  values('".$orderID."', '".$item['productID']."', '".$item['quantity']."', '".$cost."')";
        $result = $db->query($query);
        //close database connection
        $db->close();
    }
}

// Retrieves all orders in the database
function getOrders() {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from ORDERS
	          order by ordDate ASC";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$orders[] = $row;
	  }
	$result->free();
	//close database connection
	$db->close();
    
    //determines if there are any orders to return
    //if not returns an empty array
    if(isset($orders)){
        return $orders;
    }
    else{
        return array();
    }
}

// Retrieves all orders by the given customer in the database
function getOrdersByEmail($customerEmail) {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from ORDERS
              where customerEmail='".$customerEmail."'
              order by ordDate ASC";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$orders[] = $row;
	  }
	$result->free();
	//close database connection
	$db->close();
    
    //determines if there are any orders to return
    //if not returns an empty array
    if(isset($orders)){
        return $orders;
    }
    else{
        return array();
    }
}

// Retrieves the order specified by the given ID
function getOrderByID($orderID) {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from ORDERS
              where ordID='".$orderID."'";
	$result = $db->query($query);
	$order = $result->fetch_assoc();
	$result->free();
	//close database connection
	$db->close();
    return $order;
}

// Retrieves order items for the given order ID
function getOrderItems($orderID){
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from ORDERITEMS
              where orderID='".$orderID."'
              order by cost ASC";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$orderItems[] = $row;
	}
	$result->free();
	//close database connection
	$db->close();

    return $orderItems;
}

// Removes order with specified ID from database
function removeOrder($orderID) {
    //first, calls function to remove order items associated with order
    removeOrderItems($orderID);

    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "delete from ORDERS
              where ordID='".$orderID."'";
	$result = $db->query($query);
	//close database connection
	$db->close();
}

// Removes orderItems with specified orderID from database
function removeOrderItems($orderID) {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "delete from ORDERITEMS
              where orderID='".$orderID."'";
	$result = $db->query($query);
	//close database connection
	$db->close();
}
?>
