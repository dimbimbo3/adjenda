<?php
// Retrieves all categories
function getCats() {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from CATEGORIES
              order by catID";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$categories[] = $row;
	}
	$result->free();
	//close database connection
	$db->close();

    return $categories;    
}

// Retrieves the category associated with the given categoryID
function getCatName($categoryID) {
    //open database connection - host, username, password, database
	@ $db = new mysqli('localhost', 'imbimbd2_user1', 'passwordtest123', 'imbimbd2_bakeryDatabase');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database.  Please try again later.';
		exit;
	}
	$query = "select * from CATEGORIES
              where catID='".$categoryID."'";
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$categoryName = $row['catName'];
	}
	$result->free();
	//close database connection
	$db->close();
    return $categoryName;
}
?>