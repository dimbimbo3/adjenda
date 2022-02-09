<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>
<?php require_once('../model/custFunctions.php'); ?>

<main>
    <h1>Account Settings</h1>

    <!--Displays account options-->
    <div class="row">
        <div class="col-sm-3">
            <h2>Options</h2>
            <nav>
                <ul>
                    <li>
                        <form action="account.php" method="post">
                            <input type="hidden" name="action" value="showChangeInfo">
                            <input type="submit" name="submit" id="option" value="Change Information">
                        </form>
                    </li>
                    <li>
                        <form action="account.php" method="post">
                            <input type="hidden" name="action" value="showChangePass">
                            <input type="submit" name="submit" id="option" value="Change Password">
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- displays all of the customer's orders -->
        <div class="col-sm">
            <h1>Order History</h1>
            <table>
                <tr>
                    <th>Order Date</th>
                    <th>Order Total</th>
                </tr>
                <!--Displays order dates & totals from the database, if there are any-->
                <?php if(!empty($orders)) :
                    foreach ($orders as $order) : ?>
                        <tr>
                            <td><?php echo $order['ordDate']; ?></td>
                            <td><?php echo "$".$order['ordTotal']; ?></td>
                            <td>
                                <form action="account.php" method="post">
                                    <input type="hidden" name="action" value="viewDetails">
                                    <input type="hidden" name="orderID" value="<?php echo $order['ordID']; ?>">
                                    <input type="submit" value="View Order Details">
                                </form>
                            </td>
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