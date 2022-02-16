<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
	<title>Dan's Bakery - Employee</title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<style>
		#email:valid {
			background-color: #E8F0FE
		}
		header {
			border-bottom: 2px solid;
			padding-bottom: 1em;
		}
		footer {
			border-top: 2px solid;
			padding: 1em 1em;
			text-align: right;
		}
		body {
			background-color: #E8B4A9;
		}
		th {
			padding: 10px 10px;
		}
		td {
			padding: 10px 10px;
		}
		.picture{
			padding-right: 0px;
		}
		#option{
			background: none; 
			border: none; 
			color: #007BFF;
		}
		#option:hover {
			text-decoration: underline;
			color: #0056B3;
		}
	</style>
</head>

<!-- the body section -->
<body>
<?php
//Creates or resumes session (if not already started)
if(!isset($_SESSION))
{
	session_start();
}
?>
	<header>
		<!--Navbar START-->
        <nav class="navbar navbar-expand-sm navbar-light sticky-top" style="background-color: #6C884E; color: #364433; font-family: Georgia, serif;">
            <a class="navbar-brand h1"><b>Dan's Bakery</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="collapsingNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="empsTable.php">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prodsTable.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ordersTable.php">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php" style="font-weight:bold">LOG OUT</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--Navbar END-->
	</header>