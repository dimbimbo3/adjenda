<?php
require('../model/database.php');
require_once('../model/productFunctions.php');

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
	//sets action to prodList (when none is selected)
    if ($action == NULL) 
	{
        $action = 'prodList';
    }
}

//selects chosen action
switch($action){
    //retrieves and displays current product list
    case 'prodList':
        $products = getProds();
        include('prodsDisplay.php');
        break;
    //removes the product with the specified productID
    case 'removeProd':
        $productID = filter_input(INPUT_POST, 'productID');
        removeProd($productID);

        //retrieves and displays updated product list
		$products = getProds();
        include('prodsDisplay.php');
        break;
    //opens new product form
    case 'newProd':
        include('newProd.php');
        break;
    //retrieves variables from new product form and adds new product via the addProd function
    //then retrieves and displays updated product list
    case 'addProd':
		$categoryID = filter_input(INPUT_POST, 'catID');
		$productName = filter_input(INPUT_POST, 'prodName');
		$price = filter_input(INPUT_POST, 'price');
		$imageLocation = filter_input(INPUT_POST, 'imageLoc');

        //calls to add new product to database
        addProd($categoryID, $productName, $price, $imageLocation);
        
        //retrieves and displays updated product list
        $products = getProds();
        include('prodsDisplay.php');
        break;
} 
?>