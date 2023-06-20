<?php

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
          <tbody class="table-group-divider">
            <?php if ( empty( $cart ) ) : ?>
              <tr>
                <td colspan="5">Your cart is empty.</td>
              </tr>
            <?php else : ?>
              <?php foreach( $cart  as $product ) : ?>
                <tr>
                  <td><?php echo $product['name']; ?></td>
                  <td>$ <?php echo $product['price']; ?></td>
                  <td><?php echo $product['quantity']; ?></td>
                  <td>$ <?php echo $product['total']; ?></td>
                  <td>
                    <form
                      method="POST"
                      action=“”
                    >
                      <input 
                        type="hidden" 
                        name="action" 
                        value="remove" 
                      />
                      <input 
                        type="hidden"
                        name="product_id"
                        value="<?php echo $product['id']; ?>"
                      />
                      <button class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                  <td colspan="3" class="text-end">Total</td>
                  <td colspan="2">$ <?php echo $cart['total']; ?></td>
                </tr>
            <?php endif; ?>
          </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center my-3">
          <a href="/home" class="btn btn-dark btn-sm"
            >Continue Shopping</a
          >
          <?php if ( !empty( $cart ) ) : ?>
            <form 
              method="POST"
              action="/payment"
            >
              <button class="btn btn-light">Payment</a>
            </form>
          </div>
            <?php endif; ?>
        </div>
      </div>
    </div>
<?php 

require "parts/footer.php" 

?>
