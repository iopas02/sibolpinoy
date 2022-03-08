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
            <li><button class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#editProfile">Account</button></li>
            <hr>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <!--THIS IS FOR SEARCH BAR AND USER ICON END-->

  </div>
</nav>

<!--THIS IS FOR MODAL Edit Profile start-->
<div class="modal" id="editProfile" data-bs-backdrop="static"  tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row col-md-12">
                        <div class="col-md-6 mb-1">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp" placeholder="eg. Juana" required>          
                        </div>
                        <div class="col-md-6 mb-1">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="emailHelp" placeholder="eg. Dela Cruz" required>              
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-8 mb-1">
                            <label for="email" class="form-label">Username</label>
                            <input type="email" class="form-control" id="email" name="email"  aria-describedby="emailHelp" placeholder="eg. juanaDelaCruz" required>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" aria-label="Default select example" id="level" name="level" required>
                                <option selected>Select Level</option>
                                <option value="0">Admin</option>
                                <option value="1">Super Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6 mb-1">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="XXXXXXXXXX" required> 
                        </div>
                        <div class="col-md-6 mb-1">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="XXXXXXXXXX" required>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success mt-2" name="new_admin">Edit Admin</button>
                        <button type="button" class="btn btn-dark mt-3" data-bs-dismiss="modal">Close</button>
                    </div>  
                </form>       
            </div> 
        </div>
    </div>
</div>
<!--THIS IS FOR MODAL Edit Profile END-->