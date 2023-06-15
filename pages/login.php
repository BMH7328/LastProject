<?php
    require "parts/header.php";
?>

<style>
#login{
  background:url(../images/rogbg1.jpg);
  height: 100vh;
  background-size:cover;
  }

#login .card {
  width: 700px;
}

#btnstyle{
    color:#FF0000;
}

</style>
<div id="login" class="d-flex justify-content-center align-items-center">
    <div class="card rounded shadow-sm mx-auto my-4">
        <div class="card-body">
            <h3 class="card-title mb-3">Login to your account</h3>
            <?php require "parts/error.php";?>
              
            <form action="auth/login" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="d-grid">
                    <button type="submit" id="btnstyle" class="btn btn-dark btn-fu">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
  <?php

  require "parts/footer.php";