<?php 

$database = connectToDB();

    $sql = 'SELECT * FROM users';
    $query = $database->prepare($sql);
    $query->execute();
    $user = $query->fetchAll();

    require "parts/header.php";
    require "parts/navbar.php";
?>
<style>
#explore {
 background:#ffffff;
 padding-top: 30px;
 padding-bottom : 30px;
}

</style>
<div id="home">
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/rogallyhome.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/roghome2.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/roghome3.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/roghome4.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/roghome5.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/roghome6.webp" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>
  <div id ="explore">
    <div class="container mt-5">
      <h2 class="d-flex text-align-center justify-content-center">Explore More Products</h2>
      <div class="d-flex text-align-center justify-content-center">       
          <div class="row">
            <div class="col-md-3">
              <div class="card border-0">
               <div class="card-body">
                  <img src="../images/producthome3.png">
                  <a href="#" class="btn btn-primary d-flex justify-content-center align-items-center">Laptops</a>
                </div>
              </div>
             </div>
             <div class="col-md-3">
              <div class="card border-0">
               <div class="card-body">
                  <img src="../images/producthome2.png">
                  <a href="#" class="btn btn-primary d-flex justify-content-center align-items-center">Graphic Cards</a>
                </div>
              </div>
             </div>
             <div class="col-md-3">
              <div class="card border-0">
               <div class="card-body">
                  <img src="../images/producthome1.png">
                  <a href="#" class="btn btn-primary d-flex justify-content-center align-items-center">Phones</a>
                </div>
              </div>
             </div>
             <div class="col-md-3">
              <div class="card border-0">
               <div class="card-body">
                  <img src="../images/producthome.png">
                  <a href="#" class="btn btn-primary d-flex justify-content-center align-items-center">Gaming Handhelds</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

require "parts/footer.php";

?>