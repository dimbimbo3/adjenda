<?php session_start(); //Starts the session ?> 

<!--Includes the defined header-->
<?php include 'view/header.php'; ?>

<main>
	<div class="container-fluid">
		<h1 style="text-align:center; padding: .5em;">Account Login</h1>
		<form action = "checkLogin.php" method = "post">
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="pass" class="col-sm-2 col-form-label">Password:</label>
				<div class="col-sm-10">
					<input type="password" class = "form-control" id="pass" name="pass" placeholder="Enter password" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-10">
					<p>Not a customer?</p>
					<a href="register/register.php" class="btn btn-success  text-black">Press to register</a>
				</div>
			</div>
			<!--Checks if success variable has been set in session array,
				and if so displays the defined message-->
			<?php
				if(isset($_SESSION["success"])){
					echo $_SESSION["success"];
				}
			?>
			<!--Checks if error variable has been set in session array,
				and if so displays the defined message-->
			<?php
				if(isset($_SESSION["error"])){
					echo $_SESSION["error"];
				}
			?>
		</form>
	</div>
</main>
<!--Ends old sessions-->
<?php
	//unsets all session variables
	$_SESSION = array();
	//removes session ID
	session_destroy();
?>

<!--Includes the defined footer-->
<?php include 'view/footer.php'; ?>