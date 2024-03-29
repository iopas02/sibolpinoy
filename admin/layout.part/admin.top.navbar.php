<?php
  require "../connection.php";
  $username = $firstName = $lastName = $level = $readonly = "";
  if(isset($_SESSION["username"]) && isset($_SESSION["level"])){
    $level = $_SESSION["level"];
    $musername = $_SESSION["username"];
    if($level == "0"){
      $readonly = "readonly";
    }
    $sql = "SELECT login.loginId, profile.firstName, profile.lastName, login.username, login.level FROM login INNER JOIN profile ON 
                login.loginId = profile.loginId WHERE login.username = '$musername'";
    if($result = $conn->query($sql)){
      if($result->num_rows == 1){
        if($row = $result->fetch_assoc()){
          $id = $row["loginId"];
          $firstName = $row["firstName"];
          $lastName = $row["lastName"];
          $rusername = $row["username"];
          $level = $row["level"];
        }
      }
    }

  }
?>
<nav class="navbar navbar-expand-lg navbar-dark px-3 fixed-top bg-coloured">
  <div class="container-fluid">
   
    <div class="">

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>

      <img class="__logo" src="../img/logo.png" alt=""><a class="logo-font" href="#">Sibol-PINOY</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>

    <!--THIS IS FOR SEARCH BAR AND USER ICON START-->
    
    <div class="collapse navbar-collapse justify-content-md-end" id="topNavBar">

      <div class="btn-group border-0 dropstart">

        <button type="button" class="btn text-white dropdown-toggle border-0" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle"></i> <span> <?= $rusername ?> </span>
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
<div class="modal" id="editProfile" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="comptroller/user-edit.php" method="POST">
            <div class="row col-md-12">
                <div class="col-md-6 mb-1">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="firstName" aria-describedby="emailHelp" value="<?= $firstName?>">          
                </div>
                <div class="col-md-6 mb-1">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="lastName" aria-describedby="emailHelp" value="<?= $lastName?>">              
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-8 mb-1">
                    <label for="email" class="form-label">Username</label>
                    <input type="text" class="form-control" id="email" name="username"  aria-describedby="emailHelp" value="<?= $rusername?>" readonly>
                </div>
                <div class="col-md-4 mb-1">
                    <label for="email" class="form-label">Level</label>
                    <input type="text" class="form-control" id="email"  aria-describedby="emailHelp" value="<?= levelCheck($level)?>" readonly>
                    <input type="text" class="form-control" name="action" value="Update info" hidden>
                </div>
            </div>
            <div class="row py-3 col-md-12">
              <hr class="dropdown-divider bg-dark" />
              <div class="col-md-4">
                  <button type="button" class="p-1 rounded bg-coloured text-white" data-bs-toggle="modal" data-bs-target="#editPassword">Change password</button>
              </div>
              <div class="col-md-8 d-grid gap-1 d-md-flex justify-content-md-end">
                  <button type="submit" class="p-1 rounded bg-blue text-white" name="update">Update Info</button>    
                  <button type="button" class="p-1 rounded bg-dark text-white" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
        </form> 
      </div>  
    </div>
  </div>
</div>

<!--THIS IS FOR MODAL Edit Profile END-->

<!--THIS IS FOR MODAL Edit password start-->
<div class="modal" gdata-bs-backdrop="static" id="editPassword" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Edit password</h5>
          <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#editProfile" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="comptroller/user-edit-password.php" method="POST">
              <div class="row col-md-12">
                  <div class="col-md-6 mb-1">
                      <label for="password" class="form-label">New Password</label>
                      <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter New Password">          
                  </div>
                  <div class="col-md-6 mb-1">
                      <label for="cpassword" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" id="cpassword" name="cpassword" aria-describedby="emailHelp" placeholder="Enter Confirm Password">              
                  </div>
              </div>
      </div>
      <div class="modal-footer">
              <button type="submit" class="p-1 rounded bg-blue text-white" name="editPassword">Change Password</button>
          </form>       
          <button type="button" class="p-1 rounded bg-dark text-white" data-bs-toggle="modal" data-bs-target="#editProfile" >Close</button>
      </div>
      </div>
  </div>
</div>
<!--THIS IS FOR MODAL Edit Profile END-->