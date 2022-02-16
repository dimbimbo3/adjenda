<?php
//Creates or resumes session (if not already started)
if(!isset($_SESSION))
{
	session_start();
}

//Add an item to the cart
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

//Gets total of cart items
function getTotal() {
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += ($item['price'] * $item['quantity']);
    }
    $total = number_format($subtotal, 2);
    return $total;
}

//Inserts order into database
function addOrder($custName,$custAddress,$custZip,$custCard){
    global $db;
    $query = 'INSERT INTO Orders
                 (orderTotal, orderDate, custName, custAddress, custZip, custCard)
              VALUES
                 (:orderTotal, :orderDate, :custName, :custAddress, :custZip, :custCard)';
    $statement = $db->prepare($query);
    $orderTotal = getTotal();
    $statement->bindValue(':orderTotal', $orderTotal);
    date_default_timezone_set("America/New_York");
    $orderDate = date("Y-m-d H:i:s");
    $statement->bindValue(':orderDate', $orderDate);
    $statement->bindValue(':custName', $custName);
    $statement->bindValue(':custAddress', $custAddress);
    $statement->bindValue(':custZip', $custZip);
    $statement->bindValue(':custCard', $custCard);
    $statement->execute();
    $statement->closeCursor();

    //add the order items to the database using the same orderID
    $idArray = getOrderID($orderDate,$orderTotal,$custName);
    addOrderItems($idArray["orderID"]);
}

//retrieve orderID for use with addOrderItems function
function getOrderID($orderDate, $orderTotal, $custName){
    global $db;
    $query = 'SELECT orderID FROM Orders
              WHERE orderDate = :orderDate 
              AND orderTotal = :orderTotal
              AND custName = :custName';
    $statement = $db->prepare($query);
    $statement->bindValue(":orderDate", $orderDate);
    $statement->bindValue(":orderTotal", $orderTotal);
    $statement->bindValue(":custName", $custName);
    $statement->execute();
    $idArray = $statement->fetch();
    $statement->closeCursor();
    return $idArray;
}

//Inserts order items into OrderItems table
function addOrderItems($orderID){
    global $db;
    foreach ($_SESSION['cart'] as $item) :
        $query = 'INSERT INTO OrderItems
                    (orderID, productID, itemQuantity, itemCost)
                VALUES
                    (:orderID, :productID, :itemQuantity, :itemCost)';
        $statement = $db->prepare($query);
        $statement->bindValue(':orderID', $orderID);
        $statement->bindValue(':productID', $item['productID']);
        $statement->bindValue(':itemQuantity', $item['quantity']);
        $statement->bindValue(':itemCost', $item['price']);
        $statement->execute();
        $statement->closeCursor();
    endforeach;
}

//retrieves all orders in the database
function getOrders() {
    global $db;
    $query = 'SELECT * FROM Orders';
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

//removes order with specified ID from database
function removeOrder($orderID) {
    //first, calls function to remove order items associated with order
    removeOrderItems($orderID);

    global $db;
    $query = 'DELETE FROM Orders
              WHERE orderID = :orderID';
    $statement = $db->prepare($query);
    $statement->bindValue(':orderID', $orderID);
    $statement->execute();
    $statement->closeCursor();
}

//removes orderItems with specified orderID from database
function removeOrderItems($orderID) {
    global $db;
    $query = 'DELETE FROM orderItems
              WHERE orderID = :orderID';
    $statement = $db->prepare($query);
    $statement->bindValue(':orderID', $orderID);
    $statement->execute();
    $statement->closeCursor();
}
?>
