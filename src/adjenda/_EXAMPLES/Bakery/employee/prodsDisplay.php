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
    <h1>Product List</h1>
        <div class="col-sm">
            <!-- displays all products -->
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Category ID</th>
                    <th>Product Name</th>
					<th>Price</th>
                    <!-- spacing in table for new price button if CEO is logged in -->
                    <?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
                            <th></th>
                    <?php endif;?>
                    <th>Image (Location)</th>
                    <th>Stock</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['prodID']; ?></td>
                        <td><?php echo $product['categoryID']; ?></td>
						<td><?php echo $product['prodName']; ?></td>
						<td><?php echo "$".$product['price']; ?></td>
                        <!-- displays option to change product price if CEO is logged in -->
                        <?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
                            <td>
                                <form action="prodsTable.php" method="post">
                                    <input type="hidden" name="action" value="changePrice">
                                    <input type="hidden" name="prodID" value="<?php echo $product['prodID']; ?>">
                                    <input type="number" name="newPrice" placeholder="0.01" step="0.01" min="0.01" max="100" required>
                                    <input type="submit" value="Change price">
                                </form>
                            </td>
                        <?php endif;?>
						<td><?php echo $product['imageLoc']; ?></td>
                        <td><?php echo $product['stock']; ?></td>
                        <!-- displays option to change product stock if CEO is logged in -->
                        <?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
                            <td>
                                <form action="prodsTable.php" method="post">
                                    <input type="hidden" name="action" value="changeStock">
                                    <input type="hidden" name="prodID" value="<?php echo $product['prodID']; ?>">
                                    <input type="number" name="newStock" placeholder="0" min=0 max=100 required>
                                    <input type="submit" value="Change stock">
                                </form>
                            </td>
                        <?php endif;?>
                    </tr>
                <?php endforeach; ?>
                <!-- displays option to add a new employee if CEO is logged in -->
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