<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>
<?php require_once('../model/productFunctions.php'); ?>

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
                            <a href="?categoryID=<?php echo $category['catID']; ?>">
                                <?php echo $category['catName']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
        <div class="col-sm">
            <form action="products.php" method="post">
                <b>Find Product:</b><br/>
                <input type="hidden" name="action" value="search">
                <input name="searchTerm" type="text" size="40">
                <input type="submit" name="submit" value="Search">
            </form>
            <!-- displays all products -->
            <h2><?php echo $categoryName; ?></h2>
            <table>
                <tr>
                    <th>Product Image</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td class="picture"><img src=<?php echo "../".$product['imageLoc']; ?> alt="Product Image" max-width="500px" width="35%"; height="auto"></td>
                        <td><?php echo $product['prodName']; ?></td>
                        <td><?php echo "$".$product['price']; ?></td>
                        <td>
                            <form action="products.php" method="post">
                                <input type="hidden" name="action"
                                    value="addToCart">
                                <input type="hidden" name="productID"
                                    value="<?php echo $product['prodID']; ?>">
                                <input type="hidden" name="productName"
                                    value="<?php echo $product['prodName']; ?>">
                                <input type="hidden" name="price"
                                    value="<?php echo $product['price']; ?>">
                                <input type="hidden" name="productStock"
                                    value="<?php echo $product['stock']; ?>">
                                <input type="hidden" name="imageLocation"
                                    value="<?php echo $product['imageLoc']; ?>">
                                <?php //Checks if the product still has available stock
                                    if(checkStock($product)){
                                       echo "<input type=\"submit\" value=\"Add\">";
                                    }
                                    else{
                                        echo "<button type=\"button\" disabled>Out of Stock</button>";
                                    }
                                ?>
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