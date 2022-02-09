<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
require_once('../model/orderFunctions.php');
require_once('../model/productFunctions.php');

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to showCart
    $action = 'showCart';
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
	//retrieves variables from user account
	//and places an order via the addOrder function
	case 'placeOrder':
		//calls to create a new order in the database
		addOrder($_SESSION['email']);
		//update stock totals for purchased items
		decreaseStock();

		//displays order complete message and redirects back to welcome page
		echo "<script>
				alert('Your order has been placed. Thank you!');
				document.location='../index.php';
			</script>";
		break;
}
?>