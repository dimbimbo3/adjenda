<?php
//retrieves all categories
function getCats() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;    
}

//retrieves the category associated with the given categoryID
function getCatName($categoryID) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE categoryID = :categoryID';    
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $categoryName = $category['categoryName'];
    return $categoryName;
}
?>