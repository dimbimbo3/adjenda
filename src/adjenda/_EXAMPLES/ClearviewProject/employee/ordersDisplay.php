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
    <h1>Order List</h1>
        <div class="col-sm">
            <!-- displays all orders -->
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Order Total</th>
                    <th>Customer Name</th>
                    <th>Customer Address</th>
                    <th>Customer ZIP Code</th>
                </tr>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['orderID']; ?></td>
                        <td><?php echo $order['orderDate']; ?></td>
						<td><?php echo $order['orderTotal']; ?></td>
                        <td><?php echo $order['custName']; ?></td>
                        <td><?php echo $order['custAddress']; ?></td>
						<td><?php echo $order['custZip']; ?></td>
						<!-- displays option to remove order if CEO is logged in -->
						<?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
							<td>
								<form action="ordersTable.php" method="post">
									<input type="hidden" name="action" value="removeOrder">
									<input type="hidden" name="orderID"
										value="<?php echo $order['orderID']; ?>">
									<input type="submit" value="Remove">
								</form>
							</td>
						<?php endif;?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>