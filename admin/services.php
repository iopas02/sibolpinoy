<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Services Page</title>            

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
    
        <!-- THIS IS FOR SUB NAV-BAR FOR SERVICES TOOLS START HERE -->
        <?php
            require "layout.part/services.subnav.php";
        ?>
        <!-- THIS IS FOR SUB NAV-BAR FOR SERVICES TOOLS END HERE -->
    
  

        <div class="row col-md-12 my-3">
            <?php
                $status = "Active";
                $services_reload_query = "SELECT * FROM `services` WHERE `status`='$status' ";
                $services_reload_query_result = mysqli_query($conn, $services_reload_query);
                if(mysqli_num_rows($services_reload_query_result) > 0 ){
                     foreach($services_reload_query_result as $service){
                        ?>
                            <div class="col-md-6">
                                <div class="position-relative text-center">
                                    <img class="img-fluid" src="./upload/<?= $service['image']?>" alt="" style="width: 550px; height: 350px;" >
                                </div>
                                <div class="col-md-4" hidden>
                                    <label for="business_comsultancy_title" class="col-form-label">Service ID:</label>
                                    <input type="text" class="form-control" id="business_comsultancy_title" readonly value="<?= $service['service_uniID'] ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="mb-1 header-font"><?= $service['service_title'] ?></h5>
                                <p class="mb-1"><?= $service['service_desc'] ?></p>
                                <h5 class="mb-1 text-dark second-header">What do we offer here?</h5>
                                <div class="accordion" id="">
                                    <?php
                                        $status = "Active";
                                        $service_uniDI = $service['service_uniID'];
                                        $service_category_query = "SELECT * FROM `services_category` WHERE `service_uniID` = '$service_uniDI' AND `status`='$status' ";

                                        $service_category_query_result = mysqli_query($conn, $service_category_query);
                                        if(mysqli_num_rows($service_category_query_result) > 0 ){
                                            foreach($service_category_query_result as $category_services){ 
                                                ?>
                                                    <div class="accrodion-item mb-1">
                                                        <h5 class="accordion-header second-header" id="bc_header1">
                                                        <?php
                                                            $str = $category_services['category_title'];
                                                            $new_str = str_replace(' ', '', $str);
                                                            $clear =  substr($new_str , 0,6);
                                                        ?>
                                                            <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $clear ?>" aris-expanded="true" aria-controls="compliance">
                                                                <?=$category_services['category_title'] ?>
                                                            </button>
                                                        </h5>
                                                        <?php
                                                            $status = "Active";
                                                            $cat_uniDI = $category_services['category_uniID'];
                                                            $sub_cat_query = "SELECT * FROM `services_sub_category` WHERE `category_uniID`='$cat_uniDI' AND `status`='$status' ";

                                                            $sub_cat_query_run = mysqli_query($conn, $sub_cat_query);
                                                            if(mysqli_num_rows($sub_cat_query_run) > 0 ){
                                                                foreach($sub_cat_query_run as $sub_cat){
                                                                    ?>
                                                                        <div class="accordion-collapse px-4 mt-1 collapse" id="<?= $clear ?>">    
                                                                        <i class="bi bi-check2-circle"></i> <?= $sub_cat['sub_cat_title']?> 
                                                                        </div>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                <?php
                                            }
                                        }
                                    ?>

                                </div>
                            </div>
                        <?php
                    }
                 }    
            ?>     
        </div>
    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>