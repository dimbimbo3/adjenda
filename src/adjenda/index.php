<?php session_start(); //Starts the session ?> 

<!--Includes the defined header-->
<?php include 'view/initHeader.php'; ?>

<main>
	<div class="container">
        <img src="./images/logo.png" alt="logo" width="75%" style="display: block; margin: auto">
		<form action = "checkLogin.php" method = "post">
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
			</div>
			<div class="form-group">
				<label for="pass">Password:</label>
				<input type="password" class = "form-control" id="pass" name="pass" placeholder="Enter password" required>
			</div>
			<div class="form-group">
                <p style="text-align:center">Already have an account?</p>
				<button type="submit" class="btn btn-primary" style="display: block; margin: auto; width: 25%">Login</button>
			</div>
			<div class="form-group">
				<p style="text-align:center">Need an Account?</p>
				<a href="register/register.php" class="btn btn-success" style="display: block; margin: auto; width: 25%">Sign Up</a>
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
<?php include 'view/initFooter.php'; ?>