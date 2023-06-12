<?php

// check if the current user is an admin or not
if ( !isAdminOrEditor() ) {
  // if current user is not an admin, redirect to dashboard
  header("Location: /");
  exit;
}

  require "parts/header.php";
?>

<div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Add New Product</h1>
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
                <input type="text" class="form-control" id="name" name="name" />
              </div>
              <div class="col">
                <label for="email" class="form-label">Image</label>
                <input type="email" class="form-control" id="email" name="email" />
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
            <div class="col">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" />
                    </div>
                </div>
            </div>
          <div class="mb-3">
            <div class="row">
            <div class="col">
                <label for="spec" class="form-label">Specifications</label>
                <input type="text" class="form-control" id="spec" name="spec" />
              </div>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-users" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Users</a
        >
      </div>
    </div>

<?php
  require "parts/footer.php";