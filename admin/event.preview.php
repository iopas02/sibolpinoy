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

      <!-- THIS IS FOR SUB NAV-BAR FOR EVENT START HERE -->
      <?php
            require "layout.part/events.subnav.php";
        ?>
        <!-- THIS IS FOR SUB NAV-BAR FOR EVENT END HERE -->

        <div class="container-fluid">
          <form action="event.preview.php" method="POST">
            <div class="row col-md-12">
              <div class="col-md-8 mb-4">
                <h5 class="page-header">Event Preview</h5>
              </div>
              <div class="input-group col-md-4 mb-3">  
                  <select class="form-select" name="stats">
                    <option value="">Select Status</option>
                    <option value="sample">sample</option>
                    <option value="published">published</option>
                    <option value="unpublished">unpublished</option>
                  </select>
                  <button class="bg-coloured text-white p-2" type="submit" id="button-addon2" name="status_search"> <i class="bi bi-binoculars"></i> Button</button>
              </div>
            </div>
          </form>

          <div class="row col-md-12 ">
            <?php
              $prev_status = '';
              if(isset($_POST['status_search'])){
                $prev_status =  mysqli_real_escape_string($conn, $_POST['stats']);
              }
              
              $preview_event_query = "SELECT * FROM `events` WHERE `status`='$prev_status' ORDER BY `date_start`";
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