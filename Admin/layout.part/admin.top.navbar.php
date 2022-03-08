<nav class="navbar navbar-expand-lg navbar-dark px-3 fixed-top bg-blue">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <div class=""></div>
          <img class="__logo" src="../img/logo.png" alt=""><a class="logo-font" href="#">Sibol-PINOY</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation" >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!--THIS IS FOR SEARCH BAR AND USER ICON START-->
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search"/>
              <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i>
              </button>
            </div>
          </form>

         
          <li class="nav-item dropdown" style="list-style: none;">
            <a class="nav-link dropdown-toggle ms-1 bg-blue" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-3x bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              <li><a class="dropdown-item" href="#">Change Password</a></li>
              
            </ul>
          </li>
          

        </div>
        <!--THIS IS FOR SEARCH BAR AND USER ICON END-->

      </div>
    </nav>