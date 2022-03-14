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
    
        <!-- SERVICES CARDS START HERE -->
        <div class="row col-md-12">
            <?php
                $services_reload_query = "SELECT * FROM `services` ";
                $services_reload_query_result = mysqli_query($conn, $services_reload_query );
                if(mysqli_num_rows($services_reload_query_result) > 0 ){
                    foreach($services_reload_query_result as $service){
                        ?>  
                           
                            <div class="col-md-6 mb-3" 
                            <?php
                                if($service['status'] != 'Active'){
                                    echo 'hidden';
                                }else{
                                    echo '';
                                }
                            ?>
                             >
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row col-md-12">
                                            <button class="bg-white border-0">
                                            <img src="./upload/<?= $service['image']?>" class="h-100 w-100">    
                                            </button>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="row col-md-12">
                                                <div class="col-md-4">
                                                    <label for="business_comsultancy_title" class="col-form-label">Service ID:</label>
                                                    <input type="text" class="form-control" id="business_comsultancy_title" readonly value="<?= $service['service_uniID'] ?>">
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="business_comsultancy_title" class="col-form-label">Title:</label>
                                                    <input type="text" class="form-control" id="business_comsultancy_title" readonly value="<?= $service['service_title'] ?>">
                                                </div>  
                                            </div>
                                            <div class="mb-3">
                                                <label for="business_comsultancy_description" class="col-form-label">Description:</label>
                                                <textarea class="form-control" id="business_comsultancy_description" rows="5" readonly placeholder="<?= $service['service_desc'] ?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="accordion" id="businessConsultancy">
                                                <?php
                                                    $service_uniDI = $service['service_uniID'];
                                                    $service_category_query = "SELECT * FROM `services_category` WHERE `service_uniID` = '$service_uniDI '";

                                                    $service_category_query_result = mysqli_query($conn, $service_category_query);
                                                    if(mysqli_num_rows($service_category_query_result) > 0 ){
                                                        foreach($service_category_query_result as $category_services){ 
                                                            ?>
                                                                <div class="accrodion-item mb-1" 
                                                                <?php
                                                                    if($category_services['status'] != 'Active'){
                                                                        echo 'hidden';
                                                                    }else{
                                                                        echo '';
                                                                    }
                                                                ?>
                                                                
                                                                >
                                                                    <h5 class="accordion-header second-header" id="<?=$category_services['category_title'] ?>">
                                                                        <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#compliance" aris-expanded="true">
                                                                            <?=$category_services['category_title'] ?>
                                                                        </button>
                                                                    </h5>
                                                                    <?php
                                                                        $cat_uniDI = $category_services['category_uniID'];
                                                                        $sub_cat_query = "SELECT * FROM `services_sub_category` WHERE `category_uniID`='$cat_uniDI' ";

                                                                        $sub_cat_query_run = mysqli_query($conn, $sub_cat_query);
                                                                        if(mysqli_num_rows($sub_cat_query_run) > 0 ){
                                                                            foreach($sub_cat_query_run as $sub_cat){
                                                                                ?>
                                                                                <div class="accordion-collapse collapse" id="compliance">
                                                                                    <div class="accordion-body">
                                                                                        <ul>
                                                                                            <li style="list-style-type: none;"><i class="bi bi-dot"></i> <?= $sub_cat['sub_cat_title']?></li>
                                                                                        </ul>
                                                                                    </div>
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
                                        <div class="row col-md-12 p-2">
                                            <div class="col-md-6">
                                            <button type="button" class="btn bg-primary text-white"><i class="bi bi-pen-fill"></i> Edit</button>
                                            <button type="button" class="btn bg-danger text-white"><i class="bi bi-trash"></i> Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                    }
                }            
            ?>
           
           

        </div>
        <!-- SERVICES CARDS END HERE -->


    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>