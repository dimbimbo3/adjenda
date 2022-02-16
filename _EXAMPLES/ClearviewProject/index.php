<!--Includes the defined header-->
<?php include 'view/header.php'; ?>

<?php //Ends old sessions
	session_start();
	//unsets all session variables
	$_SESSION = array();
	//removes session ID
	session_destroy();
?>

<main>
	<div class="container-fluid" style="text-align:center">
			<h1>Welcome!</h1>
			<p><img src="images/initial.jpg" alt="Initial Image" width="45%" height="auto"></p>
			<!--Links to either user view or employee view-->
			<div style="padding-bottom: 1em">
					<h6>Please select your role:</h6>
					<a href="customer/about.php" class="btn btn-success">Customer</a>
					<a href="employee/login.php" class="btn btn-success">Employee</a>
			</div>
	</div>
</main>

<!--Includes the defined footer-->
<?php include 'view/footer.php'; ?>