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
    else if($error == "username_exist"){
        $err_message = "Username is already existing.";
    }
    else if($error == "reason_null"){
        $err_message = "Reason Field is empty.";
    }
    else if($error == "error_self_delete"){
        $err_message = "You can not delete yourself.";
    }
    else if($error == "error_self_status"){
        $err_message = "You can not set your own status.";
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
            <?php if(isset($err_message)){?>
                <div class="form-group">
                    <h5 class="text-danger"><?= $err_message ?></h5>
                </div>
            <?php 
                unset($err_message);    
            }
            ?>
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
                            <input type="text" class="form-control" id="first_name" name="firstName" aria-describedby="emailHelp" placeholder="Enter First Name">          
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="lastName" aria-describedby="emailHelp" placeholder="Enter Last Name">              
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control" id="email" name="username"  aria-describedby="emailHelp" placeholder="Enter Username">
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
                
                    <button type="submit" class="btn btn-primary mt-2" name="submit">Create New Admin</button>
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
                                        <th ></th>
                                        <th >Id</th>
                                        <th >First Name</th>
                                        <th >Last Name</th>
                                        <th >Username</th>
                                        <th >Level</th>
                                        <th >Status</th>
                                        <th> Date Added </th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require "admin-table.php";
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th ></th>
                                        <th >Id</th>
                                        <th >First Name</th>
                                        <th >Last Name</th>
                                        <th  >Username</th>
                                        <th  >Level</th>
                                        <th  >Status</th>
                                        <th> Date Added </th>
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
        <div class="modal" id="editAdmin" style="margin-top:125px" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin-edit.php" method="POST">
                        <input type="hidden" id="sid" name="id">
                        <div class="row col-md-12">
                            <div class="col-md-6 mb-1">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fn" name="firstName" aria-describedby="emailHelp">          
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="ln" name="lastName" aria-describedby="emailHelp" >              
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-8 mb-1">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="un" name="username"  aria-describedby="emailHelp" >
                            </div>
                            <div class="col-md-4 mb-1">
                                <label for="level" aria-label="Default select example" class="form-label">Level</label>
                                <select class="form-select" id="lev" name="level">
                                    <option value="0">admin</option>
                                    <option value="1">superadmin</option>
                                </select>
                            </div>
                        </div>
            </div>
                            <div class="row py-3 col-md-12">
                                <hr class="dropdown-divider bg-dark" />
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editAdminPassword" data-bs-dismiss="modal">Change password</button>
                                </div>
                                <div class="col-md-8 d-grid gap-1 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-success" name="update">Save</button>    
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>    
            </div>
        </div>
        <!-- status modal -->
            <div class="modal fade" id="editStatus">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content mx-auto" style="max-width: 400px">                
                        <div class="modal-body">
                            <form action="admin-status.php" method="POST">
                                    <input type="hidden" id="statuser" name ="username">  
                            <h4>Are you sure you want to change the status of this user?</h4>     
                        </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="active">Active</button>
                                    <button type="submit" class="btn btn-danger" name="inactive">Inactive</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
         <!--Modal End Here -->

        <!--THIS IS FOR MODAL Edit password start-->
        <div class="modal" id="editAdminPassword" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Admin password</h5>
                        <button type="button" class="btn-close"data-bs-toggle="modal" data-bs-target="#editAdmin"  data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <form action="admin-edit-password.php" method="POST">
                        <input type="hidden" id="ssid" name="id">
                            <div class="row col-md-12">
                                <div class="col-md-6 mb-1">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter Password">          
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" aria-describedby="emailHelp" placeholder="Enter Confirm Password">              
                                </div>
                            </div>
                        </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="editPassword">Save</button>
                    </form>       
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editAdmin" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!--THIS IS FOR MODAL DELETE user start-->
        <div class="modal" id="deleteUser" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <form action="admin-delete.php" method="POST">
                        <input type="hidden" id="delId" name="loginId">
                        <input type="hidden" id="delprofid" name="profileId">
                        <input type="hidden" id="deldate" name="dateAdded">
                            <div class="row col-md-12">
                                <div class="col-md-6 mb-1">
                                    <label for="delfn" class="form-label">First Name:</label>
                                    <input type="text" class="form-control" id="delfn" name="firstName" aria-describedby="emailHelp" readonly>              
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label for="delln" class="form-label">Last Name:</label>
                                    <input type="text" class="form-control" id="delln" name="lastName" aria-describedby="emailHelp" readonly>              
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label for="delun" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="delun" name="username" aria-describedby="emailHelp" readonly>              
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label for="dellev" class="form-label">Level:</label>
                                    <input type="text" class="form-control" id="dellev" name="level" aria-describedby="emailHelp" readonly>              
                                </div>
                                <div class="col-md-12 mb-1">
                                    <label for="reason" class="form-label">Reason:</label>
                                    <textarea type="password" class="form-control" id="reason" name="reason" aria-describedby="emailHelp" style="height: 100px"></textarea>              
                                </div>
                            </div>
                        </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="deleteUser">Delete</button>
                    </form>       
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>

  <script>
        $(document).ready(function(){
            $('.statusButton').on('click', function(){
                $('#editStatus').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);


                $('#statuser').val(data[4]);
            })
        })
        $(document).ready(function(){
            $('.editBtn').on('click', function(){

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);


                $('#sid').val(data[1]);
                $('#ssid').val(data[1]);
                $('#fn').val(data[2]);
                $('#ln').val(data[3]);
                $('#un').val(data[4]);
                $('#lev').val(data[5]);
            })
        })

        $(document).ready(function(){
            $('.delBtn').on('click', function(){

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);


                $('#delId').val(data[1]);
                $('#delfn').val(data[2]);
                $('#delln').val(data[3]);
                $('#delun').val(data[4]);
                $('#dellev').val(data[5]);
                $('#delprofid').val(data[6]);
                $('#deldate').val(data[7]);
            })
        })
        
  </script>
</html>