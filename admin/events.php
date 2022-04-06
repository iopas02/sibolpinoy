<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Create Event</title>
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

    <main class="mt-5 pt-2">

        <!-- THIS IS FOR SUB NAV-BAR FOR EVENT START HERE -->
        <?php
            require "layout.part/events.subnav.php";
        ?>
        <!-- THIS IS FOR SUB NAV-BAR FOR EVENT END HERE -->

        <!-- THIS IS HEADER PAGE START HERE -->
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12 mb-4">
                <h5 class="page-header">Create Event</h5>
            </div>
        </div>
        <!-- THIS IS HEADER PAGE END HERE -->
        
        <!-- THIS IS CREATE NEW EVENTS FORM START HERE -->
        <div class="p-2">
            <form action="comptroller/event.control.php" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-4" style="min-height: 400px;">
                                <label for="#eventID">Event ID</label>
                                <input type="text" id="eventID" name="eventID" class="form-control w-50" readonly>                           
                                <div class="position-relative" >
                                    <div class="pb-2" >
                                        <label>Upload Image Here</label>
                                        <img class="img-fluid w-100" style="height: 250px" src="svg/default_new_image.jpg">  
                                    </div>
                                </div>
                                <input type="file" name="event_image">
                                       
                            </div>
                            <div class="col-lg-8">
                                
                                <div class="bg-white text-dark mb-2">
                                    <label>Header</label>
                                    <input class="w-100 h-100 p-1" type="text" id="header" name="header" placeholder="e.g Avail UP TO 50% OFF on any of the following Training-Workshops below:">    
                                </div>
                                
                                <div class="bg-white text-dark mb-2">
                                    <label>Event Title:</label>
                                    <input class="w-100 h-100 p-1" type="text" id="event_title" name="event_title" placeholder="e.g ISO 9001:2015 Requirements and internal Aquality Audit">  
                                </div>
                                   
                                <div class="bg-white text-dark pe-3 second-header">
                                    <label>Date And Time </label>
                                    <input class="w-50 h-100 p-1" type="text" id="date_and_time" name="event_date" placeholder="e.g March 5, 6, 12 & 13, 2022 | 9AM-5PM">
                                    
                                    <label>Start Date</label>
                                    <input class="w-30 h-100 p-1" type="date" id="date_start" name="start_date"> 
                                </div>

                                <div class="mb-2"> 
                                    <label>Registration Fees </label>
                                    <input class="w-50 p-1" type="text" id="reg_fee" name="reg_fee" placeholder="e.g Regular Fee: P2,000.00">

                                    <label>Status</label>
                                    <select class="w-40 p-2" name="status" id="">
                                            <option value="">Select Status</option>
                                            <option value="sample">sample</option>
                                            <option value="published">published</option>
                                            <option value="unpublished">unpublished</option>
                                    </select> 
                                </div>

                                <div class="mb-2">
                                    <label>Description 1</label>
                                    <input class="w-100 p-1" type="text" id="desc_1" name="desc_one" placeholder="e.g Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022">
                                </div>

                                
                                <div class="mb-2">
                                    <label>Description 2</label>
                                    <input class="w-100 p-1" type="text" id="desc_2" name="desc_two" placeholder="e.g Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.">
                                </div>
                               
                                <input type="text" hidden name="loginid" value="<?= $id?>">
                                <input type="text" hidden name="admin" value="<?= $rusername?>">
                                <input type="text" hidden name="action" value="created new event">
                                <input type="text" hidden name="action1" value="update event">   
                                <input type="text" hidden name="action2" value="delete event"> 
                                
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <button type="submit" name="event_published" class="btn bg-coloured text-white my-2" >
                                        <i class="bi bi-folder-plus"></i> Create Event
                                        </button>
                                    </div>
                                    <div class="col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button  type="submit" name="edit_event" class="btn bg-coloured text-white my-2" "><i class="bi bi-vector-pen"></i> Update</button>
                                        <button  type="submit" name="delete_services" class="btn bg-coloured text-white my-2" ><i class="bi bi-trash"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- THIS IS CREATE NEW EVENTS FORM END HERE -->

        <!-- THIS IS EVENTS TABLE START HERE -->
        <div class="row col-md-12 my-3">
            <hr class="dropdown-divider bg-dark" />
            <div class="col-md-6 px-5">
                <h5>Events Table</h5>
            </div>

            <div class="form-group float-end col-md-6">
                <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableid" class="table data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Header</th>
                                <th>Title</th>
                                <th>Date Start</th>
                                <th>Date and Time</th>
                                <th>Reg Fee</th>
                                <th>Desc One</th>
                                <th>Desc Two</th>
                                <th hidden>admin id</th>
                                <th hidden>Created By</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th hidden>Action</th>
                                <th>Date Update</th>
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

                            $total_records_per_page = 15;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2";

                            $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `events`" );
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_number_of_page = ceil($total_records / $total_records_per_page);
                            $second_last = $total_number_of_page - 1;

                            $event_reload_query = "SELECT tb1.eventID, tb1.event_img, tb1.header, tb1.event_title, tb1.date_start, tb1.date_and_time, tb1.reg_fee, tb1.desc_1, tb1.desc_2, tb2.loginId, tb2.username, tb1.status, tb1.date_published, tb1.action, tb1.date_update FROM events tb1 INNER JOIN login tb2 ON tb1.loginId = tb2.loginId";

                            $event_reload_query_result = mysqli_query($conn, $event_reload_query);
                            if(mysqli_num_rows($event_reload_query_result) > 0 ){
                                foreach($event_reload_query_result as $event){
                                    ?>
                                    <tr >  
                                        <td><?= $event['eventID']?></td>
                                        <td>
                                            <button type="button" class="btn tooltip-test imgs" title="UPDATE IMAGE" id="imgs">
                                                <img src="./upload/<?= $event['event_img']?>" class="" style="width: 150px; height: 150px;">
                                            </button>
                                        </td>
                                        <td><?= $event['header']?></td>
                                        <td><?= $event['event_title']?></td>
                                        <td><?= date('M d Y',  strtotime($event['date_start'])) ?></td>
                                        <td><?= $event['date_and_time']?></td>
                                        <td><?= $event['reg_fee']?></td>
                                        <td><?= $event['desc_1']?></td>
                                        <td><?= $event['desc_2']?></td>
                                        <td hidden><?= $event['loginId']?></td>
                                        <td hidden><?= $event['username']?></td>
                                            <?php
                                                if($event['status'] == 'published'){
                                                    $stats = "stats-orange";
                                                    $font = "P"; 
                                                }else if($event['status'] == 'unpublished'){
                                                    $stats = "stats-blue";
                                                    $font = "UP";
                                                }else{
                                                    $stats = "stats-white";
                                                    $font = "S";
                                                }
                                            ?>
                                        <td>
                                            <button type="button" class="<?= $stats ?> tooltip-test status" title="Update Status" id="status">
                                            <?= $font ?>
                                            </button>
                                        </td>
                                        <td><?= date('M d Y',  strtotime($event['date_published'])) ?></td>
                                        <td hidden><?= $event['action']?></td>
                                        <td><?= date('M d Y',  strtotime($event['date_update'])) ?></td>
                                        <td>
                                            <button type="button" class="border-0 bg-white p-2" data-bs-toggle="popover" title="Last Admin Log" data-bs-content="<?= $event['action']?> by <?= $event['username']?>"><i class="bi bi-exclamation-circle"></i></button>
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
                                <th>Image</th>
                                <th>Header</th>
                                <th>Title</th>
                                <th>Date Start</th>
                                <th>Date and Time</th>
                                <th>Reg Fee</th>
                                <th>Desc One</th>
                                <th>Desc Two</th>
                                <th hidden>admin id</th>
                                <th hidden>Created By</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th hidden>Action</th>
                                <th>Date Update</th>
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
        <!-- THIS IS EVENTS TABLE END HERE -->

        <!-- THIS IS FOR EDIT MODAL START HERE -->                        
        <div class="modal fade" id="editStatus" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Event Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/event.control.php" method="POST">
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    <label for="eventid" class="col-form-label">Event ID</label>
                                    <input type="text" class="form-control" readonly name="eventid" id="eventid">
                                </div>
                                <div class="col-md-6">
                                    <label for="eventtitle" class="col-form-label">Event Title</label>
                                    <input type="text" class="form-control" readonly name="eventtitle" id="eventtitle">
                                </div>
                                <div class="col-md-3">
                                    <label for="stats" class="col-form-label">Status</label>
                                    <select class="form-select" name="stats">
                                            <option value="">Select Status</option>
                                            <option value="sample">sample</option>
                                            <option value="published">published</option>
                                            <option value="unpublished">unpublished</option>
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
                                        <input type="text" class="form-control" id="status_update" name="status_update" value="update event status">
                                    </div>
                                </div>
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->

                                <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn bg-coloured text-white" type="submit" name="update_event_stats" ><i class="bi bi-vector-pen"></i> Update Status</button>
                                </div>
                            </div>    
                        </form>     
                    </div>
                </div>                
            </div>
        </div>

        <div class="modal fade" id="editImage" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/event.control.php" method="POST" enctype="multipart/form-data">
                            <div class="row col-sm-12 px-2">
                                <label for="eid" class="col-form-label">Event uniID</label>
                                <input type="text" class="form-control" readonly name="eid" id="eid">
                            </div>
                            <div class="row col-sm-12 px-2">
                                <label for="etitle" class="col-form-label">Event Title</label>
                                <input type="text" class="form-control" readonly name="etitle" id="etitle">
                            </div>
                            <div class="row col-sm-12 px-2">
                                <label for="uimg" class="col-form-label">Update Image</label>
                                <input type="file" class="form-control" name="event_img" id="event_img">
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
                                    <input type="text" class="form-control" id="image_update" name="image_update" value="update event image">
                                </div>
                            </div>
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->
                            <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn bg-coloured text-white" type="submit" name="update_event_img" ><i class="bi bi-vector-pen"></i> Update Image</button>
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

                console.log(data);

                $('#eventID').val(data[0]);
                $('#header').val(data[2]);
                $('#event_title').val(data[3]);
                $('#date_start').val(data[4]);
                $('#date_and_time').val(data[5]);
                $('#reg_fee').val(data[6]);
                $('#desc_1').val(data[7]);
                $('#desc_2').val(data[8]);
                // $('#date_and_time').val(data[5]);
                // $('#date_and_time').val(data[5]);
           
            })

        })

        $(document).ready(function(){
            $('.status').on('click', function(){
                $('#editStatus').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#eventid').val(data[0]);
                $('#eventtitle').val(data[3]);
            })
        })

        $(document).ready(function(){
            $('.imgs').on('click', function(){
                $('#editImage').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#eid').val(data[0]);
                $('#etitle').val(data[3]);
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