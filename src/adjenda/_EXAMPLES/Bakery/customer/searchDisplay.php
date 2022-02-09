<!--Includes the defined header-->
<?php include '../view/custHeader.php'; ?>
<?php require_once('../model/productFunctions.php'); ?>

<main>
    <h1>Product Inventory</h1>

    <div class="row">
        <div class="col-sm">
            <!-- displays found products -->
            <h2><?php echo "Results for '$searchTerm'"; ?></h2>
            <table>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                <?php foreach ($searchResults as $searchResult) : ?>
                    <tr>
                        <td class="picture"><img src=<?php echo "../".$searchResult['imageLoc']; ?> alt="Product Image" max-width="500px" width="35%"; height="auto"></td>
                        <td><?php echo $searchResult['prodName']; ?></td>
                        <td><?php echo "$".$searchResult['price']; ?></td>
                        <td>
                            <form action="products.php" method="post">
                                <input type="hidden" name="action"
                                    value="addToCart">
                                <input type="hidden" name="productID"
                                    value="<?php echo $searchResult['prodID']; ?>">
                                <input type="hidden" name="productName"
                                    value="<?php echo $searchResult['prodName']; ?>">
                                <input type="hidden" name="price"
                                    value="<?php echo $searchResult['price']; ?>">
                                <input type="hidden" name="productStock"
                                    value="<?php echo $searchResult['stock']; ?>">
                                <input type="hidden" name="imageLocation"
                                    value="<?php echo $searchResult['imageLoc']; ?>">
                                <?php //Checks if the product still has available stock
                                    if(checkStock($searchResult)){
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