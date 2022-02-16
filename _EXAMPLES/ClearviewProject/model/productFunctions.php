<?php
//retrieves all products associated with the given categoryID
function getProdsByCat($categoryID) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE products.categoryID = :categoryID
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(":categoryID", $categoryID);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

//retrieves all products in the database
function getProds() {
    global $db;
    $query = 'SELECT * FROM products';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

//inserts a new product into the database
function addProd($categoryID, $productName, $price, $imageLocation) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productName, price, imageLocation)
              VALUES
                 (:categoryID, :productName, :price, :imageLocation)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':imageLocation', $imageLocation);
    $statement->execute();
    $statement->closeCursor();
}
?>