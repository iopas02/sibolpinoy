<!doctype html>
<html lang="en">
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Admin Inbox</title>
    <script>
        $(document).ready(function(){
            $(".inputSearch").on('keyup', function(){
              var value =$(this).val().toLowerCase();
              $("#myTable tr").filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });    
            });
        });   
    </script>
   

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
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid border-bottom border-3 border-dark mb-2">
                <a class="navbar-brand" href="admin.con">Admin Tools</a>
                
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="admin.log">Admin Log</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid px-4">
            
            <div class="row">
            <?php
                include_once 'layout.part/erro.php'; 
            ?>
            
            <div class="col-md-12 my-2">
                <h4 class="page-header">Admin Controller</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3 px-4">
                <form action="comptroller/admin-add.php" method="POST">
                    <div class="row col-md-12">
                        <div class="col-md-6 mb-1">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="firstName" aria-describedby="emailHelp" placeholder="Enter First Name">          
                        </div>
                        <div class="col-md-6 mb-1">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="lastName" aria-describedby="emailHelp" placeholder="Enter Last Name">              
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6 mb-1">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control" id="email" name="username"  aria-describedby="emailHelp" placeholder="Enter Username">
                        </div>
                        <div class="col-md-3 mb-1">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" aria-label="Default select example" id="level" name="level">
                                <option selected>Select Level</option>
                                <option value="0">Admin</option>
                                <option value="1">Super Admin</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-1">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" id="status" name="status">
                                <option selected>Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="text" class="form-control" id="" name="password"  aria-describedby="emailHelp" value="SPMC123" hidden>
                    <p>Note: Default password is "<strong class="text-primary">SPMC123</strong>"</p>
                    <button type="submit" class="btn bg-coloured text-white mt-1" name="submit">Create New Admin</button>
                </form>    
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-person-lines-fill"></i></span> Admin User List

                        <div class="form-group float-end col-md-6">
                            <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Date Added</th>
                                        <th>Last Logged in</th>
                                        <th>Created by</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                        require "admin-table.php";
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Date Added </th>
                                        <th>Last Logged in</th>
                                        <th>Created by</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <ul class="pagination pull-right">
                            <li class="pull-left btn btn-default disabled">Showing Page <?php echo $page_no." of ".$total_number_of_page;?></li>
                            <li class=" p-2 <?php if($page_no <= 1) { echo "disabled";}?>">
                                <a <?php if($page_no > 1) { echo "href='?page_no=$previous_page'";} ?>>Previous</a>
                            </li>

                            <?php
                                if($total_number_of_page <=10){

                                    for($counter = 1; $counter <=$total_number_of_page;$counter++){
                                        if($counter == $page_no){
                                            echo "<li class='active p-2'><a> $counter </a></li>";
                                        }else{
                                            echo "<li class='p-2'><a href='?page_no=$counter'> $counter </a></li>";
                                        }
                                    }
                                }elseif($total_number_of_page > 10){
                                    if($page_no <=4){
                                        for($counter = 1; $counter < 8; $counter++){
                                            if($counter == $page_no){
                                                echo "<li class='active p-2'><a> $counter </a></li>";
                                            }else {
                                                echo "<li class='p-2'><a href'?page_no=$counter'> $counter </a></li>";
                                            }
                                        }
                                        echo "<li class='p-2'><a>...</a></li>";
                                        echo "<li class='p-2'><a href='?page_no=$second_last'>$second_last</a></li>";
                                        echo "<li class='p-2'><a href='?page_no=$total_number_of_page'>$total_number_of_page</a></li>";
                                    }
                                }elseif($page_no > 4 && $page_no < $total_number_of_page -4 ){
                                    echo "<li><a href='?page_no=1'>1</a></li>";
                                    echo "<li><a href='?page_no=2'>2</a></li>";
                                    echo "<li><a>...</a></li>";

                                    for($counter = $page_no - $adjacents; $counter <=$page_no + $adjacents;$counter++){
                                        if($counter == $page_no){
                                            echo "<li class='active'><a> $counter </a></li>";
                                        }else{
                                            echo "<li><a href'?page_no=$counter'> $counter </a></li>";
                                        }
                                    }
                                    echo "<li><a>...</a></li>";
                                    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_number_of_page'>$total_number_of_page</a></li>";
                                }else{
                                    echo "<li><a href='?page_no=1'>1</a></li>";
                                    echo "<li><a href='?page_no=2'>2</a></li>";
                                    echo "<li><a>...</a></li>";

                                    for($counter = $total_number_of_page - 6; $counter <= $total_number_of_page;$counter++){
                                        if($counter == $page_no){
                                            echo "<li class='active'><a> $counter </a></li>";
                                        }else{
                                            echo "<li><a href'?page_no=$counter'> $counter </a></li>";
                                        }
                                    }
                                    
                                } 
                            ?>

                            <li class="p-2 <?php if($page_no >= $total_number_of_page) {echo "disabled";} ?>" >
                                <a <?php if($page_no < $total_number_of_page) {echo "href='?page_no=$next_page'";} ?>>Next</a>
                            </li>
                            <?php if($page_no < $total_number_of_page) {echo "<li class='p-2'><a href='?page_no=$total_number_of_page'>Last &rsaquo;</a?</li>";} ?>
                            
                        </ul>
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
                                        <option value="admin">admin</option>
                                        <option value="superadmin">superadmin</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="row py-3 col-md-12">
                    <hr class="dropdown-divider bg-dark" />
                                    <div class="col-md-4">
                                        <button type="button" class="p-1 text-white rounded bg-coloured" data-bs-toggle="modal" data-bs-target="#editAdminPassword">Reset password</button>
                                    </div>
                                    <div class="col-md-8 d-grid gap-1 d-md-flex justify-content-md-end">
                                        <button type="submit" class="p-1 text-white rounded bg-blue" name="update">Update User</button>    
                                        <button type="button" class="p-1 text-white rounded bg-dark" data-bs-dismiss="modal">Close</button>
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
                            <form action="comptroller/admin-status.php" method="POST">
                                    <input type="hidden" id="statuser" name ="username">  
                            <h5>Are you sure you want to change the status of this user?</h5>     
                        </div>
                                <div class="modal-footer">
                                    <button type="submit" class="p-1 rounded bg-coloured text-white" name="active">Active</button>
                                    <button type="submit" class="p-1 rounded bg-blue text-white" name="inactive">Inactive</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
         <!--Modal End Here -->

        <!--THIS IS FOR MODAL Edit password start-->
        <div class="modal fade"  data-bs-backdrop="static" id="editAdminPassword" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content" style="max-width: 400px">
                    <div class="modal-header">
                        <h5 class="modal-title">Reset password</h5>
                        <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#editAdmin" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <form action="comptroller/admin-edit-password.php" method="POST">
                        <input type="hidden" id="ssid" name="id">
                        <input type="hidden" id="" name="resetpass" value="SPMC123">
                            <h5>Are you sure you want to <strong class="text-danger">reset</strong> the password of this user?</h5>   
                            <br>
                            <h5>Default password: <strong class="text-primary">SPMC123</strong></h5>
                        </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="editPassword">Save</button>
                    </form>       
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editAdmin">Close</button>
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
                    <form action="comptroller/admin-delete.php" method="POST">
                        <input type="hidden" id="delId" name="loginId">
                        <input type="hidden" id="delprofid" name="profileId">
                        <input type="hidden" id="deldate" name="dateAdded">
                        <input type="hidden" name="status" value="archive">

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
                        <button type="submit" class="p-1 rounded bg-coloured text-white" name="deleteUser">Delete User</button>
                    </form>       
                    <button type="button" class="p-1 rounded bg-dark text-white" data-bs-dismiss="modal">Close</button>
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