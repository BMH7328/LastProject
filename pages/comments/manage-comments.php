<?php

if ( !isAdmin() ) {
    header("Location: /");
    exit;
}

$database = connectToDB();

  // get all the users
  $sql = "SELECT
          comments.*,
          users.name,
          products.name AS name1
          FROM comments
          JOIN users
          ON comments.user_id = users.id 
          JOIN products
          ON comments.product_id = products.id";

  $query = $database->prepare($sql);
  $query->execute();

  // fetch the data from query
  $comments= $query->fetchAll();

  require "parts/header.php";
  require "parts/navbar.php";
?>
<style>
  #comment{
  background:url(../images/rog1bg3.jpg);
  height: 150vh;
  background-size:cover;
  }

    #btnstyle{
        color:#FFFFFF;
    }

</style>
  <div id="comment" class="d-flex justify-content-center align-items-center">
    <div class="container mx-auto" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1 text-white">Manage Comments</h1>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/success.php"; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Product Name</th>
              <th scope="col">Comments</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
          <!-- display out all the users using foreach -->
             <?php 
             foreach ($comments as $comment) : 
             ?>
              <tr>
              <th scope="row"><?= $comment['id']; ?></th>
              <td><?= $comment['name']; ?></td>
              <td><?= $comment['name1']; ?></td>
              <td><?= $comment['comment']; ?></td>
              <td class="text-end">
                <div class="buttons">
                 <!-- Button trigger modal -->
                 <button type="button" id="btnstyle" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-modal-<?= $comment['id']; ?>" id="btnstyle">
                    <i class="bi bi-trash"></i>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="delete-modal-<?= $comment['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete <?= $comment['name1']; ?> 's comment? </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          You're currently deleting <?= $comment['name']; ?> comment
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                          <!-- 
                            Delete Form 
                            1. add action
                            2. add method
                            3. add input hidden field for id
                          -->
                          <form method ="POST" action ="comments/delete">
                            <input type="hidden" name="id"  value="<?= $comment['id']; ?>"/>
                            <button type="submit" id="btnstyle" class="btn btn-danger">Yes, please delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php endforeach ; ?>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="/manage" class="btn btn-dark btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Manage</a
        >
      </div>
    </div>
  </div>

<?php
  require "parts/footer.php";
  ?>