<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
    require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Consultation Events Reports Table</title>
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
      require_once 'layout.part/dashboard.php';
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
                <h5 class="page-header">Events Reservation Reports Table</h5>
            </div>
        </div>
        <div class="row">
        
            <form action="event.report" method="POST">
                <div class="col-md-12 p-3 d-flex">
                    <div class="col-md-2">
                        <select class="form-select form-select-sm" name="eventid">
                        <option selected>Select Event ID</option>
                            <?php
                                $eventid_query = "SELECT `eventID` FROM `events` ";
                                $eventid_query_results = $conn->query($eventid_query);
                                if(mysqli_num_rows($eventid_query_results) > 0){
                                    foreach($eventid_query_results as $eventid){
                                        ?>
                                            <option value="<?= $eventid['eventID'] ?>"><?= $eventid['eventID'] ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select form-select-sm" name="evenettitle">
                        <option selected>Open this select menu</option>
                        <?php
                            $event_title_query = "SELECT `event_title` FROM `events` ";
                            $event_title_query_results = $conn->query($event_title_query);
                            if(mysqli_num_rows($event_title_query_results) > 0){
                                foreach($event_title_query_results as $event_title){
                                    ?>
                                        <option value="<?= $event_title['event_title'] ?>"><?= $event_title['event_title'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="search"><i class="bi bi-search"></i></button>
                </div>
            </form>
        
            <div class="col-md-12 p-3">
                <?php
                    $id = '';
                    $evenettitle = '';
                    $count = '';
                    $name = '';   
                    if(isset($_POST['search'])){
                        $id = $_POST['eventid'];
                        $evenettitle = $_POST['evenettitle'];
                    }

                    $event_partcipants_query = "SELECT tb1.eventID, tb2.event_title, COUNT(*) AS `participants` FROM event_reservation_reports tb1 INNER JOIN events tb2 ON tb1.eventID = tb2.eventID WHERE tb1.eventID='$id' AND tb2.event_title='$evenettitle' GROUP BY tb2.event_title";

                    $event_partcipants_query_run = mysqli_query($conn, $event_partcipants_query);
                   
                    while ($row = mysqli_fetch_assoc($event_partcipants_query_run)) {
                        $count = $row['participants'];
                        $name = $row['event_title'];
                    }
            
                ?>
                <script type="text/javascript">

                    google.charts.setOnLoadCallback(eventChart);

                    function eventChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Events Name', 'Participants'],

                        <?php
                            $org_count_query = "SELECT tb1.eventID, tb2.event_title, tb1.client_uniID, tb3.organization, COUNT(*) AS `orgs_count` FROM (event_reservation_reports tb1 INNER JOIN events tb2 ON tb1.eventID = tb2.eventID) INNER JOIN client tb3 ON tb1.client_uniID = tb3.client_uniID WHERE tb1.eventID='$id' AND tb2.event_title='$evenettitle' GROUP BY tb3.organization";

                            $org_count_query_run = mysqli_query($conn, $org_count_query);
                            $org_count = array();
                            while ($row = mysqli_fetch_assoc($org_count_query_run)) {
                                $org_count = "['".$row['organization']."',".$row['orgs_count']."],";
                            
                                echo $org_count;
                            }
                    
                        ?>
                    ]);

                    var options = {
                        legend:{position: 'right', textStyle: {color: 'black', fontSize: 12}},
                        title: 'Participants Organization',
                        is3D: true,
                        width: 600, 
                        height: 500,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('participantschart'));
                    chart.draw(data, options);
                    }
                </script>
                <div class="col-md-12 d-flex">
                    <div class="col-md-2 pt-3" <?php 
                            if($id && $evenettitle != ''){
                                echo '';
                            }else{
                                echo 'hidden';
                            }

                        ?>>
                        <div class="text-center" style="font-size: 100px"><i class="bi bi-people-fill"></i> <?= $count ?></div>
                        <div class="text-center"><?= $name ?></div>	
                    </div>    
                <?php
                    if($id && $evenettitle != ''){
                        echo '
                            <div class="col-md-4">
                                <div id="participantschart"></div>
                                
                            </div>
                        ';
                        
                    }else {
                        echo '
                            <div class="">
                                <div id="top_x_div"></div>
                            </div>
                        ';
                    }
                ?>
            
                </div>
                
            </div>
        </div>
        <!-- THIS IS HEADER PAGE END HERE -->
        

        <!-- THIS IS EVENTS TABLE START HERE -->
        <div class="row col-md-12 my-3">
            <hr class="dropdown-divider bg-dark" />
            <div class="col-md-6 px-5">
                <h5><span><i class="bi bi-bar-chart"></i></span>Event Report Table</h5>
            </div>

            <div class="form-group float-end col-md-6">
                <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
            </div>
            

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableid" class="table data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ER_ReportsID</th>
                                <th>Client ID</th>
                                <th>Client Fullname</th>
                                <th>Client Email</th>
                                <th>Event ID</th>
                                <th>Event Title</th>
                                <th>Reservation ID</th>
                                <th>Date and Time</th>
                                <th>Payment Method</th>
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

                            $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `event_reservation_reports`" );
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_number_of_page = ceil($total_records / $total_records_per_page);
                            $second_last = $total_number_of_page - 1;

                            $er_reports_query = "SELECT tb1.er_reportID, tb2.client_uniID, tb2.firstName, tb2.mi, tb2.lastName, tb2.email_add, tb3.eventID, tb3.event_title, tb1.reservationid, tb1.date_and_time, tb1.payment_method, tb4.loginId, tb4.username, tb1.status, tb1.approved_date FROM ((event_reservation_reports tb1 INNER JOIN client tb2 ON tb1.client_uniID = tb2.client_uniID) INNER JOIN events tb3 ON tb1.eventID = tb3.eventID)INNER JOIN login tb4 ON tb1.loginId = tb4.loginId ORDER BY tb1.er_reportID DESC";

                            $er_reports_query_result = mysqli_query($conn, $er_reports_query);
                            if(mysqli_num_rows($er_reports_query_result) > 0 ){
                                foreach($er_reports_query_result as $er_reports){
                                    ?>
                                    <tr >  
                                        <td><?= $er_reports['er_reportID']?></td>
                                        <td><?= $er_reports['client_uniID']?></td>
                                        <td><?= $er_reports['firstName']?> <?= $er_reports['mi']?> <?= $er_reports['lastName']?></td>
                                        <td><?= $er_reports['email_add']?></td>
                                        <td><?= $er_reports['eventID']?></td>
                                        <td><?= $er_reports['event_title']?></td>
                                        <td><?= $er_reports['reservationid']?></td>
                                        <td><?= $er_reports['date_and_time']?></td>
                                        <td><?= $er_reports['payment_method']?></td>
                                        <td><?= $er_reports['username']?></td>
                                        <td><?= $er_reports['status']?></td>
                                        <td><?= date('M d Y',  strtotime($er_reports['approved_date'])) ?></td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo '
                                    <tr>
                                        <td class="text-center" colspan="12"><h4>No Event Reservation Approved yet.</h4></td>
                                    </tr>
                                ';
                            }

                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ER_ReportsID</th>
                                <th>Client ID</th>
                                <th>Client Fullname</th>
                                <th>Client Email</th>
                                <th>Event ID</th>
                                <th>Event Title</th>
                                <th>Reservation ID</th>
                                <th>Date and Time</th>
                                <th>Payment Method</th>
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