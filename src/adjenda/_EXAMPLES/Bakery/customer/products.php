<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
require_once('../model/categoryFunctions.php');
require_once('../model/productFunctions.php');
require_once('../model/orderFunctions.php');

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
    //checks if a category has been selected
    $action = filter_input(INPUT_GET, 'action');
	//sets action to productList
    if ($action == NULL) 
	{
        $action = 'productList';
    }
}

//selects chosen action
switch($action){
    //lists products by category
    case 'productList':
        //retrieves selected category ID from the super global GET array
        $categoryID = filter_input(INPUT_GET, 'categoryID', 
                FILTER_VALIDATE_INT);
        //if none was selected, sets categoryID to 1 by default
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
        echo "<script> document.location='cart.php'; </script>";
        break;
    //displays the searched products
    case 'search':
        $searchTerm = filter_input(INPUT_POST, 'searchTerm');
        $searchResults = searchProds($searchTerm);
        include('searchDisplay.php');
        break;
} 
?>