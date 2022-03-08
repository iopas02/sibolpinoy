<nav class="navbar navbar-expand-lg navbar-dark px-3 fixed-top bg-blue">
  <div class="container-fluid">
   
    <div class="col-md-11"  >
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <img class="__logo" src="../img/logo.png" alt=""><a class="logo-font" href="#">Sibol-PINOY</a>
    </div>
      
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--THIS IS FOR SEARCH BAR AND USER ICON START-->
    
    <div class="collapse navbar-collapse col-md-4" id="topNavBar">
      <div class="btn-group border-0 dropstart">
        <button type="button" class="btn text-white dropdown-toggle border-0" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle"></i> <span> <?= $username ?> </span>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Change Password</a></li>
            <hr>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <!--THIS IS FOR SEARCH BAR AND USER ICON END-->

  </div>
</nav>