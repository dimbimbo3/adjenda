<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>

<main>
    <h1>Change Account Information</h1>

    <div class="container-fluid">
		<form action = "account.php" method = "post">
			<div class="form-group row">
				<label for="fname" class="col-sm-2 col-form-label">First Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="fName" value=<?php echo "'".$customer['fName']."'"; ?> pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="zip" class="col-sm-2 col-form-label">Middle Initial:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" name="mInit" value=<?php echo "'".$customer['mInit']."'"; ?> maxlength=1 pattern="[A-Za-z]+">
				</div>
			</div>
			<div class="form-group row">
				<label for="lname" class="col-sm-2 col-form-label">Last Name:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="lName" value=<?php echo "'".$customer['lName']."'"; ?> pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="phone" class="col-sm-2 col-form-label">Phone:</label>
				<div class="col-sm-10">
					<input type = "tel" class = "form-control" name ="phone" value=<?php echo "'".$customer['custPhone']."'"; ?> pattern = "\(\d{3}\) +\d{3}-\d{4}" required> &nbsp&nbsp (###) ###-####
				</div>
			</div>
			<div class="form-group row">
				<label for="street" class="col-sm-2 col-form-label">Street:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" name ="street" value=<?php echo "'".$customer['street']."'"; ?> pattern="[A-Za-z0-9\s]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="city" class="col-sm-2 col-form-label">City:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" name ="city" value=<?php echo "'".$customer['city']."'"; ?> pattern="[A-Za-z]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="state" class="col-sm-2 col-form-label">State:</label>
				<div class="col-sm-10">
					<select class = "form-control" name ="state" required>
						<option value=<?php echo "'".$customer['state']."'"; ?> selected hidden><?php echo $customer['state']; ?></option>
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
					<input type = "text" class = "form-control" name ="zip" value=<?php echo "'".$customer['zip']."'"; ?> maxlength=5 pattern ="[0-9]+" required>
				</div>
			</div>
			<div class="form-group">
                <input type="hidden" name="action" value="changeInfo">
				<input type="submit" value="Confirm">
			</div>
		</form>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>