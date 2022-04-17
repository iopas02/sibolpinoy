<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Sent Box</title>
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
                <h4 class="page-header">Replied Queries</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check"       viewBox="0 0 16 16">
                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z"/>
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                            </svg>
                        </span>Email Sent

                        <div class="form-group float-end col-md-6">
                            <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th hidden>Client ID</th>
                                        <th>Sent ID</th>
                                        <th>To:</th>
                                        <th>Client Email</th>
                                        <th>Subject</th>
                                        <th>Reply</th>
                                        <th>Action</th>
                                        <th>Replied by</th>
                                        <th>Date Reply</th>
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
            
                                        $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `sent_email`" );
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_number_of_page = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_number_of_page - 1;

                                        $sent_table_query = "SELECT tb1.sentID, tb2.client_uniID, tb2.email_add, tb2.firstName, tb2.mi, tb2.lastName, tb3.username, tb1.subject, tb1.reply, tb1.action, tb1.date_reply FROM (sent_email tb1 INNER JOIN client tb2 ON tb1.client_uniID = tb2.client_uniID) INNER JOIN login tb3 ON tb1.loginId = tb3.loginId ORDER BY tb1.sentID DESC";

                                        $sent_table_query_result = mysqli_query($conn, $sent_table_query);
                                        if(mysqli_num_rows($sent_table_query_result) > 0 ){
                                            foreach($sent_table_query_result as $sent){
                                            ?>
                                                <tr>
                                                    <td hidden><?=$sent['client_uniID']?></td>
                                                    <td><?=$sent['sentID']?></td>
                                                    <td><?= $sent['firstName'] ?> <?= $sent['mi'] ?> <?= $sent['lastName'] ?></td>
                                                    <td><?=$sent['email_add']?></td>
                                                    <td><?=$sent['subject']?></td>
                                                    <td><?=$sent['reply']?></td>
                                                    <td><?=$sent['action']?></td>
                                                    <td><?=$sent['username']?></td>
                                                    <td><?= date('M d Y', strtotime($sent['date_reply'])) ?></td>
                                                </tr>

                                            <?php
                                            }
                                        }else{
                                            echo '
                                                <tr >
                                                    <td class="text-center" colspan="8"><h4>No Records Found.</h4></td>
                                                </tr>
                                            ';
                                        }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th hidden>Client ID</th>
                                        <th>Sent ID</th>
                                        <th>To:</th>
                                        <th>Client Email</th>
                                        <th>Subject</th>
                                        <th>Reply</th>
                                        <th>Action</th>
                                        <th>Replied by</th>
                                        <th>Date Reply</th>
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