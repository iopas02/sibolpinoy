<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY User Archieve</title>
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
                        <div class="form-group float-end col-md-6">
                            <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
                        </div>
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
                                        <th>log</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                        if(isset($_GET['page_no']) && $_GET['page_no'] !=''){
                                            $page_no = $_GET['page_no'];
                                        }else{
                                            $page_no = 1;
                                        }
            
                                        $total_records_per_page = 25;
                                        $offset = ($page_no-1) * $total_records_per_page;
                                        $previous_page = $page_no - 1;
                                        $next_page = $page_no + 1;
                                        $adjacents = "2";
            
                                        $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `archiveuser`" );
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_number_of_page = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_number_of_page - 1;

                                        $archive_query = "SELECT tb1.id, tb1.loginId, tb1.profileId, tb1.firstName, tb1.lastName, tb1.username, tb1.level, tb1.reason, tb1.status, tb1.dateAdded, tb1.dateDeleted, tb2.username AS admin, tb1.action FROM archiveuser tb1 INNER JOIN login tb2 ON tb1.adminId = tb2.loginId ORDER BY tb1.id DESC LIMIT 25";
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
                                                        <td>
                                                            <button type="button" class="border-0 bg-white p-2" data-bs-toggle="popover" title="Last Admin Log" data-bs-content="<?= $archive_user['action']?> <?=$archive_user['admin']?>"><i class="bi bi-exclamation-circle"></i></button>
                                                        </td>
                                                        <td><button class="border-1 px-2 py-1 rounded-circle bg-white text-dark openmenu"><i class="bi bi-menu-up"></i></button></td>
                                                    </tr>
                                                <?php
                                            }
                                        }else{
                                            echo '
                                                <tr>
                                                    <td class="text-center" colspan="13"><h4>No Archive List</h4></td>
                                                </tr>
                                            ';
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
                                        <th>log</th>
                                        <th>Action</th>
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
                        </ul>
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

        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>