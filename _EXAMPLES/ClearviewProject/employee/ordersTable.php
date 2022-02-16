<?php
require('../model/database.php');
require_once('../model/orderFunctions.php');

//Creates or resumes session (if not already started)
if(!isset($_SESSION))
{
	session_start();
}

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
	//sets action to orderList (when none is selected)
    if ($action == NULL) 
	{
        $action = 'orderList';
    }
}

//selects chosen action
switch($action){
    //retrieves and displays current order list
    case 'orderList':
        $orders = getOrders();
        include('ordersDisplay.php');
        break;
    //removes the order with the specified orderID
    case 'removeOrder':
        $orderID = filter_input(INPUT_POST, 'orderID');
        removeOrder($orderID);

        //retrieves and displays updated order list
		$orders = getOrders();
        include('ordersDisplay.php');
        break;
} 
?>