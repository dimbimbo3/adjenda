<!--Includes the defined header-->
<?php include '../view/empHeader.php'; ?>

<?php
//Creates or resumes session (if not already started)
if(!isset($_SESSION))
{
	session_start();
}
?>
<main>
    <h1>Product List</h1>
        <div class="col-sm">
            <!-- displays all products -->
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Category ID</th>
                    <th>Product Name</th>
					<th>Price</th>
                    <th>Image (Location)</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['productID']; ?></td>
                        <td><?php echo $product['categoryID']; ?></td>
						<td><?php echo $product['productName']; ?></td>
						<td><?php echo "$".$product['price']; ?></td>
						<td><?php echo $product['imageLocation']; ?></td>
                    </tr>
                <?php endforeach; ?>
				<!-- displays option to add a new product if CEO is logged in -->
				<?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
					<tr>
						<td>
							<form action="prodsTable.php" method="post">
								<input type="hidden" name="action" value="newProd">
								<input type="submit" value="Add new product">
							</form>
						</td>
					</tr>
				<?php endif;?>
            </table>
        </div>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>