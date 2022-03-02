<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
	<?php
        if($_SESSION["accType"] == "S"){
            echo "<title>Student</title>";
        }
    	else if($_SESSION["accType"] == "I"){
            echo "<title>Instructor</title>";
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
<!--  -->
<body style="background-color:#FFFFFF;">
	<header>
		<!--Navbar START-->
		<nav class="navbar navbar-expand-sm navbar-light sticky-top" style="background-color: #0079C2;">
			<a class="navbar-brand">
				<img src="../images/logo.png" height="60" width="auto" alt="logo">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNav">
                <span class="navbar-toggler-icon"></span>
            </button>

			<div class="collapse navbar-collapse" id="collapsingNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" style="color: white; padding-left: 5%" href=http://localhost/adjenda/dashboard/dash.php>
							dashboard
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color: white; padding-left: 5%">
							settings
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" style="color: white; padding-left: 5%; font-weight:bold" href=http://localhost/adjenda/login/login.php>
							LOGOUT
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<!--Navbar END-->			
	</header>
</body>