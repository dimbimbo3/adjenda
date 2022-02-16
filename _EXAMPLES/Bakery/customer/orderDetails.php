<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>
<?php require_once('../model/productFunctions.php'); ?>

<main>
    <h1>Order Details</h1>
        <div class="col-sm">
            <form action="account.php" method="post">
                <input type="hidden" name="action" value="showOptions">
                <input type="submit" name="submit" value="Go Back">
            </form>
            <table>
                <tr>
                    <td><b><?php echo "Customer: ".$customerName ?></b></td>
                </tr>
				<tr>
                    <td><b><?php echo "Phone Number: ".$customerPhone ?></b></td>
                </tr>
				<tr>
                    <td><b><?php echo "Shipping Address: ".$customerAddress ?></b></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Product Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Overall Cost</th>
                </tr>
                <!--Displays each item from the order-->
                <?php foreach ($orderItems as $orderItem) : ?>
                    <?php $product = getProductByID($orderItem['productID']); ?>
                    <tr>
                        <td class="picture"><img src=<?php echo "../".$product['imageLoc']; ?> alt="Product Image" max-width="500px" width="35%"; height="auto"></td>
                        <td><?php echo $product['prodName']?></td>
                        <td><?php echo "x".$orderItem['quantity'] ?></td>
                        <td><?php echo "$".$orderItem['cost']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
					<td>
						<?php echo "<h6>Total including tax (7%): $".$order['ordTotal']."</h6>"; ?>
					</td>
				</tr>
            </table>
        </div>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>