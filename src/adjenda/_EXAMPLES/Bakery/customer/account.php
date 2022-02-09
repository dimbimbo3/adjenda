<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
require_once('../model/custFunctions.php');
require_once('../model/orderFunctions.php');

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to showOptions
    $action = 'showOptions';
}

//selects chosen action
switch($action){
	//displays the account options, including order history
    case 'showOptions':
        $customer = getCustByEmail($_SESSION['email']);
        $orders = getOrdersByEmail($_SESSION['email']);
        include('accountOptions.php');
        break;
    //displays the details for the given order
    case 'viewDetails':
        $orderID = filter_input(INPUT_POST, 'orderID');
        $order = getOrderByID($orderID);
        $orderItems = getOrderItems($orderID);

        $customer = getCustByEmail($_SESSION['email']);
        $customerName = $customer['fName']." ".$customer["mInit"]." ".$customer['lName'];
        $customerAddress = $customer['street'].", ".$customer['city'].", ".$customer['state']." ".$customer['zip'];;
		$customerPhone = $customer['custPhone'];
        
        include('orderDetails.php');
        break;
    //dispays a form containing the information of the account, which can be changed
    case 'showChangeInfo':
		$customer = getCustByEmail($_SESSION['email']);
        include('changeInfo.php');
        break;
    //allows the user to change the name, phone number, & address associated with their account
    case 'changeInfo':
		$fName = filter_input(INPUT_POST, 'fName');
	    $mInit = filter_input(INPUT_POST, 'mInit');
	    $lName = filter_input(INPUT_POST, 'lName');
	    $phone = filter_input(INPUT_POST, 'phone');
	    $street = filter_input(INPUT_POST, 'street');
	    $city = filter_input(INPUT_POST, 'city');
	    $state = filter_input(INPUT_POST, 'state');
	    $zip = filter_input(INPUT_POST, 'zip');

        updateCustInfo($fName, $mInit, $lName, $phone, $street, $city, $state, $zip, $_SESSION['email']);
        echo "<script>
                    alert('Account information has been successfully updated!');
                </script>";

        $customer = getCustByEmail($_SESSION['email']);
        $orders = getOrdersByEmail($_SESSION['email']);
        include('accountOptions.php');
        break;
    //dispays a form for the user to enter their old password and a new one
    case 'showChangePass':
        include('changePass.php');
        break;
    //allows the user to change their account password
    case 'changePass':
        $currentPass = filter_input(INPUT_POST, 'currentPass');
        $newPass = filter_input(INPUT_POST, 'newPass');

        $customer = getCustByEmail($_SESSION['email']);

        //checks if the entered current password matches the one in the database
        if(password_verify($currentPass, $customer['custPass'])){
            //encrypts the new password
		    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

            updateCustPass($hashedPass, $_SESSION['email']);
            echo "<script>
                    alert('Account password has been successfully changed!');
                </script>";

            $orders = getOrdersByEmail($_SESSION['email']);
            include('accountOptions.php');
            break;
        }
        else{
            //defines error message
	        $_SESSION["passError"] = "<p style=\"color:red\">The current password entered is not correct. Please try again.</p>";
            include('changePass.php');
            break;
        }
}
?>