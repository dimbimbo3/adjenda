<?php
require('../model/database.php');
require_once('../model/productFunctions.php');
require_once('../model/categoryFunctions.php');
require_once('../model/orderFunctions.php');

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
	//sets action to productList (when none is selected)
    if ($action == NULL) 
	{
        $action = 'productList';
    }
}
//selects chosen action
switch($action){
    //lists products by category
    case 'productList':
        $categoryID = filter_input(INPUT_GET, 'categoryID', 
                FILTER_VALIDATE_INT);
        //sets categoryID to 1 by default (when none is selected)
        if ($categoryID == NULL) 
        {
            $categoryID = 1;
        }
        $categoryName = getCatName($categoryID);
        $categories = getCats();
        $products = getProdsByCat($categoryID);
        include('productsDisplay.php');
        break;
    //adds specified item to session cart
    case 'addToCart':
        $productID = filter_input(INPUT_POST, 'productID');
        $productName = filter_input(INPUT_POST, 'productName');
        $price = filter_input(INPUT_POST, 'price');
        $imageLocation = filter_input(INPUT_POST, 'imageLocation');
        $quantity = 1;
        $item = array(
            'productID' => $productID,
            'productName' => $productName,
            'price'  => $price,
            'quantity' => $quantity,
            'imageLocation' => $imageLocation
        );
        addItem($item);
        header('Location:cartDisplay.php');
        break;
} 
?>