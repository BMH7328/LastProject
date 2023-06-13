<?php

require "parts/header.php";

?>
<style>
#signup{
  background:url(../images/rogbg1.jpg);
  height: 100vh;
  background-size:cover;
  }

#signup .card {
    width: 700px;
}

#btnstyle{
    color:red;
}
</style>

<div id="signup" class="d-flex justify-content-center align-items-center">
    <div class="card rounded shadow-sm mx-auto">
        <div class="card-body">
            <h3 class="card-title mb-3">Sign up for a new account</h3>
            <?php require "parts/error.php";?>
            <form action="auth/signup" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <span></span>
                <span></span>
                <div class="d-grid">
                    <button type="submit" id="btnstyle" class="btn btn-dark btn-fu">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
  <?php

  require "parts/footer.php";