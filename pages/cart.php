<?php

require "parts/header.php";
require "parts/navbar.php";

?>

<h1>Cart Page</h1>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $product_id => $quantity): ?>
        <tr>
            <td>Product <?php echo $product_id; ?></td>
            <td><?php echo $quantity; ?></td>
            <td>
                <a href="remove.php">Remove</a>
                <a href="update.php?product_id=<?php echo $product_id; ?>">Update Quantity</ a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

<?php

require "parts/footer.php";

?>