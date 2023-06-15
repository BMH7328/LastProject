<?php

if ( !isUserLoggedIn() ) {
  header("Location: /login");
  exit;
}


require "parts/header.php";
require "parts/navbar.php";

?>
<style>


</style>
<div class="container mt-5 mb-2 mx-auto" style="max-width: 900px">
      <div class="min-vh-100">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="h1 text-white"><?php echo $_SESSION['user']['name'] ?>'s Cart</h1>
        </div>
        <table
          class="table table-hover table-bordered table-dark border-white"
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
            <?php if ( empty($cart) ) {?>
              <tr>
                <td colspan="5">Your cart is empty.</td>
              </tr>
            <?php }else { ?>
              
            <?php endif } ?>
          </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center my-3">
          <a href="/product" class="btn btn-secondary btn-sm"
            >Continue Shopping</a
          >
          <?php if ( !empty( $cart) ) { ?>
            <form 
              method="POST"
              action="/payment"
            >
              <button class="btn btn-light">Payment</a>
            </form>
          </div>
            <?php endif }?>
        </div>
      </div>

<?php

require "parts/footer.php";

?>