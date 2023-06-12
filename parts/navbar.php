<style>
.nav-link{
  color:#FF0000;
}

.btn{
  color:#FF0000;
}

.user{
  color:#FFFFFF;
}
</style>     
    <div class="bg-overlay h-100">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <img
              src="images/roglogo.jpg"
              width="300px"
            />
            </a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
              <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="collapse navbar-collapse"
                id="navbarSupportedContent"
              >
              <ul class="nav nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" 
                    href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" 
                    href="/product">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" 
                    href="/comment">Comments</a>
  </li>

                <?php if ( isAdminOrEditor() ) { ?>
                  <li class="nav-item dropdown">
                    
                    <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Manage</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/product">Manage Products</a></li>
                    <li><a class="dropdown-item" href="/manage-users">Manage Users</a></li>
                    </ul>
                  </li>
                    <?php }else {?>

                    <?php } ?>
                </ul>
                    
                    <a 
                        href="/contact"
                        class="btn btn-outline-light border-0">Contact Us</a> 
                    <a
                        href="/cart"
                        class="btn btn-outline-light border-0">Cart</a>
                <?php if ( isUserLoggedIn() ) { ?>
                    <a 
                        href="/logout"
                        class="btn btn-outline-light border-0">LogOut</a>
                <?php } else { ?>
                    <a 
                        href="/login"
                        class="btn btn-outline-light border-0">Login</a>
                    <a 
                        href="/signup"
                        class="btn btn-outline-light border-0">Sign Up</a>
                <?php } ?>
                
                
              </div>
            </div>
          </nav>


          