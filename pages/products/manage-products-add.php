<?php

// check if the current user is an admin or not
if ( !isAdminOrEditor() ) {
  // if current user is not an admin, redirect to dashboard
  header("Location: /");
  exit;
}

  require "parts/header.php";
  require "parts/navbar.php";
?>

<style>
#addu{
  background:url(../images/rogstrixbg.jpg);
  height: 150vh;
  background-size:cover;
  }
</style>

<div id="addu" class="d-flex justify-content-center align-items-center">
  <div class="container mx-auto" style="max-width: 1000px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1 text-white">Add New Product</h1>
      </div>
      <div class="card mb-2 p-4">
        <form
          method="POST"
          action="product/add"
          >
          <?php require "parts/error.php";?>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Insert product name" />
              </div>
              <div class="col">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Insert product price" />
              </div>
            </div>
          </div>
          <div class ="mb-3">
            <div class="row">
              <div class="col">
                <label for="image_url" class="form-label">Image_URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Insert product image" />
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="processor" class="form-label">Processor</label>
                <input type="text" class="form-control" id="processor" name="processor" placeholder="Insert product processor" />
              </div>
              <div class="col">
                <label for="graphic_card" class="form-label">Graphic Card</label>
                <input type="text" class="form-control" id="graphic_card" name="graphic_card" placeholder="Insert product graphic card" />
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="windows" class="form-label">Windows</label>
                <input type="text" class="form-control" id="windows" name="windows" placeholder="Insert product windows" />
              </div>
              <div class="col">
                <label for="screen" class="form-label">Screen</label>
                <input type="text" class="form-control" id="screen" name="screen" placeholder="Insert product screen"/>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="rom" class="form-label">Rom</label>
                <input type="text" class="form-control" id="rom" name="rom" placeholder="Insert product rom" />
              </div>
              <div class="col">
                <label for="ram" class="form-label">Ram</label>
                <input type="text" class="form-control" id="ram" name="ram" placeholder="Insert product ram"/>
              </div>
            </div>
          </div>
          <div class ="mb-3">
            <div class="row">
              <div class="col">
                <label for="wifi" class="form-label">Wi-Fi</label>
                <input type="text" class="form-control" id="wifi" name="wifi" placeholder="Insert product wifi"/>
              </div>
            </div>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-dark ">Add</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-products" class="btn btn-dark btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Products</a
        >
      </div>
    </div>
</div>

<?php
  require "parts/footer.php";
  ?>