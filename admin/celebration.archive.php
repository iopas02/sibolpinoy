<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Celebrattion Archive</title>
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
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <div class="container-fluid border-bottom border-3 border-dark mb-2">
                        <h4><a class="navbar-brand" href="event.archive">Event Archive</a></h4>
                        
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="celebration.archive">Celebration Archive</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-journal-minus"></i> </span> Celebration Archive List
                        <div class="form-group float-end col-md-6">
                            <input type="text" class="form-control inputSearch" id="inputSearch" placeholder="Search..">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Keeping ID</th>
                                        <th>Celbration</th>
                                        <th>Header</th>
                                        <th>Image</th>
                                        <th>Message 1</th>
                                        <th>Message 2</th>
                                        <th>Date Start</th>
                                        <th>Status</th>
                                        <th>Date Uploaded</th>
                                        <th>Log</th>
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
            
                                        $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `celebration_archive`" );
                                        $total_records = mysqli_fetch_array($result_count);
                                        $total_records = $total_records['total_records'];
                                        $total_number_of_page = ceil($total_records / $total_records_per_page);
                                        $second_last = $total_number_of_page - 1;

                                        $celeb_archive_query = "SELECT tb1.id, tb1.keepingID, tb1.commemoration, tb1.header, tb1.image, tb1.message1, tb1.message2, tb1.date_start, tb1.status, tb1.uploaded, tb2.username, tb1.action FROM celebration_archive tb1 INNER JOIN login tb2 ON tb1.loginId = tb2.loginId ORDER BY tb1.id DESC LIMIT 25";

                                        $celeb_archive_query_result = mysqli_query($conn, $celeb_archive_query);
                                        if(mysqli_num_rows($celeb_archive_query_result) > 0){
                                            foreach($celeb_archive_query_result as $celeb_archive){
                                                ?>
                                                    <tr>
                                                        <td><?= $celeb_archive['id']?></td>
                                                        <td><?= $celeb_archive['keepingID']?></td>
                                                        <td><?= $celeb_archive['commemoration']?></td>
                                                        <td><?= $celeb_archive['header']?></td>
                                                        <td><img src="./upload/<?= $celeb_archive['image'] ?>" class="h-50 w-50"></td>
                                                        <td><?= $celeb_archive['message1']?></td>
                                                        <td><?= $celeb_archive['message2']?></td>
                                                        <td><?= date('F d Y', strtotime($celeb_archive['date_start'])) ?></td>
                                                        <td><?= $celeb_archive['status']?></td>
                                                        <td><?= date('F d Y g:i a', strtotime($celeb_archive['uploaded'])) ?></td>
                                                        <td>
                                                            <button type="button" class="border-0 bg-white p-2" data-bs-toggle="popover" title="Last Admin Log" data-bs-content="<?= $celeb_archive['action']?> by <?=$celeb_archive['username']?>"><i class="bi bi-exclamation-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        }else{
                                            echo '
                                                <tr>
                                                    <td class="text-center" colspan="11"><h4>No Archive List</h4></td>
                                                </tr>
                                            ';
                                        }

                                    ?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Keeping ID</th>
                                        <th>Celbration</th>
                                        <th>Header</th>
                                        <th>Image</th>
                                        <th>Message 1</th>
                                        <th>Message 2</th>
                                        <th>Date Start</th>
                                        <th>Status</th>
                                        <th>Date Uploaded</th>
                                        <th>Log</th>
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

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <!-- Footer and JS Script End Here -->
  </body>
</html>