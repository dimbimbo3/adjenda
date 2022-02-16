<!--Includes the defined header-->
<?php include '../view/empHeader.php'; ?>

<main>
    <h1>New Employee</h1>

    <div class="container-fluid">
		<form action = "empsTable.php" method = "post">
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
			<div class="form-group row">
				<label for="street" class="col-sm-2 col-form-label">Salary:</label>
				<div class="col-sm-10">
					<input type = "number" class = "form-control" id = "salary" name ="salary" placeholder = "20000" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="state" class="col-sm-2 col-form-label">Department:</label>
				<div class="col-sm-10">
					<select class = "form-control" id = "dept" name ="dept" placeholder = "2" required>
						<option value="2">Customer Service</option>
						<option value="3">Accounting</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="city" class="col-sm-2 col-form-label">Email:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="pass" class="col-sm-2 col-form-label">Password:</label>
				<div class="col-sm-10">
					<input type="password" class = "form-control" id="pass" name="pass" placeholder="password" required>
				</div>
			</div>
			<div class="form-group">
                <input type="hidden" name="action" value="hireEmp">
				<input type="submit" value="Hire Employee">
			</div>
		</form>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>