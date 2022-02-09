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
    <h1>Order List</h1>
        <div class="col-sm">
            <!-- displays all orders -->
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Order Total</th>
                    <th>Customer Email</th>
                </tr>
                <!--Displays orders from the database, if there are any-->
                <?php if(!empty($orders)) :
                    foreach ($orders as $order) : ?>
                        <tr>
                            <td><?php echo $order['ordID']; ?></td>
                            <td><?php echo $order['ordDate']; ?></td>
                            <td><?php echo "$".$order['ordTotal']; ?></td>
                            <td><?php echo $order['customerEmail']; ?></td>
                            <!-- displays option to remove order if CEO is logged in -->
                            <?php if($_SESSION['email'] == "fdecker@gmail.com"): ?>
                                <td>
                                    <form action="ordersTable.php" method="post">
                                        <input type="hidden" name="action" value="removeOrder">
                                        <input type="hidden" name="ordID" value="<?php echo $order['ordID']; ?>">
                                        <input type="submit" value="Remove order">
                                    </form>
                                </td>
                            <?php endif;?>
                        </tr>
                    <?php
                    endforeach;
                endif;
                ?>
            </table>
        </div>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>