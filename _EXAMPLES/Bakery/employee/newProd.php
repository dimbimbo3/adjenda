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
    <h1>New Product</h1>

    <div class="container-fluid">
		<form action = "prodsTable.php" method = "post">
			<!--Checks if error variable has been set in session array,
				and if so displays the defined message-->
			<?php
				if(isset($_SESSION["nameError"])){
					echo $_SESSION["nameError"];
				}
			?>
			<div class="form-group row">
				<label for="state" class="col-sm-2 col-form-label">Category:</label>
				<div class="col-sm-10">
					<select class = "form-control" id = "categoryID" name ="categoryID" placeholder = "1" required>
						<option value="1">Brownies</option>
						<option value="2">Cakes</option>
						<option value="3">Cookies</option>
						<option value="4">Donuts</option>
						<option value="5">Puddings</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="first" class="col-sm-2 col-form-label">Product Name:</label>
				<div class="col-sm-10">
					<input type = "text" class = "form-control" id = "prodName" name ="prodName" placeholder = "Product" pattern="[A-Z][A-Za-z -]+" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="last" class="col-sm-2 col-form-label">Price:</label>
				<div class="col-sm-10">
					<input type = "number" class = "form-control" id = "price" name ="price" placeholder = "9.99" step="0.01" min="0.01" max=100 required>
				</div>
			</div>
			<div class="form-group row">
				<label for="last" class="col-sm-2 col-form-label">Stock:</label>
				<div class="col-sm-10">
					<input type = "number" class = "form-control" id = "stock" name ="stock" placeholder="0" min=1 max=100 required>
				</div>
			</div>
			<div class="form-group">
                <input type="hidden" name="action" value="addProd">
				<input type="submit" value="Add Product">
			</div>
		</form>
		<!--Unsets error variable in session arrray-->
		<?php
			unset($_SESSION["nameError"]);
		?>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>