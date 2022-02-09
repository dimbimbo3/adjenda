<?php 
    //Resumes session (if not already resumed)
    if(!isset($_SESSION))
    {
        session_start();
    } 
?>

<!--Includes the defined header-->
<?php include '../view/empHeader.php'; ?>

<main>
    <h1>New Employee</h1>

    <div class="container-fluid">
		<form action = "empsTable.php" method = "post">
			<!--Checks if error variable has been set in session array,
				and if so displays the defined message-->
			<?php
				if(isset($_SESSION["empError"])){
					echo $_SESSION["empError"];
				}
			?>
			<div class="form-group row">
				<label for="fname" class="col-sm-2 col-form-label">First Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="fname" name="fName" placeholder="John" pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="zip" class="col-sm-2 col-form-label">Middle Initial:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id="minit" name="mInit" placeholder="A" maxlength=1 pattern="[A-Za-z]+">
				</div>
			</div>
			<div class="form-group row">
				<label for="lname" class="col-sm-2 col-form-label">Last Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="lname" name="lName" placeholder="Smith" pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="phone" class="col-sm-2 col-form-label">Phone:</label>
				<div class="col-sm-10">
					<input type = "tel" class = "form-control" id = "empPhone" name ="empPhone" placeholder = "(973) 123-4567" pattern = "\(\d{3}\) +\d{3}-\d{4}" required> &nbsp&nbsp (###) ###-####
				</div>
			</div>
			<div class="form-group row">
				<label for="street" class="col-sm-2 col-form-label">Salary:</label>
				<div class="col-sm-10">
					<input type = "number" class = "form-control" id = "salary" name ="salary" placeholder = "25000" min=0 pattern ="[0-9]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="state" class="col-sm-2 col-form-label">Department:</label>
				<div class="col-sm-10">
					<select class = "form-control" id = "dept" name ="dept" placeholder = "2" required>
						<option value="2">Accounting</option>
						<option value="3">Customer Service</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="city" class="col-sm-2 col-form-label">Email:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="empEmail" name="empEmail" placeholder="example@gmail.com" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="pass" class="col-sm-2 col-form-label">Password:</label>
				<div class="col-sm-10">
					<input type="password" class = "form-control" id="empPass" name="empPass" placeholder="password" required>
				</div>
			</div>
			<div class="form-group">
                <input type="hidden" name="action" value="hireEmp">
				<input type="submit" value="Hire Employee">
			</div>
		</form>
		<!--Unsets error variable in session arrray-->
		<?php
			unset($_SESSION["empError"]);
		?>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>