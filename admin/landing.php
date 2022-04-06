<!doctype html>
<html lang="en">
<!-- Loading -->

  <!-- Header Start -->
  <?php
    require "layout.part/admin.header.php";  
  ?>
  <!-- Header End -->
  
  <body>
  <title>Sibol-PINOY Admin Dashboard</title>
      <div class='loader_bg'>
          <div class='welcome'>
          <br><br>    
          <p>Loading...</p>
          </div>
          <div class='loader mt-5'></div>
      </div>

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
            <h4 class="page-header">Dashboard</h4>
            <hr class="dropdown-divider bg-dark" />
          </div>
      </div>

      <!-- FIRST FOUR CARDS START HERE -->
      <div class="row">

        <div class="col-md-3 mt-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center py-2 bg-coloured text-white card-text">
                Number of Visitors
              </div>
              <div class="col-md-6 bg-coloured text-white">
              <hr class="dropdown-divider bg-light" />
                  <div class="text-center py-3">
                    <img class="svg-img" src="svg/visitors.png" alt="">
                  </div>
              </div>
              <div class="col-md-6">
                <?php
                  $count_visitors = "SELECT * FROM `visitors`";
                  $query_results = mysqli_query($conn, $count_visitors);
                  if($query_results){
                    $total_visitors = mysqli_num_rows($query_results);
                  }
                ?>
                <h3 class="text-center pt-4 count-text"><?= number_format($total_visitors) ?></h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center py-2 bg-coloured text-white card-text">
                Total Number of Emails
              </div>
              <div class="col-md-6 bg-coloured text-white">
              <hr class="dropdown-divider bg-light" />
                  <div class="text-center py-3">
                    <img class="svg-img" src="svg/envelope.png" alt="">
                  </div>
              </div>
              <div class="col-md-6">
              <?php
                  $count_inbox = "SELECT * FROM `email`";
                  $count_inbox_run = mysqli_query($conn, $count_inbox);
                  $result_count = mysqli_num_rows($count_inbox_run);
                  
                  $count_er = "SELECT * FROM `event_reservation` ";
                  $count_er_run = mysqli_query($conn, $count_er);
                  $er_count = mysqli_num_rows($count_er_run);
                 
                  $counter_consult = "SELECT * FROM `consultation` ";
                  $counter_consult_run = mysqli_query($conn, $counter_consult);
                  $consult_count = mysqli_num_rows($counter_consult_run);
                 
                  $all_count = $result_count + $er_count + $consult_count;
                ?>
                <h3 class="text-center pt-4 count-text"><?= $all_count ?></h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center py-2 bg-coloured text-white card-text">
                Number of Clients
              </div>
              <div class="col-md-6 bg-coloured text-white">
              <hr class="dropdown-divider bg-light" />
                  <div class="text-center py-3">
                    <img class="svg-img" src="svg/user.png" alt="">
                  </div>
              </div>
              <div class="col-md-6">
                <?php
                  $client_query = "SELECT * FROM `client`";
                  $client_query_run = mysqli_query($conn, $client_query);
                  $client_count = mysqli_num_rows($client_query_run );
                ?>
                <h3 class="text-center pt-4 count-text"><?= $client_count ?></h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="container">
            <div class="row ">
               <?php
                  date_default_timezone_set("Asia/Manila");
                  $year = date("Y");
                  $month = date("M");
                  $date = date("d");
                  $time = date("g:i a");  
                ?>
              <div class="col-lg-12 text-center bg-coloured text-white page-header" style="border-top-right-radius: 45px;">
                <?php echo $year ?>
              </div>
              <div class="col-md-4 bg-coloured text-white" style="border-bottom-left-radius: 45px;">
              <hr class="dropdown-divider bg-light" />
                  <div class="text-center py-5">
                    <div class="count-text"><?php echo $date ?></div>
                    <div class="user-text"> <?php echo $month ?></div>
                  </div>
              </div>
              <div class="col-md-8">
                <h3 class="page-header">Event for Today</h3>

                <div class="card-text">
                  ISO 9001:2015 Requirements and Internal Quality Audit
                </div>

                <div class="pt-3 login-text">
                  <img src="svg/watch.svg" style="width: 18px; height: 18px;" alt="" /> <?php echo $time ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- FIRST FOUR CARDS END HERE -->

      <!-- SECOND TWO CARDS START HERE -->
      <div class="row">

        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <!-- Consultation services Start -->
            <div class="container">
                <div class="container">
                    <div class="py-1">
                        <h6 class="bg-white text-dark user-text">Services and Images</h6>
                    </div>
                    <div class="row g-4">
                      <?php
                        $services_query = "SELECT * FROM `services` WHERE `status`='Active'";
                        $service_result = $conn->query($services_query);
                        if($service_result->num_rows > 0){
                          foreach($service_result as $services){
                            ?>
                              <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                  <div class="team-item">
                                      <div class="overflow-hidden">
                                          <img class="prev-image" src="./upload/<?= $services['image']?>" alt="">
                                      </div>
                                      <div class="text-center">
                                          <h5 class="text-normal"><?= $services['service_title']?></h5>
                                      </div>
                                  </div>
                              </div>
                            <?php
                          }
                        }
                      ?>
                    </div>
                </div>
            </div>
            <!-- Consultation Services End -->
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="container pt-3 bg-light"">
              <div class="container">
                
                <?php
                  $header = $title = $message1 = $message2 = $img = '';
                  $status = 'published';
                  $celeb_reload_query = "SELECT * FROM `celebration` WHERE `status`= '$status' ";
                  $celeb_reload_query_result = mysqli_query($conn, $celeb_reload_query);
                  if(mysqli_num_rows($celeb_reload_query_result) > 0){
                      while($row = mysqli_fetch_assoc($celeb_reload_query_result)){
                        $header = $row['header']; 
                        $title = $row['commemoration'];
                        $message1 = $row['message1'];
                        $message2 = $row['message2'];
                        $img = $row['image'];
                      }
                  }
                ?>
                <div class="row g-5">
                    <div class="col-lg-6">
                        <h6 class="text-dark pe-3 secondary-font"><?= $header ?></h6>
                        <h1 class="header-font"><?= $title ?></h1>
                        <h5 class="second-header"><?= $message1 ?></h5>
                        <h6 class="second-header"><?= $message2 ?></h6>
                    </div>
                    <div class="col-lg-6" style="min-height: 300px;">
                        <div class="position-relative h-50">
                            <img class="img-fluid position-absolute w-100 h-100" src="./upload/<?= $img ?>" alt="" >
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- SECOND TWO CARDS END HERE -->

      <!-- THIRD EVENT CARDS START HERE -->  
      <div class="container-fluid bg-white py-5">
        <div class="container">
          <div class="text-center">
              <h3 class="text-left text-dark px-3 user-text">Upcoming Events</h3>
          </div>

          <div class="row col-md-12 d-flex justify-content-center align-items-center">
            <table class="table data-table" style="width: 80%">
              <thead hidden>
                <tr>
                  <th>Image</th>
                  <th>event Id</th>
                  <th>event title</th>
                  <th>event date</th>
                  <th>Payment</th>
                  <th>details</th>
                  <th>date</th>
                </tr>
              </thead>    
              <tbody>
                <?php
                  $tatus = 'published';
                  $load_event_query = "SELECT * FROM `events` WHERE `status`='$tatus' ORDER BY `date_start`";
                  $load_event_query_result = mysqli_query($conn, $load_event_query );
                  if(mysqli_num_rows($load_event_query_result) > 0 ){
                      foreach($load_event_query_result as $published_event){
                      ?>
                        <tr>
                          <td class="img-content">
                            <div class="">
                              <img src="./upload/<?= $published_event['event_img']?>" style="width: 250px; height: 210px;" alt="">
                            </div>
                          </td>
                          <td hidden><?= $published_event['eventID']?></td>
                          <td hidden><?= $published_event['event_title']?></td>
                          <td hidden><?= $published_event['date_and_time']?></td>
                          <td hidden><?= $published_event['reg_fee']?></td>
                          <td>
                            <div class="col-md-12 p-2">
                              <div class="text-one"> <?= $published_event['header']?> </div>
                              <div class="text-two"><?= $published_event['event_title']?></div>
                              <div class="text-one"><?= $published_event['date_and_time']?></div>
                              <div class="text-one"><?= $published_event['reg_fee']?></div>
                              <div class="smaller-text"><?= $published_event['desc_1']?></div>
                              <div class="smaller-text"><?= $published_event['desc_2']?></div>
                            </div>
                          </td>
                          <td class="date">
                            <div class="col-md-2 text-center py-3">       
                              <div class="count-text"><?= date('d',  strtotime($published_event['date_start'])) ?></div>
                              <div class="user-text"><?= date('M',  strtotime($published_event['date_start'])) ?></div>
                            </div>
                          </td>
                        </tr>
                      <?php
                    }
                  }    
                ?>
              </tbody>
              <tfoot hidden>
                <tr>
                    <th>Image</th>
                    <th>event Id</th>
                    <th>event title</th>
                    <th>event date</th>
                    <th>Payment</th>
                    <th>details</th>
                    <th>date</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <!-- THIRD EVENT CARDS END HERE -->

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    setTimeout(function(){
    $('.loader_bg').fadeToggle();
    }, 1500);
    </script>

    
  </body>
</html>