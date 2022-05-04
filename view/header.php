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
    <style>
        /*Header CSS for background images.*/
        .header{
            height: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../images/msuSunset.jpg);
            background-position: top;
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: contain;

            padding: 100px;
            text-align: center;
            color: #d0bb94;
            font-size: 25px; 
        }
        /*CSS styles for elements specific to the navigation bar */
        .mainNavBarUL{
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #0079C2;
            /*position: -webkit-sticky; /*Stickyness
            position: sticky; */
            top: 0;
            z-index: 1000;
        }
        .mainNavBarLI {
            float: left;
            border-right:1px solid white;
        }
        .mainNavBarLI:last-child {
            border-right:1px solid white;
            border-left:1px solid white;
        }
        .mainNavBarLI:first-child {
            border-right:0px solid white;
            border-left:0px solid white;
        }
        .mainNavBarLI a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .mainNavBarLI a:hover {
            background-color: #111;
        }
    </style>
</head>

<!-- the body section -->
<body style="background-color:#FFFFFF;">
    <header>
        <!--Div for background image-->
		<div class="header"></div>
        <!--Navbar START-->
        <ul class = "mainNavBarUL">
            <a class="navbar-brand"><img src="../images/logo.png" height="42" width="auto" alt="logo"></a>
            <li class = "mainNavBarLI" style="float:right"><a href="../login/login.php"><b>LOGOUT</b></a></li>
            <li class = "mainNavBarLI" style="float:right"><a href="#">Settings</a></li>
            <li class = "mainNavBarLI" style="float:right"><a href="../dashboard/dash.php">Dashboard</a></li>
        </ul>
        <!--Navbar END-->
    </header>
</body>