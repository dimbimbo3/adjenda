<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<?php
// Retrieves all products associated with the given categoryID
function getProdsByCat($categoryID) {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from PRODUCTS
              where categoryID='".$categoryID."' 
              order by prodID";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$products[] = $row;
	  }
	$result->free();
	//close database connection
	$db->close();
    return $products;
}

// Retrieves all products in the database
function getProds() {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from PRODUCTS";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$products[] = $row;
	  }
	$result->free();
	//close database connection
	$db->close();
    return $products;
}

// Retrieves the product associated with the given product ID
function getProductByID($productID) {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from PRODUCTS
              where prodID='".$productID."'";
	$result = $db->query($query);
    $product = $result->fetch_assoc();
	$result->free();
	//close database connection
	$db->close();
    return $product;
}

// Determines if the product's stock has been depleted
// or if the product's stock is already accounted for by the quantity in the cart
function checkStock($product){
    $available = true;
    if($product['stock'] == 0){
        $available = false;
    }
    else if($available && isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $item){
            if($item['productName'] == $product['prodName']){
                if($item['quantity'] == $product['stock']){
                    $available = false;
                }
                break;
            }
        }
    }
    return $available;
}

// Decrease the stock of an item by its purchased quantity
function decreaseStock() {
    foreach($_SESSION['cart'] as $item){
        //open database connection - host, username, password, database
        @ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
        if (mysqli_connect_errno()) {
            echo 'Error: Could not connect to database.  Please try again later.';
            exit;
        }
        $query = "update PRODUCTS
                  set stock = stock - '".$item['quantity']."'
                  where prodID = '".$item['productID']."'";
        $result = $db->query($query);
        //close database connection
        $db->close();
    }
}

// Retrieves the products containing the search term
function searchProds($searchTerm){
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from PRODUCTS
              where prodName like '%".$searchTerm."%'";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$products[] = $row;
	  }
	$result->free();
	//close database connection
	$db->close();
    return $products;
}

// Inserts a new product into the database
function addProd($categoryID, $prodName, $price, $stock, $imageLoc) {
    //open database connection - host, username, password, database
    @ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.';
        exit;
    }
    $query = "insert into PRODUCTS(categoryID,prodName,price,stock,imageLoc)
              values('".$categoryID."', '".$prodName."', '".$price."', '".$stock."', '".$imageLoc."')";
    $result = $db->query($query);
    //close database connection
    $db->close();
}

// Checks if the provided product name already exists within the given category
function checkProdName($categoryID, $prodName){
    $found = false;

    $products = getProds();

    // compares product name from form with product names in the same category,
    // if found then flags boolean variable
    foreach($products as $product){
        if($product['categoryID'] == $categoryID){
            if(strtoupper($product['prodName']) == strtoupper($prodName)){
                $found = true;
                break;	
            }			
        }
    }
	
	return $found;
}

// Change the stock of the given product to the number provided
function changeProdStock($prodID, $stock){
    //open database connection - host, username, password, database
    @ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.';
        exit;
    }
    //updates the stock for the product ID
    $query1 = "update PRODUCTS
               set stock='".$stock."'
               where prodID='".$prodID."'";
    $result = $db->query($query1);
    //close database connection
    $db->close();
}

// Change the price of the given product to the number provided
function changeProdPrice($prodID, $price){
    //open database connection - host, username, password, database
    @ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.';
        exit;
    }
    //updates the price for the product ID
    $query1 = "update PRODUCTS
               set price='".$price."'
               where prodID='".$prodID."'";
    $result = $db->query($query1);
    //close database connection
    $db->close();
}
?>