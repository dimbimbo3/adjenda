<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>

<main>
	<h1>Change Account Password</h1>

	<div class="container-fluid">
		<form action = "account.php" method = "post">
			<!--Checks if error variable has been set in session array,
				and if so displays the defined message-->
				<?php
				if(isset($_SESSION["passError"])){
					echo $_SESSION["passError"];
				}
			?>
			<div class="form-group row">
				<label for="pass" class="col-sm-2 col-form-label">Current Password:</label>
				<div class="col-sm-10">
					<input type="password" class = "form-control" name="currentPass" placeholder="Enter current password" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="pass" class="col-sm-2 col-form-label">New Password:</label>
				<div class="col-sm-10">
					<input type="password" class = "form-control" name="newPass" placeholder="Enter new password" required>
				</div>
			</div>
			<div class="form-group">
                <input type="hidden" name="action" value="changePass">
				<input type="submit" value="Change">
			</div>
		</form>
		<!--Unsets error variable in session arrray-->
		<?php
			unset($_SESSION["passError"]);
		?>
	</div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>