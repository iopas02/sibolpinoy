<?php
$err_message = "";
if(isset($_GET["error"])){
    $error = $_GET["error"];
    if($error == "username_null"){
        $err_message = "Username field empty.";
    }
    else if($error == "password_null"){
        $err_message = "Password field empty.";
    }
    else if($error == "firstName_null"){
        $err_message = "First Name field empty.";
    }
    else if($error == "lastName_null"){
        $err_message = "Last Name field empty.";
    }
    else if($error == "level_null"){
        $err_message = "Please pick a level.";
    }
    else if($error == "status_null"){
        $err_message = "Please pick a status.";
    }
    else if($error == "passwordNotEqual"){
        $err_message = "Password not equal.";
    }
}

?>
<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Admin Inbox</title>

    <!-- top navigation bar -->
    <?php
      require "layout.part/admin.top.navbar.php";
    ?>
    <!-- top navigation bar -->


    <!-- THIS IS FOR SIDE NAV-BAR and OFF CANVA START HERE -->
    <?php
      require "layout.part/admin.side.navbar.php";
    ?>

    <!-- THIS IS FOR SIDE NAV-BAR and OFF CANVA END HERE -->

    <main class="mt-5 pt-3">
        <div class="container-fluid p-4">
            <div class="row">
            <div class="col-md-12 my-2">
                <h4 class="page-header">Admin Controller</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3 px-4">
                <form action="admin-add.php" method="POST">
                    <div class="row col-md-12">
                        <div class="col-md-4 mb-1">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp" placeholder="Enter First Name">          
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="emailHelp" placeholder="Enter Last Name">              
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control" id="email" name="email"  aria-describedby="emailHelp" placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4 mb-1">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"> 
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Confirm Password">
                        </div>
                        <div class="col-md-2 mb-1">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" aria-label="Default select example" id="level" name="level">
                                <option selected>Select Level</option>
                                <option value="0">Admin</option>
                                <option value="1">Super Admin</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-1">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" id="status" name="status">
                                <option selected>Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-2" name="new_admin">Create New Admin</button>
                    <?php if(isset($err_message)){?>
                            <div class="form-group">
                                <h5 class="text-danger"><?= $err_message ?></h5>
                            </div>
                        <?php 
                            unset($_GET["error"]);    
                        }
                        ?>
                </form>    
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-person-lines-fill"></i></span> Admin User List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Firts Name</th>
                                        <th class="text-center">Last Name</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Level</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="text-center">
                                        <td>Juan</td>
                                        <td>Dela Cruz</td>
                                        <td>juan,delacruz@gmail.com</td>
                                        <td>0</td>
                                        <td>
                                            <button type="button" class="btn btn-success p-2 m-0 col-md-4" data-bs-toggle="modal" data-bs-target="#editStatus"><small>Active</small></button>
                                            <button type="button" class="btn btn-danger p-2 m-0 col-md-4" data-bs-toggle="modal" data-bs-target="#editStatus"><small>Inactive</small></button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn tooltip-test" title="EDIT" data-bs-toggle="modal" data-bs-target="#editProfile">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <tr class="text-center">
                                        <td>New</td>
                                        <td>Admin</td>
                                        <td>new.admin@gmail.com</td>
                                        <td>1</td>
                                        <td> 
                                            <button type="button" class="btn btn-success p-2 m-0 col-md-4" data-bs-toggle="modal" data-bs-target="#editStatus"><small>Active</small></button>
                                            <button type="button" class="btn btn-danger p-2 m-0 col-md-4" data-bs-toggle="modal" data-bs-target="#editStatus"><small>Inactive</small></button>                                        
                                        </td>
                                        <td>
                                            <button type="button" class="btn tooltip-test" title="EDIT" data-bs-toggle="modal" data-bs-target="#editProfile">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Firts Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th class="text-center" >Status</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Start Here -->
        <div class="modal" id="editProfile" data-bs-backdrop="static"  tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Edit Profile</h5>
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
                        </div>  
                    </form>       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal" id="editStatus" data-bs-backdrop="static" tabindex="-1" style="margin-top: 150px;">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row col-md-12">
                            <div class="col-md-12 mb-1">
                                <h3 class="text-center">Are you sure you want to change the status of this user?</h3>  
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary mt-2" name="new_admin">Change</button>
                            <button type="submit" class="btn btn-dark mt-2" name="new_admin">Close</button>
                        </div>  
                    </form>       
                </div>
                <div class="modal-footer">
                </div>
                </div>
            </div>
        </div>

        <!-- Modal End Here -->

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>