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
	//sets action to showCart (when none is selected)
    if ($action == NULL) 
	{
        $action = 'showCart';
    }
}

//selects chosen action
switch($action){
	//displays the items in the session cart
    case 'showCart':
        include('cartDisplay.php');
        break;
    //removes specified item from session cart
    case 'remove':
        $productID = filter_input(INPUT_POST, 'productID');
		//decreases the quantity of the item in the cart by 1,
		//but if quantity is 1 then removes the item entirely
		if($_SESSION['cart'][$productID]['quantity'] > 1){
			$_SESSION['cart'][$productID]['quantity'] -= 1;
		}
		else{
			unset($_SESSION['cart'][$productID]);
		}
        include('cartDisplay.php');
        break;
	//opens checkout form
	case 'checkout':
		include('checkout.php');
		break;
	//retrieves variables from checkout form 
	//and places an order via the addOrder function
	case 'placeOrder':
		$first = filter_input(INPUT_POST, 'first');
		$last = filter_input(INPUT_POST, 'last');
		$street = filter_input(INPUT_POST, 'street');
		$city = filter_input(INPUT_POST, 'city');
		$state = filter_input(INPUT_POST, 'state');

		$custName = $first." ".$last;
        $custAddress = $street.", ".$city.", ".$state;
		$custZip = filter_input(INPUT_POST, 'zip');
        $custCard = filter_input(INPUT_POST, 'card');

		//calls to create a new order in the database
		addOrder($custName,$custAddress,$custZip,$custCard);

		//displays order complete message and redirects back to welcome page
		echo "<script>
				alert('Your order has been placed. Thank you!');
				document.location='../index.php';
			</script>";
		break;
}
?>