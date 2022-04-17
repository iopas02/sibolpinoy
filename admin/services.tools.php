<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Services Tools</title>
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

    <!-- THIS IS FOR SUB NAV-BAR FOR SERVICES TOOLS START HERE -->
    <?php
        require "layout.part/services.subnav.php";
    ?>
    <!-- THIS IS FOR SUB NAV-BAR FOR SERVICES TOOLS END HERE -->


    <!-- THIS IS CREATE NEW SERVICES FORM START HERE -->
        <div class="row col-md-12 border-bottom border-1 border-dark mb-2">
            <div class="row col-md-12 px-5">
                <h5 class="page-header">Create Services</h5>
            </div>
            <div class="row col-md-12 mb-2">
                <form action="comptroller/service.control.php" method="POST" enctype="multipart/form-data">
                    <div class="row col-md-12">
                        <div class="col-md-2 m-2">
                            <label for="service_uniID" class="form-label service_uniID">uniID</label>
                            <input class="form-control" type="text" readonly id="service_uniID" name="service_uniID">
                            <small>( This is an Auto generated service_uniID )</small>
                        </div>
                        <div class="col-md-3 m-2">
                            <label for="image" class="form-label">Insert Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                            <small>( jpeg, jpg, png, gif file extension and limit to 25mb can be upload here )</small>
                        </div>
                        <div class="col-md-6 m-2">
                            <label for="status" class="form-label">Sevice Title</label>
                            <input type="text" class="form-control" id="service_title" name="service_title" placeholder="Sevice Title">
                            <input type="text" hidden class="form-control" id="status" name="status" value="Active" >
                            <small>( Please type here the Service Name of additional Services )</small>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-11 m-2">
                            <label for="service_desc" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="service_desc" name="service_desc" rows="5" placeholder="Type services Description"></textarea>
                            <small>( Please type here the Description of additional Services )</small>
                        </div>
                    </div>

                <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->
                    <div class="row col-md-12" hidden>
                        <div class="col-md-2 m-2">
                            <label for="user_id" class="form-label service_uniID">Ceated By</label>
                            <input class="form-control" type="text" readonly id="user_id" name="user_id" value="<?=$id?>">
                        </div>
                        <div class="col-md-2 m-2">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $rusername ?>">
                        </div>
                        <div class="col-md-2 m-2">
                            <label for="user_level" class="form-label">level</label>
                            <input type="text" class="form-control" id="user_level" name="user_level" value="<?= $level ?>">
                        </div>
                        <div class="col-md-2 m-2">
                            <label for="create_services" class="form-label">Action 1</label>
                            <input type="text" class="form-control" id="create_services" name="create_service" value="create services">

                            <label for="update_services" class="form-label">Action 2</label>
                            <input type="text" class="form-control" id="update_services" name="update_service" value="update services">

                            <label for="delete_services" class="form-label">Action 3</label>
                            <input type="text" class="form-control" id="delete_services" name="delete_service" value="delete services">
                        </div>
                    </div>
                 <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->

                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <button type="submit" name="create_services" class="btn bg-coloured text-white my-2" >
                            <i class="bi bi-folder-plus"></i> Create Services
                            </button>
                        </div>
                        <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                            <button  type="submit" name="edit_services" class="btn bg-coloured text-white my-2" "><i class="bi bi-vector-pen"></i> Update</button>
                            <button  type="submit" name="delete_services" class="btn bg-coloured text-white my-2" ><i class="bi bi-trash"></i> Delete</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    <!-- THIS IS CREATE NEW SERVICES FORM END HERE -->

    <!-- THIS IS SERVICES TABLE START HERE -->
        <div class="row col-md-12 mt-3">
            <div class="col-md-6 px-5">
                <h5>Services Table</h5>
            </div>

            <div class="form-group float-end col-md-6">
                <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableid" class="table data-table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th hidden>Username</th>
                                <th hidden>Action</th>
                                <th>Date</th>
                                <th>Updated</th>
                                <th>Log</th>
                                <th>Read</th>
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

                            $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `services`" );
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_number_of_page = ceil($total_records / $total_records_per_page);
                            $second_last = $total_number_of_page - 1;

                            $Service_reload = "SELECT tb1.service_uniID, tb1.service_title, tb1.image, tb1.service_desc, tb1.status, tb2.username, tb1.action, tb1.date_upload, tb1.date_update FROM services tb1 INNER JOIN login tb2 ON tb1.loginId = tb2.loginId";
                            $Service_reload_result = mysqli_query($conn, $Service_reload);
                            if(mysqli_num_rows($Service_reload_result) > 0 ){
                                foreach($Service_reload_result as $services){
                                    ?>
                                    <tr >  
                                        <td><?= $services['service_uniID']?></td>
                                        <td><?= $services['service_title']?></td>
                                        <td>
                                            <button type="button" class="btn tooltip-test imgs" title="UPDATE IMAGE" id="imgs">
                                                <img src="./upload/<?= $services['image']?>" class="h-100 w-100">
                                            </button>
                                        </td>
                                        <td><?= $services['service_desc']?></td>
                                            <?php
                                                if($services['status'] == 'Active'){
                                                    $stats = "stats-orange";
                                                    $font = "A"; 
                                                }else{
                                                    $stats = "stats-blue";
                                                    $font = "I";
                                                }
                                            ?>
                                        <td>
                                            <button type="button" class="<?= $stats ?> tooltip-test status" title="Update Status" id="status">
                                            <?= $font ?>
                                            </button>
                                            
                                        </td>
                                        <td hidden><?= $services['username']?></td>
                                        <td hidden><?= $services['action']?></td>
                                        <td><?= date('M d Y',  strtotime($services['date_upload'])) ?></td>
                                        <td><?= date('M d Y',  strtotime($services['date_update'])) ?></td>
                                        <td>
                                            <button type="button" class="border-0 bg-white p-2" data-bs-toggle="popover" title="Last Admin Log" data-bs-content="<?= $services['action']?> by <?= $services['username']?>"><i class="bi bi-exclamation-circle"></i></button>
                                        </td>
                                        <td>
                                            <button type="button" class="stats-white tooltip-test read" title="READ" id="read">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }

                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th hidden>Username</th>
                                <th hidden>Action</th>
                                <th>Date</th>
                                <th>Updated</th>
                                <th>Log</th>
                                <th>Read</th>
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
    <!-- THIS IS SERVICES TABLE END HERE -->

    <!-- THIS IS FOR EDIT MODAL START HERE -->                        
        <div class="modal fade" id="editStatus" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Service Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/service.control.php" method="POST">
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    <label for="uniID" class="col-form-label">uniID</label>
                                    <input type="text" class="form-control" readonly name="uniID" id="uniID">
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input type="text" class="form-control" readonly name="title" id="title">
                                </div>
                                <div class="col-md-3">
                                    <label for="stats" class="col-form-label">Status</label>
                                    <select class="form-select" name="stats">
                                        <option selected value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->
                                <div class="row col-md-12" hidden>
                                    <div class="col-md-2 m-2">
                                        <label for="user_id" class="form-label service_uniID">User ID</label>
                                        <input class="form-control" type="text" readonly id="user_id" name="user_id" value="<?=$id?>">
                                    </div>
                                    <div class="col-md-2 m-2">
                                        <label for="username" class="form-label">User Name</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $rusername ?>">
                                    </div>
                                    <div class="col-md-2 m-2">
                                        <label for="user_level" class="form-label">level</label>
                                        <input type="text" class="form-control" id="user_level" name="user_level" value="<?= $level ?>">
                                    </div>
                                    <div class="col-md-2 m-2">
                                        <label for="status_update" class="form-label">Action 1</label>
                                        <input type="text" class="form-control" id="status_update" name="status_update" value="update service status">

                                    </div>
                                </div>
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->

                                <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn bg-coloured text-white" type="submit" name="update_stats" ><i class="bi bi-vector-pen"></i> Update Status</button>
                                </div>
                            </div>    
                        </form>     
                    </div>
                </div>                
            </div>
        </div>

        <div class="modal fade" id="editImage" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/service.control.php" method="POST" enctype="multipart/form-data">
                            <div class="row col-sm-12 px-2">
                                <label for="sunid" class="col-form-label">Service uniID</label>
                                <input type="text" class="form-control" readonly name="sunid" id="sunid">
                            </div>
                            <div class="row col-sm-12 px-2">
                                <label for="stitle" class="col-form-label">Service Title</label>
                                <input type="text" class="form-control" readonly name="stitle" id="stitle">
                            </div>
                            <div class="row col-sm-12 px-2">
                                <label for="uimg" class="col-form-label">Update Image</label>
                                <input type="file" class="form-control" name="uimg" id="uimg">
                            </div>
                            
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->
                            <div class="row col-md-12" hidden>
                                <div class="col-md-2 m-2">
                                    <label for="user_id" class="form-label service_uniID">User ID</label>
                                    <input class="form-control" type="text" readonly id="user_id" name="user_id" value="<?=$id?>">
                                </div>
                                <div class="col-md-2 m-2">
                                    <label for="username" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $rusername ?>">
                                </div>
                                <div class="col-md-2 m-2">
                                    <label for="user_level" class="form-label">level</label>
                                    <input type="text" class="form-control" id="user_level" name="user_level" value="<?= $level ?>">
                                </div>
                                <div class="col-md-2 m-2">
                                    <label for="image_update" class="form-label">Action 1</label>
                                    <input type="text" class="form-control" id="image_update" name="image_update" value="update service image">
                                </div>
                            </div>
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->
                            <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn bg-coloured text-white" type="submit" name="update_image" ><i class="bi bi-vector-pen"></i> Update Image</button>
                            </div>
                        </form>     
                    </div>
                </div>                
            </div>
        </div>
    <!-- THIS IS FOR EDIT MODAL END HERE -->                         
    
    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <script>
        $(document).ready(function(){
            $('.read').on('click', function(){
                
                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                // console.log(data);

                $('#service_uniID').val(data[0]);
                $('#service_title').val(data[1]);
                // $('#image').val(data[2]);
                $('#service_desc').val(data[3]);
           
            })

        })

        $(document).ready(function(){
            $('.status').on('click', function(){
                $('#editStatus').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                // console.log(data);
                $('#uniID').val(data[0]);
                $('#title').val(data[1]);
            })
        })

        $(document).ready(function(){
            $('.imgs').on('click', function(){
                $('#editImage').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                // console.log(data);
                $('#sunid').val(data[0]);
                $('#stitle').val(data[1]);
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