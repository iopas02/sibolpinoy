<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Consultation Inbox</title>
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

    <main class="mt-5 pt-3">
        <?php
            include_once 'layout.part/erro.php';
        ?>
        <div class="container-fluid p-4">
            <?php
                include_once 'layout.part/erro.php';
            ?>
            <div class="row">
            <div class="col-md-12 my-2">
                <h4 class="page-header">Clients Record</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-3 d-flex">
                <div class="col-md-6">
                    <!-- <label >Organization Frequency</label> -->
                    <div class="">
                        <div id="barchart_material" ></div>	
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- <label >Organization Frequency</label> -->
                    <div class="">
                    <div id="piechart"></div>	
                    </div>
                </div>
               
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-people"></i></span> Client List

                        <div class="form-group float-end col-md-6">
                            <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Client uniID</th>
                                        <th>First Name</th>
                                        <th>M.I.</th>
                                        <th>Last Name</th>
                                        <th>Email Add</th>
                                        <th>Contact No.</th>
                                        <th>Organization</th>
                                        <th>Position</th>
                                        <th >Date Register</th>
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
            
                                        $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `client`" );
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_number_of_page = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_number_of_page - 1;

                                        $status = 'Active';
                                        $clients_list_query = "SELECT * FROM `client` WHERE `status`='$status' ORDER BY c_count DESC LIMIT 25";
                                        $clients_list_query_result = mysqli_query($conn, $clients_list_query);
                                        if(mysqli_num_rows($clients_list_query_result) > 0){
                                            foreach($clients_list_query_result as $client_list){
                                                ?>
                                                <tr>
                                                    <td><?= $client_list['client_uniID'] ?></td>
                                                    <td><?= $client_list['firstName'] ?></td>
                                                    <td><?= $client_list['mi'] ?></td>
                                                    <td><?= $client_list['lastName'] ?></td>
                                                    <td><?= $client_list['email_add'] ?></td>
                                                    <td><?= $client_list['contact'] ?></td>
                                                    <td><?= $client_list['organization'] ?></td>
                                                    <td><?= $client_list['position'] ?></td>
                                                    <td><?= date('F d Y g:i a',  strtotime($client_list['date_register'])) ?></td>
                                                <form action="client.info.php" method="POST">
                                                     <td>
                                                        <input name="client_email" value="<?= $client_list['email_add'] ?>" hidden/>
                                                        <input name="client_id" value="<?= $client_list['client_uniID'] ?>" hidden/>  
                                                        <button type="submit" name="readclient" class="stats-white tooltip-test read" title="READ" id="read">
                                                            <i class="bi bi-arrow-repeat"></i>
                                                        </button>
                                                    </td>
                                                </form>    
                                
                                                </tr>

                                                <?php
                                            }
                                        }else{
                                            echo '
                                                <tr >
                                                    <td class="text-center" colspan="10"><h4>No Records Found.</h4></td>
                                                </tr>
                                            ';
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Client uniID</th>
                                        <th>First Name</th>
                                        <th>M.I.</th>
                                        <th>Last Name</th>
                                        <th>Email Add</th>
                                        <th>Contact No.</th>
                                        <th>Organization</th>
                                        <th>Position</th>
                                        <th >Date Register</th>
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

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>