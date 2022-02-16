<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>

<main>
    <h1>Product Inventory</h1>

    <div class="row">
        <div class="col-sm-3">
        <!-- lists all categories -->
            <h2>Categories</h2>
            <nav>
                <ul>
                    <?php foreach ($categories as $category) : ?>
                        <li>
                            <a href="?categoryID=<?php echo $category['categoryID']; ?>">
                                <?php echo $category['categoryName']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
        <div class="col-sm">
            <!-- displays all products -->
            <h2><?php echo $categoryName; ?></h2>
            <table>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td class="picture"><img src=<?php echo "../".$product['imageLocation']; ?> alt="Product Image" max-width="500px" width="35%"; height="auto"></td>
                        <td><?php echo $product['productName']; ?></td>
                        <td><?php echo "$".$product['price']; ?></td>
                        <td>
                            <form action="products.php" method="post">
                                <input type="hidden" name="action"
                                    value="addToCart">
                                <input type="hidden" name="productID"
                                    value="<?php echo $product['productID']; ?>">
                                <input type="hidden" name="productName"
                                    value="<?php echo $product['productName']; ?>">
                                <input type="hidden" name="price"
                                    value="<?php echo $product['price']; ?>">
                                <input type="hidden" name="imageLocation"
                                    value="<?php echo $product['imageLocation']; ?>">
                                <input type="submit" value="Add">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>

<!--Includes the defined footer-->
<?php include '../view/footer.php'; ?>