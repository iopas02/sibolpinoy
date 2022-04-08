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
    
        <div class="g-4 m-3">
            <div class="row col-md-12 d-flex justify-content-center align-items-center">
                <?php
                    $status = "Active";   
                    $serv_load_query = "SELECT * FROM `services` WHERE `status`='$status' ";
                    $serv_load_query_result = mysqli_query($conn, $serv_load_query);
                    if(mysqli_num_rows($serv_load_query_result)>0){
                        foreach($serv_load_query_result as $serv_load){
                            ?>
                                <div class="col-lg-6 col-md-6 mt-5">
                                    <div class="team-item">
                                        <div class="overflow-hidden text-center">
                                            <img class="img-fluid" style="width: 450px;" src="./upload/<?= $serv_load['image']?>" alt="">
                                            <div class="bg-white text-center position-absolute py-2 px-3" style="margin-left: 85px; margin-top: -60px">
                                                <h5 class="p-2 mt-1 secondary-font-two"><?= $serv_load['service_title']?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-10 mx-3 pt-3 small-container">
                                            <p class="smaller-text"><?= $serv_load['service_desc']?>
                                            </p>  
                                        </div>
                                        <div class="">
                                            <h5 class="py-2 mx-5 secondary-font-two">What do we offer here?</h5>
                                        </div>
                                        <div class="accordion col-md-10 mx-3" id="" >
                                            <?php
                                                $status = "Active";
                                                $service_uniDI = $serv_load['service_uniID'];
                                                $service_category_query = "SELECT * FROM `services_category` WHERE `service_uniID`= '$service_uniDI' AND `status`='$status' ";

                                                $service_category_query_result = mysqli_query($conn, $service_category_query);
                                                if(mysqli_num_rows($service_category_query_result) > 0){
                                                    foreach($service_category_query_result as $serv_cat ){
                                                        ?>
                                                            <div class="accrodion-item mb-1">
                                                            <?php
                                                                $str = $serv_cat['category_title'];
                                                                $new_str = str_replace(' ', '', $str);
                                                                $clear =  substr($new_str , 0,6);
                                                            ?>
                                                                <h5 class="accordion-header second-header" id="bc_header1">
                                                                    <button class="accordion-button text-light" style="background: darkblue;border-top-left-radius: 30px; border-bottom-right-radius: 30px" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $clear ?>" aris-expanded="true">
                                                                        <?= $serv_cat['category_title']?>
                                                                    </button>
                                                                </h5>
                                                                <?php
                                                                    $status = "Active";
                                                                    $cat_uniDI = $serv_cat['category_uniID'];
                                                                    $sub_cat_query = "SELECT * FROM `services_sub_category` WHERE `category_uniID`='$cat_uniDI' AND `status`='$status' ";
        
                                                                    $sub_cat_query_run = mysqli_query($conn, $sub_cat_query);
                                                                    if(mysqli_num_rows($sub_cat_query_run) > 0 ){
                                                                        foreach($sub_cat_query_run as $sub_cat){
                                                                            ?>
                                                                                <div class="accordion-collapse collapse px-4 smaller-text" id="<?= $clear ?>">
                                                                                    <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i><?= $sub_cat['sub_cat_title']?></li>
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
                                </div>

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