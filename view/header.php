<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
	<?php
        if($_SESSION["accType"] == "S"){
            echo "<title>Student | $title</title>";
        }
    	else if($_SESSION["accType"] == "I"){
            echo "<title>Instructor | $title</title>";
        }
    ?>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="../main.css">
</head>

<!-- the body section -->
<body style="background-color:#FFFFFF;">
    <header>
        <!--Div for background image-->
		<div class="header"></div>
        <!--Navbar START-->
        <ul class = "mainNavBarUL">
            <a class="navbar-brand"><img src="../images/logo.png" height="42" width="auto" alt="logo"></a>
            <li class = "mainNavBarLI" style="float:right"><a href="../login/login.php">LOGOUT</a></li>
            <li class = "mainNavBarLI" style="float:right"><a href="#">Settings</a></li>
            <li class = "mainNavBarLI" style="float:right"><a href="../dashboard/dash.php">Dashboard</a></li>
        </ul>
        <!--Navbar END-->
    </header>
</body>