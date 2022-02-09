<?php
require_once('../model/orderFunctions.php');

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to orderList
    $action = 'orderList';
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
        $orderID = filter_input(INPUT_POST, 'ordID');
        removeOrder($orderID);

        //retrieves and displays updated order list
		$orders = getOrders();
        include('ordersDisplay.php');
        break;
} 
?>