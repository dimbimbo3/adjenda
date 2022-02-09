<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>
<?php require_once('../model/orderFunctions.php'); ?>

<?php
	//creates cart (if needed)
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}
	//Appends with item quantity for better alignment on cart display
	$quantitySpacing = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
?>
<main>
    <h1>Cart</h1>

    <div class="row">
        <div class="col-xl">
            <table>
                <tr>
                    <th>Product Image</th>
                    <th>Name</th>
                    <th>Price</th>
					<th>Quantity</th>
                </tr>
				<!--Displays items in the session cart, if the cart isn't empty-->
                <?php if(!empty($_SESSION['cart'])):
                    foreach ($_SESSION['cart'] as $item) : ?>
                        <tr>
                            <td class="picture"><img src=<?php echo "../".$item['imageLocation']; ?> alt="Product Image" max-width="500px"  width="40%"; height="auto"></td>
                            <td><?php echo $item['productName']; ?></td>
                            <td><?php echo "$".$item['price']; ?></td>
                            <td><?php echo $quantitySpacing.$item['quantity']; ?></td>
                            <td>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="action"
                                        value="remove">
                                    <input type="hidden" name="productID"
                                        value="<?php echo $item['productID']; ?>">
                                    <input type="submit" value="Remove">
                                </form>
                            </td>
                        </tr>
                    <?php 
                    endforeach; 
                endif; 
                ?>
				<tr>
					<td>
						<!--Calls to function to display the total of the items in the cart-->
						<?php echo "<h6>Total including tax (7%): $".getTotal()."</h6>"; ?>
						<!--Only shows checkout button if the cart isn't empty-->
						<?php if(!empty($_SESSION['cart'])): ?>
							<form action="cart.php" method="post">
								<input type="hidden" name="action" value="placeOrder">
								<input type="submit" value="Place Order">
							</form>
						<?php endif;?>
					</td>
				</tr>
            </table>
        </div>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>