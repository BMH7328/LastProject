<?php
//make sure there is an id query string in the url
if ( isset( $_GET['id'] ) ) {

  $database = connectToDB();

  //make sure post is publish
  $sql = "SELECT * FROM products WHERE id = :id AND status = 'publish'";
  $query = $database->prepare( $sql );
  $query->execute([
    'id' => $_GET['id']
  ]);

  // fetch
  $product = $query->fetch();

  if ( !$product ) {
    // if post don't exists, then we redirect back to 
    header("Location: /manage-product");
    exit;
}

} else {
  // if $_GET['id'] is not available, then redirect the user back to home
  header("Location: /");
  exit;
}

require "parts/header.php";
require "parts/navbar.php";

?>
<style>
#post{
  background:url(../images/rog1bg2.jpg);
  height: 150vh;
  background-size:cover;
  }
</style>

<div id ="post">
    <div class="container " style="max-width: 2000px;">
        <div class = "row">
            <div class ="col-lg-6">
            <h1 class="h1 mb-2 mt-4 text-center "><?= $product['name']; ?></h1>
                <img
                    src="<?= $product['image_url']; ?>"
                    class="card-img-top"
                    alt="product <?= $product['id']; ?>"
                    style="height: 700px;"
                />
                <?php if ( isUserLoggedIn() ) : ?>
                  <form method="POST" action="cart">
                    <input 
                      type="hidden"
                      name="product_id"
                      value="<?php echo $product['id']; ?>"
                    >
                  <div class="d-grid">
                    <button type="submit" id="btnstyle" class="btn btn-dark ">Add to Cart</button>
                  </div>
                </form>
                <?php endif ; ?>
              </div>
      <div class ="col-lg-6">
        <div class="mt-3">
            <h4 class="text-dark">Comments</h4>
            <?php
                // load the comments from database
                $sql = "SELECT
                    comments.*,
                    users.name
                    FROM comments
                    JOIN users
                    ON comments.user_id = users.id
                    WHERE product_id = :product_id ORDER BY id DESC LIMIT 3";
                $query = $database->prepare($sql);
                $query->execute([
                    "product_id" => $product["id"]
                ]);

                $comments = $query->fetchAll();

                foreach ($comments as $comment) :
            ?>
            <div class="card mt-2">
                <div class="card-body">
                  <p class="card-text"><?= $comment['comment']; ?></p>
                  <p class="card-text"><small class="text-muted">Commented By <?= $comment['name']; ?></small></p>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if ( isUserLoggedIn() ) { ?>
            <form
                action="comments/add"
                method="POST"    
                >
                <div class="mt-3">
                    <label for="comment" class="form-label">Enter your comment below:</label>
                    <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                </div>
                <input type="hidden" name="product_id" value="<?= $product['id']; ?>" />
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id']; ?>" />
                <button type="submit" class="btn btn-dark mt-2">Submit</button>
            </form>
            <?php }else{ ?>
              <div class ="my-5">
              <h3>Please Login to Comment This Product Unelse BYEEE</h3>
                <?php }?>
            </div>
        </div>
    </div>
</div>
      <div class="text-center mt-3">
        <a href="/" class="btn btn-link btn-sm">
          <i class="bi bi-arrow-left"></i> Back</a>
      </div>
    </div>
</div>
<?php

require "parts/footer.php";

?>