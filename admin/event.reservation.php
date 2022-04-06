<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Event Reservation</title>
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
                <h4 class="page-header">Event Reservation</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-calendar-check"></i></span> Event Reservation List

                        <div class="form-group float-end col-md-6">
                            <input type="text" class="form-control form-control-sm inputSearch" id="inputSearch" placeholder="Search..">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Entry ID</th>
                                        <th hidden>clientID</th>
                                        <th hidden>Name</th>
                                        <th hidden>MI</th>
                                        <th hidden>Lastname</th>
                                        <th>From</th>
                                        <th hidden>Email</th>
                                        <th hidden>Contatc</th>
                                        <th hidden>Organization</th>
                                        <th hidden>Position</th>
                                        <th>Reservation ID</th>
                                        <th hidden>Event ID</th>
                                        <th>Event Name</th>
                                        <th hidden>Date</th>
                                        <th hidden>Info</th>
                                        <th hidden>SS Payment</th>
                                        <th hidden>Payment</th>
                                        <th>Status</th>
                                        <th hidden>Action</th>
                                        <th>Date Send</th>
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
            
                                        $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `event_reservation`" );
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_number_of_page = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_number_of_page - 1;

                                        $event_reservation_query = "SELECT tb1.entryID, tb2.client_uniID, tb2.firstName, tb2.mi, tb2.lastName, tb2.contact, tb2.organization, tb2.position, tb1.email_add, tb1.reservationID, tb3.eventID, tb3.event_title, tb3.date_and_time, tb3.reg_fee, tb1.ss_payment, tb1.payment_method, tb1.date_registered, tb1.status, tb1.action FROM( event_reservation tb1 INNER JOIN client tb2 ON tb1.email_add = tb2.email_add) INNER JOIN events tb3 ON tb1.eventID = tb3.eventID ORDER BY entryID DESC";

                                        $event_reservation_query_result = mysqli_query($conn, $event_reservation_query);
                                        if(mysqli_num_rows($event_reservation_query_result) > 0){
                                            foreach($event_reservation_query_result as $event_reservation){
                                                ?>
                                                <tr class="
                                                    <?php
                                                        $a = $event_reservation['action'];

                                                        if($a == "New"){
                                                            echo 'card-text';
                                                        }else{
                                                            echo 'card-tex2';
                                                        }   
                                                ?>
                                                ">
                                                    <td><?= $event_reservation['entryID'] ?></td>
                                                    <td hidden><?= $event_reservation['client_uniID'] ?></td>
                                                    <td hidden><?= $event_reservation['firstName'] ?></td>
                                                    <td hidden><?= $event_reservation['mi'] ?></td>
                                                    <td hidden><?= $event_reservation['lastName'] ?></td>
                                                    <td><?= $event_reservation['firstName'].' '.$event_reservation['mi'].' '.$event_reservation['lastName'] ?></td>
                                                    <td hidden><?= $event_reservation['email_add'] ?></td>
                                                    <td hidden><?= $event_reservation['contact'] ?></td>
                                                    <td hidden><?= $event_reservation['organization'] ?></td>
                                                    <td hidden><?= $event_reservation['position'] ?></td>
                                                    <td><?= $event_reservation['reservationID'] ?></td>
                                                    <td hidden><?= $event_reservation['eventID'] ?></td>
                                                    <td><?= $event_reservation['event_title'] ?></td>
                                                    <td hidden><?= $event_reservation['date_and_time'] ?></td>
                                                    <td hidden><?= $event_reservation['reg_fee'] ?></td>
                                                    <td hidden><?= $event_reservation['ss_payment'] ?></td>
                                                    <td hidden><?= $event_reservation['payment_method'] ?></td>
                                                    <td><?= $event_reservation['status'] ?></td>
                                                    <td hidden><?= $event_reservation['action'] ?></td>
                                                    <td><?= date('M d Y',  strtotime($event_reservation['date_registered'])) ?></td>
                                                    <td>
                                                        <form action="e.reservation.info" method="POST">
                                                            <input name="entryID" value="<?= $event_reservation['entryID'] ?>" hidden>
                                                            <button type="submit" class="stats-white tooltip-test" title="READ" id="read" name="read">
                                                                <i class="bi bi-arrow-repeat"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Entry ID</th>
                                        <th hidden>clientID</th>
                                        <th hidden>Name</th>
                                        <th hidden>MI</th>
                                        <th hidden>Lastname</th>
                                        <th>From</th>
                                        <th hidden>Email</th>
                                        <th hidden>Contatc</th>
                                        <th hidden>Organization</th>
                                        <th hidden>Position</th>
                                        <th>Reservation ID</th>
                                        <th hidden>Event ID</th>
                                        <th>Event Name</th>
                                        <th hidden>Date</th>
                                        <th hidden>Info</th>
                                        <th hidden>SS Payment</th>
                                        <th hidden>Payment</th>
                                        <th>Status</th>
                                        <th hidden>Action</th>
                                        <th>Date Send</th>
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
            </div>
        </div>

        <!-- Modal Start Here -->
        <div class="modal fade" id="evenReservtInfo" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Event Reservation Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>   
                    <div class="modal-body">
                        <form action="comptroller/category.control.php" method="POST">
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    <label for="subcat_uniID" class="col-form-label">Sub-Category uniID</label>
                                    <input type="text" class="form-control" readonly name="subcat_uniID" id="subcat_uniID">
                                </div>
                                <div class="col-md-6">
                                    <label for="subcat_title" class="col-form-label">Sub-Category Title</label>
                                    <input type="text" class="form-control" readonly name="subcat_title" id="subcat_title">
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
                                        <label for="update_sub_cat_stats" class="form-label">Action 1</label>
                                        <input type="text" class="form-control" id="update_sub_cat_stats" name="update_sub_cat_stats" value="update sub-category status">

                                    </div>
                                </div>
                    <!---- THIS IS HIDDEN PART OF THE CREATE SERVICES START HERE --->

                                <div class="my-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn bg-coloured text-white" type="submit" name="sub_cat_update_stats" ><i class="bi bi-vector-pen"></i> Update Status</button>
                                </div>
                            </div>    
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
            $('.read').on('click', function(){
                $('#evenReservtInfo').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#subcat_uniID').val(data[0]);
                $('#subcat_title').val(data[5]);
            })
        })
 
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>