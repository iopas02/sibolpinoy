<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Consultation Reports Table</title>
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
            require "layout.part/consul.reports.subnav.php";
        ?>
        <!-- THIS IS FOR SUB NAV-BAR FOR EVENT END HERE -->

        <!-- THIS IS HEADER PAGE START HERE -->
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12 mb-4">
                <h5 class="page-header">Consultation Reports Table</h5>
            </div>
        </div>
        <!-- THIS IS HEADER PAGE END HERE -->
        
        <!-- THIS IS CREATE NEW EVENTS FORM START HERE -->
        <!-- <div class="p-2">
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
        </div> -->
        <!-- THIS IS CREATE NEW EVENTS FORM END HERE -->

        <!-- THIS IS EVENTS TABLE START HERE -->
        <div class="row col-md-12 my-3">
            <hr class="dropdown-divider bg-dark" />
            <div class="col-md-6 px-5">
                <h5><span><i class="bi bi-bar-chart"></i></span> Reports Table</h5>
            </div>

            <div class="form-group float-end col-md-6">
                <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableid" class="table data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>CR_ID</th>
                                <th>Client ID</th>
                                <th>Client Fullname</th>
                                <th>Client Email</th>
                                <th>Service Title</th>
                                <th>Sub-Category Title</th>
                                <th>Consultation ID</th>
                                <th>Set Date</th>
                                <th>Set Time</th>
                                <th>Approved by</th>
                                <th>Status</th>
                                <th>Approved Date</th>
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

                            $consul_reports_query = "SELECT tb1.consul_reportID, tb.client_uniID, tb.firstName, tb.mi, tb.lastName, tb.email_add, tb3.service_title, tb4.sub_cat_title, tb1.consultation_id, tb1.set_date, tb1.set_time, tb5.username, tb1.status, tb1.approved_date FROM (((consultation_reports tb1 INNER JOIN client tb ON tb1.client_uniID = tb.client_uniID) INNER JOIN services tb3 ON tb1.service_uniID = tb3.service_uniID)INNER JOIN services_sub_category tb4 ON tb1.sub_cat_uniID = tb4.sub_cat_uniID)INNER JOIN login tb5 ON tb1.loginId = tb5.loginId ORDER BY tb1.consul_reportID DESC";

                            $consul_reports_query_result = mysqli_query($conn, $consul_reports_query);
                            if(mysqli_num_rows($consul_reports_query_result) > 0 ){
                                foreach($consul_reports_query_result as $consul_reports){
                                    ?>
                                    <tr >  
                                        <td><?= $consul_reports['consul_reportID']?></td>
                                        <td><?= $consul_reports['client_uniID']?></td>
                                        <td><?= $consul_reports['firstName']?> <?= $consul_reports['mi']?> <?= $consul_reports['lastName']?></td>
                                        <td><?= $consul_reports['email_add']?></td>
                                        <td><?= $consul_reports['service_title']?></td>
                                        <td><?= $consul_reports['sub_cat_title']?></td>
                                        <td><?= $consul_reports['consultation_id']?></td>
                                        <td><?= $consul_reports['set_date']?></td>
                                        <td><?= $consul_reports['set_time']?></td>
                                        <td><?= $consul_reports['username']?></td>
                                        <td><?= $consul_reports['status']?></td>
                                        <td><?= date('M d Y',  strtotime($consul_reports['approved_date'])) ?></td>
                                    </tr>
                                    <?php
                                }
                            }

                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>CR_ID</th>
                                <th>Client ID</th>
                                <th>Client Fullname</th>
                                <th>Client Email</th>
                                <th>Service Title</th>
                                <th>Sub-Category Title</th>
                                <th>Consultation ID</th>
                                <th>Set Date</th>
                                <th>Set Time</th>
                                <th>Approved by</th>
                                <th>Status</th>
                                <th>Approved Date</th>
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
    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    
    <!-- Footer and JS Script End Here -->
  </body>
</html>