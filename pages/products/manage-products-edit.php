<?php

if ( !isAdminOrEditor() ) {
    // if current user is not an admin, redirect to dashboard
    header("Location: /");
    exit;
  }

  if ( isset( $_GET['id'] ) ) {
    // load database
    $database = connectToDB();

    // load the user data based on the id
    $sql = "SELECT * FROM products WHERE id = :id";
    $query = $database->prepare( $sql );
    $query->execute([
      'id' => $_GET['id']
    ]);

    // fetch
    $product = $query->fetch();

    if ( !$product ) {
        // if post don't exists, then we redirect back to manage-posts
        header("Location: /manage-products");
        exit;
      }
    
    } else {
      // if $_GET['id'] is not available, then redirect the user back to manage-users
      header("Location: /manage-products");
      exit;
    }

    require "parts/header.php";
    require "parts/navbar.php";
?>

<div class="container mx-auto" style="max-width: 1000px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Product</h1>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/error.php";?>
        <form method="POST" action="product/edit">
          <div class="mb-3">
          <div class="row">
              <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $product['name']; ?>" />
              </div>
              <div class="col">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= $product['price']; ?>" />
              </div>
            </div>
          </div>
          <div class ="mb-3">
            <div class="row">
              <div class="col">
                <label for="image_url" class="form-label">Image_URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="<?= $product['image_url']; ?>" />
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="processor" class="form-label">Processor</label>
                <input type="text" class="form-control" id="processor" name="processor" value="<?= $product['processor']; ?>" />
              </div>
              <div class="col">
                <label for="graphic_card" class="form-label">Graphic Card</label>
                <input type="text" class="form-control" id="graphic_card" name="graphic_card" value="<?= $product['graphic_card']; ?>" />
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="windows" class="form-label">Windows</label>
                <input type="text" class="form-control" id="windows" name="windows" value="<?= $product['windows']; ?>" />
              </div>
              <div class="col">
                <label for="screen" class="form-label">Screen</label>
                <input type="text" class="form-control" id="screen" name="screen" value="<?= $product['screen']; ?>" />
              </div>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="rom" class="form-label">Rom</label>
                <input type="text" class="form-control" id="rom" name="rom" value="<?= $product['rom']; ?>" />
              </div>
              <div class="col">
                <label for="ram" class="form-label">Ram</label>
                <input type="text" class="form-control" id="ram" name="ram" value="<?= $product['ram']; ?>"/>
              </div>
            </div>
          </div>
          <div class ="mb-3">
            <div class="row">
              <div class="col">
                <label for="wifi" class="form-label">Wi-Fi</label>
                <input type="text" class="form-control" id="wifi" name="wifi" value="<?= $product['wifi']; ?>" />
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="product-status" class="form-label">Status</label>
            <select class="form-control" id="product-status" name="status">
              <option value="pending" <?= $product['status'] === 'pending' ? 'selected' : ''?>>Pending</option>
              <option value="publish" <?= $product['status'] === 'publish' ? 'selected' : ''?>>Publish</option>
            </select>
          </div>
          <div class="text-end">
          <input type="hidden" name="id" value="<?= $product['id']; ?>" />
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-products" class="btn btn-dark btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>
<?php

require "parts/footer.php";
