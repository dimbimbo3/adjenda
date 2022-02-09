<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>

<main>
    <h1>Checkout</h1>

    <div class="container-fluid">
		<form action = "cart.php" method = "post">
			<div class="form-group row">
				<label for="first" class="col-sm-2 col-form-label">First Name:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "first" name ="first" placeholder = "John" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="last" class="col-sm-2 col-form-label">Last Name:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "last" name ="last" placeholder = "Smith" required>
				</div>
			</div>
			<div class="form-group">
				<strong>Address</strong>
			</div>
			<div class="form-group row">
				<label for="street" class="col-sm-2 col-form-label">Street:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "street" name ="street" placeholder = "123 Some Street" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="city" class="col-sm-2 col-form-label">City:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "city" name ="city" placeholder = "City" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="state" class="col-sm-2 col-form-label">State:</label>
				<div class="col-sm-10">
					<input list = "states" class = "form-control" id = "state" name ="state" placeholder = "AL" required>
					<datalist id = "states">
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</datalist>
				</div>
			</div>
			<div class="form-group row">
				<label for="zip" class="col-sm-2 col-form-label">Zip Code:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "zip" name ="zip" placeholder = "01234" pattern ="\d{5}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="card" class="col-sm-2 col-form-label">Card Number:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "card" name ="card" placeholder = "#### #### #### ####" pattern = "\d{4} +\d{4} +\d{4} +\d{4}" required>
				</div>
			</div>
			<div class="form-group">
                <input type="hidden" name="action" value="placeOrder">
				<input type="submit" value="Place Order">
			</div>
		</form>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>