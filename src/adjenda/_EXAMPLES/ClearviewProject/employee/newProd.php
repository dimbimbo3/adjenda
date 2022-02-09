<!--Includes the defined header-->
<?php include '../view/empHeader.php'; ?>

<main>
    <h1>New Product</h1>

    <div class="container-fluid">
		<form action = "prodsTable.php" method = "post">
			<div class="form-group row">
				<label for="state" class="col-sm-2 col-form-label">Category:</label>
				<div class="col-sm-10">
					<select class = "form-control" id = "catID" name ="catID" placeholder = "1" required>
						<option value="1">Produce</option>
						<option value="2">Beverages</option>
						<option value="3">Tools</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="first" class="col-sm-2 col-form-label">Product Name:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "prodName" name ="prodName" placeholder = "Placeholder" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="last" class="col-sm-2 col-form-label">Price:</label>
				<div class="col-sm-10">
					<input type = "number" class = "form-control" id = "price" name ="price" placeholder = "9.99" step="0.01" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="street" class="col-sm-2 col-form-label">Image Location:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "imageLoc" name ="imageLoc" placeholder = "images/example.jpg" required>
				</div>
			</div>
			<div class="form-group">
                <input type="hidden" name="action" value="addProd">
				<input type="submit" value="Add Product">
			</div>
		</form>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>