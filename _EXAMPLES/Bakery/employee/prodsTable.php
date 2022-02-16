<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
require_once('../model/productFunctions.php');

//retrieves the chosen action
$action = filter_input(INPUT_POST, 'action');

//when no action was chosen
if ($action == NULL) 
{
	//sets action to prodList
    $action = 'prodList';
}

//selects chosen action
switch($action){
    //retrieves and displays current product list
    case 'prodList':
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
		$categoryID = filter_input(INPUT_POST, 'categoryID');
		$prodName = filter_input(INPUT_POST, 'prodName');
		$price = filter_input(INPUT_POST, 'price');
        $stock = filter_input(INPUT_POST, 'stock');

        //creates a lower-case image location string from productName, while removing any hyphens and spaces
        $imageLoc = "images/".str_replace(" ", "", str_replace("-", " ", strtolower($prodName))).".jpg";

        //checks if product name already exists in the same category
        $nameFound = checkProdName($categoryID, $prodName);

        if($nameFound == true){
            // Sets error variable in session array
		    $_SESSION["nameError"] = "<p style=\"color:red\">Product flavor already exists in that category!</p>";
            include('newProd.php');
            break;
        }
        else{
            //calls to add new product to database
            addProd($categoryID, $prodName, $price, $stock, $imageLoc);
            echo "<script>
                    alert('Product has been successfully added!');
                </script>";
            
            //retrieves and displays updated product list
            $products = getProds();
            include('prodsDisplay.php');
            break;
        }
    case 'changeStock':
        $prodID = filter_input(INPUT_POST, 'prodID');
        $stock = filter_input(INPUT_POST, 'newStock');

        changeProdStock($prodID, $stock);
        echo "<script>
				alert('Product stock has been successfully updated!');
			</script>";

        //retrieves and displays updated product list
        $products = getProds();
        include('prodsDisplay.php');
        break;
    case 'changePrice':
        $prodID = filter_input(INPUT_POST, 'prodID');
        $price = filter_input(INPUT_POST, 'newPrice');

        changeProdPrice($prodID, $price);
        echo "<script>
				alert('Product price has been successfully updated!');
			</script>";

        //retrieves and displays updated product list
        $products = getProds();
        include('prodsDisplay.php');
        break;
} 
?>