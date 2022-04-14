<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY User Archieve</title>

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
                <h4 class="page-header">User Archive</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-person-dash"></i></span> User Archive
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>A_ID</th>
                                        <th>loginID</th>
                                        <th>ProfileID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                        <th>Date Added</th>
                                        <th>Date Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $archive_query = "SELECT * FROM `archiveuser` ORDER BY `id` DESC";
                                        $archive_query_result = mysqli_query($conn, $archive_query);
                                        if(mysqli_num_rows($archive_query_result) > 0){
                                            foreach($archive_query_result as $archive_user){
                                                ?>
                                                    <tr>
                                                        <td><?= $archive_user['id']?></td>
                                                        <td><?= $archive_user['loginId']?></td>
                                                        <td><?= $archive_user['profileId']?></td>
                                                        <td><?= $archive_user['firstName']?></td>
                                                        <td><?= $archive_user['lastName']?></td>
                                                        <td><?= $archive_user['username']?></td>
                                                        <td><?= $archive_user['level']?></td>
                                                        <td><?= $archive_user['status']?></td>
                                                        <td><?= $archive_user['reason']?></td>
                                                        <td><?= date('M d Y g:i a', strtotime($archive_user['dateAdded'])) ?></td>
                                                        <td><?= date('M d Y g:i a', strtotime($archive_user['dateDeleted'])) ?></td>
                                                        <td><button class="border-1 px-2 py-1 rounded-circle bg-white text-dark openmenu"><i class="bi bi-menu-up"></i></button></td>
                                                    </tr>
                                                <?php
                                            }
                                        }

                                    ?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>A_ID</th>
                                        <th>loginID</th>
                                        <th>ProfileID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>User Name</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                        <th>Date Added</th>
                                        <th>Date Deleted</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Start Here -->
        <div class="modal fade" id="menu" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Activate Admin/Super Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="comptroller/admin-add.php" method="POST">
                            <div class="col-md-12">
                                <div class="col-md-12 d-flex">
                                    <div class="col-md-6 mb-1">
                                        <label>Archive ID</label>
                                        <input type="text" class="form-control" id="archiveid" name="archiveid" readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label>Admin ID</label>
                                        <input type="text" class="form-control" id="loginid" name="loginid" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex">
                                    <div class="col-md-6 mb-1">
                                        <label>Admin Username</label>
                                        <input type="text" class="form-control" id="username" name="username" readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label>Action</label>
                                        <input type="text" class="form-control" name="active" value="active" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>" hidden>
                            <input type="text" class="form-control" id="user" name="user" value="<?= $rusername ?>" hidden>
                            <input type="text" class="form-control" id="newaction" name="newaction" value="Activate user" hidden>
                            
                            <button type="submit" class="btn bg-blue text-white mt-2" name="activate">Activate User</button>
                        </form>
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
       <script>
        $(document).ready(function(){
            $('.openmenu').on('click', function(){
                $('#menu').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#archiveid').val(data[0]);
                $('#loginid').val(data[1]);
                $('#username').val(data[5]);
            })
        })
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>