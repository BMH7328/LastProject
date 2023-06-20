<?php
if ( !isAdminOrEditor() ) {
  // if current user is not an admin, redirect to dashboard
  header("Location: /");
  exit;
}


require "parts/header.php";
require "parts/navbar.php";
?>
<style>
  #manage{
  background:url(../images/rogcyberbg.jpg);
  height: 100vh;
  background-size:cover;
  }
</style>
  <div id="manage" class="d-flex justify-content-center align-items-center">
    <div class="container mx-auto" style="max-width: 800px;">
      <h1 class="h1 mb-4 text-center text-white">Manage</h1>
      <div class="row">
        <div class="col-lg-6">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center ">
                <div class="mb-1">
                  <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                </div>
                Manage Products
              </h5>
              <div class="text-center mt-3">
                <a href="/manage-products" class="btn btn-dark btn-sm"
                  >Access</a>
              </div>
            </div>
          </div>
        </div>
        <?php if (isAdmin()):?>
        <div class="col-lg-6">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-people" style="font-size: 3rem;"></i>
                </div>
                Manage Users
              </h5>
              <div class="text-center mt-3">
                <a href="/manage-users" class="btn btn-dark btn-sm"
                  >Access</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php endif;?>
      </div>
      <?php if (isAdmin()):?>
      <div class="row">
        <div class="col-lg-6">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center ">
                <div class="mb-1">
                  <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                </div>
                Manage Comments
              </h5>
              <div class="text-center mt-3">
                <a href="/manage-comments" class="btn btn-dark btn-sm"
                >Access</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-people" style="font-size: 3rem;"></i>
                </div>
                Manage Contact List
              </h5>
              <div class="text-center mt-3">
                <a href="/manage-contact" class="btn btn-dark btn-sm"
                  >Access</a>
              </div>
            </div>
          </div>
        </div>
        <?php endif;?>
      </div>
      <div class="mt-4 text-center">
        <a href="/" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back</a>
      </div>
    </div>
  </div>
</div>

    <?php
        require "parts/footer.php";
        ?>