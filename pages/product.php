<?php 

    $database = connectToDB();

    $sql = "SELECT * FROM products";
    $query = $database->prepare( $sql );
    $query->execute();
    $products = $query->fetchAll();

    require "parts/header.php";
    require "parts/navbar.php";
?>
<style>
    .productrog{
        color:#000000;
        text-decoration:underline;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    #Products{
        background:#FFFFFF;
    }

    #btnstyle{
        clip-path: polygon(0 0, 100% 0, 100% 50%, 100% 100%, 3% 100%, 0 60%);
        color:#FFFFFF;
    }
</style>

<div id="Products">
    <div class="container mx-auto pt-5 pb-2" style="max-width: 1400px">
        <div class="productrog">
            <h1>PRODUCTS OF ROG<h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($products as $product):?>
                <div class="col">
        <div class="card h-100 border-0">
          <img
            src="<?= $product['image_url']; ?>"
            class="card-img-top"
            alt="product <?= $product['id']; ?>"
            style="height: 420px;"
          />
          <div class="container">
            <h5 class="card-title"><?= $product['name']; ?></h5>
            <p class="card-text">RM
              <?= $product['price']; ?>
            </p>
            <ul>
                <li><?= $product['graphic_card']; ?></li>
                <li><?= $product['windows']; ?></li>
                <li><?= $product['screen']; ?></li>
                <li><?= $product['ram']; ?></li>
                <li><?= $product['rom']; ?></li>
                <li><?= $product['wifi']; ?></li>
            </ul>
          </div>
          <form method="POST" action="cart">
          <div class="d-grid">
            <button type="submit" id="btnstyle" class="btn btn-danger">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<?php

require "parts/footer.php"

?>
