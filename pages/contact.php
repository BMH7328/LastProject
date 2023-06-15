<?php 

     require "parts/header.php";
     require "parts/navbar.php";
?>

<style>
#contact{
  background:url(../images/rogbg3.jpg);
  height: 100vh;
  background-size:cover;
  padding-top: 100px;
  }


</style>

<div id="contact">
    <div class="container">
        <div class="min-vh-100">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center pb-2">Contact Us</h5>

                    <?php if (isset($_SESSION['error'])):?>

                        <div class="alert alert-danger" role="alert">

                    <?php
                        echo $_SESSION['error'];

                        unset( $_SESSION['error']);
                    ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success'])):?>

                        <div class="alert alert-success" role="alert">

                    <?php
                        echo $_SESSION['success'];

                        unset( $_SESSION['success']);
                    ?>
                        </div>
                    <?php endif; ?>

                    <form
                        action="contact/add"
                        method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea
                                class="form-control"
                                id="message"
                                name="message"
                                rows="3"
                                placeholder="Enter your message"
                            ></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
            <a href="/" class="btn btn-dark btn-sm">
            <i class="bi bi-arrow-left"></i> Back</a>
        </div>
        </div>
    </div> 
</div>

<?php

require "parts/footer.php"

?>