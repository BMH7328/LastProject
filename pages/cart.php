<?php

$database = connectToDB();

// get the cart from the database based on the current logged in user
$sql = 
      "SELECT 
        cart.*,
        products.name,
        products.price 
    FROM cart
    JOIN products
    ON cart.product_id = products.id
    WHERE user_id = :user_id AND order_id IS NULL";
    $query = $database->prepare($sql);
    $query->execute([
        'user_id' => $_SESSION['user']['id']
    ]);

    $products_in_cart = $query->fetchAll();

$total_in_cart = 0;


if ( !isUserLoggedIn() ) {
  header("Location: /login");
  exit;
}

require "parts/header.php";
require "parts/navbar.php";

?>
<style>
#cart{
  background:url(../images/rog1bg1.jpg);
  height: 100vh;
  background-size:cover;
  padding-top: 150px;

  }

</style>
<div id="cart">
  <div class="container mb-2 mx-auto" style="max-width: 900px">
      <div class="min-vh-100">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="h1 text-white"><?php echo $_SESSION['user']['name'] ?>'s cart</h1>
        </div>

        <!-- List of products user added to cart -->
        <table
          class="table table-hover table-bordered table-striped table-dark border-white"
        >
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if ( empty( $products_in_cart ) ) : ?>
                        <tr>
                            <td colspan="5">Your cart is empty.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach( $products_in_cart as $product ) : 
                            // get the total price of the product
                            $product_total =  $product['price'] * $product['quantity'];
                            // add the total price to the total in cart
                            $total_in_cart += $product_total;
                            ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td>$<?php echo $product['price']; ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td>$<?php echo $product_total; ?></td>
                                <td>
                                    <form
                                        method="POST"
                                        action="cart/remove"
                                        >
                                        <input 
                                            type="hidden"
                                            name="cart_id"
                                            value="<?php echo $product['id']; ?>"
                                            />
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="text-end">Total</td>
                            <td>RM<?php echo $total_in_cart; ?></td>
                            <td></td>
                        </tr>
                    <?php endif; // end - empty( $products_in_cart ) ?>
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-between align-items-center my-3">
                    <a href="/product" class="btn btn-light btn-sm">Continue Shopping</a>
                    <!-- if there is product in cart, then only display the checkout button -->
                    <?php if ( !empty( $products_in_cart ) ) : ?>
                        <form
                            method="POST"
                            action="cart/checkout"
                            >
                            <input type="hidden" name="total_amount" value="<?php echo $total_in_cart; ?>" />
                            <button type="submit" class="btn btn-primary">Checkout</a>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
      </div>
    </div>
<?php 

require "parts/footer.php" 

?>
