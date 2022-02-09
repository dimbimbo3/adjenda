<?php session_start(); //Resumes the session ?> 

<!--Includes the defined header-->
<?php include '../view/initHeader.php'; ?>

<main>
	<div class="container">
		<img src="../images/logo.png" alt="logo" width="75%" style="display: block; margin: auto">
		<form action = "commit.php" method = "post">
			<div class="form-group">
				<label class="col-sm-2 col-form-label"><a href="../index.php" class="btn btn-success">Go Back</a></label>
			</div>
			<!--Checks if error variable has been set in session array,
				and if so displays the defined message-->
				<?php
				if(isset($_SESSION["error"])){
					echo $_SESSION["error"];
				}
			?>
			<div class="form-group">
				<label for="email">Email:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" pattern="[A-Za-z0-9]+.edu" required>
				</div>
			</div>
			<div class="form-group">
				<label for="fname">First Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name" pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group">
				<label for="lname">Last Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name" pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group">
				<label for="pass">Password:</label>
				<div class="col-sm-10">
					<input type="password" class = "form-control" id="pass" name="pass" placeholder="Enter password" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
		<!--Unsets error variable in session arrray-->
		<?php
			unset($_SESSION["error"]);
		?>
	</div>
</main>

<!--Includes the defined footer-->
<?php include '../view/initFooter.php'; ?>