<?php

if ( !isAdminOrEditor() ) {
    header("Location: /");
    exit;
}

$database = connectToDB();

  // get all the users
  $sql = "SELECT * FROM contact";
  $query = $database->prepare($sql);
  $query->execute();

  // fetch the data from query
  $contact= $query->fetchAll();

  require "parts/header.php";
  require "parts/navbar.php";
?>

<style>

#contact{
  background:url(../images/rog1bg4.jpg);
  height: 150vh;
  background-size:cover;
  }
    #btnstyle{
        color:#FFFFFF;
    }

</style>
  <div id="contact" class="d-flex justify-content-center align-items-center"> 
    <div class="container mx-auto" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1 text-white">Manage Contact List</h1>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/success.php"; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Message</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
          <!-- display out all the users using foreach -->
             <?php foreach ($contact as $contact) { ?>
              <tr>
              <th scope="row"><?= $contact['id']; ?></th>
              <td><?= $contact['name']; ?></td>
              <td><?= $contact['email']; ?></td>
              <td><?= $contact['message']; ?></td>
              <td class="text-end">
                <div class="buttons">
                 <!-- Button trigger modal -->
                 <button type="button" id="btnstyle" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-modal-<?= $contact['id']; ?>" id="btnstyle">
                    <i class="bi bi-trash"></i>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="delete-modal-<?= $contact['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this message which leave by <?= $comment['name']; ?>?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          You're currently deleting <?= $comment['name']; ?> message
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <!-- 
                            Delete Form 
                            1. add action
                            2. add method
                            3. add input hidden field for id
                          -->
                          <form method ="POST" action ="comments/delete">
                            <input type="hidden" name="id"  value="<?= $contact['id']; ?>"/>
                            <button type="submit" class="btn btn-danger">Yes, please delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php } ?>
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