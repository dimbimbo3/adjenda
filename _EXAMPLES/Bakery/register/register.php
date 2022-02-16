<?php session_start(); //Resumes the session ?> 

<!--Includes the defined header-->
<?php include '../view/header.php'; ?>

<main>
	<div class="container-fluid">
		<h1 style="text-align:center; padding-top: .5em;">Customer Registration</h1>
		<form action = "commit.php" method = "post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"><a href="../index.php" class="btn btn-success">Go Back</a></label>
			</div>
			<!--Checks if error variable has been set in session array,
				and if so displays the defined message-->
				<?php
				if(isset($_SESSION["error"])){
					echo $_SESSION["error"];
				}
			?>
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
				<label for="fname" class="col-sm-2 col-form-label">First Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name" pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="zip" class="col-sm-2 col-form-label">Middle Initial:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id="minit" name="minit" placeholder="Enter middle initial" maxlength=1 pattern="[A-Za-z]+">
				</div>
			</div>
			<div class="form-group row">
				<label for="lname" class="col-sm-2 col-form-label">Last Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name" pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="phone" class="col-sm-2 col-form-label">Phone:</label>
				<div class="col-sm-10">
					<input type = "tel" class = "form-control" id = "phone" name ="phone" placeholder = "(973) 123-4567" pattern = "\(\d{3}\) +\d{3}-\d{4}" required> &nbsp&nbsp (###) ###-####
				</div>
			</div>
			<div class="form-group row">
				<label for="street" class="col-sm-2 col-form-label">Street:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "street" name ="street" placeholder = "123 Some Street" pattern="[A-Za-z0-9\s]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="city" class="col-sm-2 col-form-label">City:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "city" name ="city" placeholder = "City" pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="state" class="col-sm-2 col-form-label">State:</label>
				<div class="col-sm-10">
					<select class = "form-control" id = "state" name ="state" placeholder = "AL" required>
						<option value="AL">(AL) Alabama</option>
						<option value="AK">(AK) Alaska</option>
						<option value="AZ">(AZ) Arizona</option>
						<option value="AR">(AR) Arkansas</option>
						<option value="CA">(CA) California</option>
						<option value="CO">(CO) Colorado</option>
						<option value="CT">(CT) Connecticut</option>
						<option value="DE">(DE) Delaware</option>
						<option value="DC">(DC) District Of Columbia</option>
						<option value="FL">(FL) Florida</option>
						<option value="GA">(GA) Georgia</option>
						<option value="HI">(HI) Hawaii</option>
						<option value="ID">(ID) Idaho</option>
						<option value="IL">(IL) Illinois</option>
						<option value="IN">(IN) Indiana</option>
						<option value="IA">(IA) Iowa</option>
						<option value="KS">(KS) Kansas</option>
						<option value="KY">(KY) Kentucky</option>
						<option value="LA">(LA) Louisiana</option>
						<option value="ME">(ME) Maine</option>
						<option value="MD">(MD) Maryland</option>
						<option value="MA">(MA) Massachusetts</option>
						<option value="MI">(MI) Michigan</option>
						<option value="MN">(MN) Minnesota</option>
						<option value="MS">(MS) Mississippi</option>
						<option value="MO">(MO) Missouri</option>
						<option value="MT">(MT) Montana</option>
						<option value="NE">(NE) Nebraska</option>
						<option value="NV">(NV) Nevada</option>
						<option value="NH">(NH) New Hampshire</option>
						<option value="NJ">(NJ) New Jersey</option>
						<option value="NM">(NM) New Mexico</option>
						<option value="NY">(NY) New York</option>
						<option value="NC">(NC) North Carolina</option>
						<option value="ND">(ND) North Dakota</option>
						<option value="OH">(OH) Ohio</option>
						<option value="OK">(OK) Oklahoma</option>
						<option value="OR">(OR) Oregon</option>
						<option value="PA">(PA) Pennsylvania</option>
						<option value="RI">(RI) Rhode Island</option>
						<option value="SC">(SC) South Carolina</option>
						<option value="SD">(SD) South Dakota</option>
						<option value="TN">(TN) Tennessee</option>
						<option value="TX">(TX) Texas</option>
						<option value="UT">(UT) Utah</option>
						<option value="VT">(VT) Vermont</option>
						<option value="VA">(VA) Virginia</option>
						<option value="WA">(WA) Washington</option>
						<option value="WV">(WV) West Virginia</option>
						<option value="WI">(WI) Wisconsin</option>
						<option value="WY">(WY) Wyoming</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="zip" class="col-sm-2 col-form-label">Zip Code:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "zip" name ="zip" placeholder = "01234" maxlength=5 pattern ="[0-9]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Register Me</button>
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
<?php include '../view/footer.php'; ?>