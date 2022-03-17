<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Event Preview</title>

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
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 mb-4">
                    <h5 class="page-header">Event Preview</h5>
                    <a href="events.php">Create Event</a>
                    <hr class="dropdown-divider bg-dark" />
                </div>
            </div>

            <div class="row col-md-12 ">
              <?php
                $prev_status = "sample";

                $preview_event_query = "SELECT * FROM `events` WHERE `status`='$prev_status' ORDER BY `date_start` ";
                $preview_event_query_result = mysqli_query($conn, $preview_event_query);
                if(mysqli_num_rows($preview_event_query_result) > 0 ){
                    foreach($preview_event_query_result as $preview_event){
                      ?>
                      <div class="col-md-3 text-center py-2">
                        <img src="./upload/<?= $preview_event['event_img']?>" style="width: 250px; height: 250px;" alt="">
                      </div>
                      <div class="col-md-7 py-2">
                          <p class="text-normal"><?= $preview_event['header']?></p>

                          <h5 class="welcome-text"><?= $preview_event['event_title']?></h5>

                          <h6 class="text-normal"><?= $preview_event['date_and_time']?></h6>

                          <p class="text-normal"><?= $preview_event['reg_fee']?></p>

                          <p class="text-small"><?= $preview_event['desc_1']?></p>

                          <p class="text-small"><?= $preview_event['desc_2']?></p>

                          <button class="col-md-3 b-0 bg-coloured p-1 text-white">Register</button>    
                      </div>
                      <div class="col-md-2 text-center py-5">       
                        <div class="count-text-two"><?= date('d',  strtotime($preview_event['date_start'])) ?></div>
                        <div class="user-text-two"><?= date('M',  strtotime($preview_event['date_start'])) ?></div>
                      </div>
                      <hr class="dropdown-divider bg-dark" />
                      <?php
                    }
                  }
              ?>
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