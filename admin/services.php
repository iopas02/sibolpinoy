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
    
        <!-- FOURTH GRAPH CARDS START HERE -->
        <div class="row col-md-12">
            <?php
                $services_reload_query = "SELECT * FROM `services` ";
                $services_reload_query_result = mysqli_query($conn, $services_reload_query );
                if(mysqli_num_rows($services_reload_query_result) > 0 ){
                    foreach($services_reload_query_result as $service){
                        ?>
                            <div class="col-md-6 mb-3">
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
                                                                <div class="accrodion-item mb-1">
                                                                    <h5 class="accordion-header second-header" id="<?=$category_services['category_title'] ?>">
                                                                        <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#compliance" aris-expanded="true" aria-controls="compliance">
                                                                            <?=$category_services['category_title'] ?>
                                                                        </button>
                                                                    </h5>
                                                                    <div class="accordion-collapse collapse" id="compliance">
                                                                        <div class="accordion-body">
                                                                            <ul>
                                                                                <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Automotive Quality Management System Standard (IATF 16949:2016)</li>
                                                                                <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Energy Management System (ISO 50001:2011)</li>
                                                                                <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Environmental Management System (ISO 14001:2015)</li>
                                                                                <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Food Safety Management System (ISO 22000:2005) & HACCP</li>
                                                                                <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Food Safety Systems Certification (FSSC 22000)</li>
                                                                                <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Information Security Management System (ISO 27001:2013)</li>
                                                                                <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Occupational Health & Safety Management System (OHSAS 18001)/ISO 45001:2016)</li>
                                                                                <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Quality Management System (ISO 9001:2015)</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
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
        <!-- FOURTH GRAPH CARDS END HERE -->


        <!-- Modal Start Here -->
        <!-- <div class="modal fade" id="ComplianceandStandards" aria-hidden="true" aria-labelledby="ComplianceandStandardsLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ComplianceandStandardsLabel">Compliance and Standards list</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li style="list-style-type: none;"><i class="bi bi-arrow-return-right"></i> Automotive Quality Management System Standard (IATF 16949:2016)</li>
                        <li style="list-style-type: none;"><i class="bi bi-arrow-return-right"></i>
                        Energy Management System (ISO 50001:2011)</li>
                        <li style="list-style-type: none;"><i class="bi bi-arrow-return-right"></i>
                        Environmental Management System (ISO 14001:2015)</li>
                        <li style="list-style-type: none;"><i class="bi bi-arrow-return-right"></i>
                        Food Safety Management System (ISO 22000:2005) & HACCP</li>
                        <li style="list-style-type: none;"><i class="bi bi-arrow-return-right"></i>
                        Food Safety Systems Certification (FSSC 22000)</li>
                        <li style="list-style-type: none;"><i class="bi bi-arrow-return-right"></i>
                        Information Security Management System (ISO 27001:2013)</li>
                        <li style="list-style-type: none;"><i class="bi bi-arrow-return-right"></i>
                        Occupational Health & Safety Management System (OHSAS 18001)/ISO 45001:2016)</li>
                        <li style="list-style-type: none;"><i class="bi bi-arrow-return-right"></i>
                        Quality Management System (ISO 9001:2015)</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#ComplianceandStandardsToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
                </div>
                </div>
            </div>
        </div>
            
        <div class="modal fade" id="ComplianceandStandardsToggle2" aria-hidden="true" aria-labelledby="examplComplianceandStandardsLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="examplComplianceandStandardsLabel2">Modal 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#ComplianceandStandards" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
                </div>
                </div>
            </div>
        </div> -->

        <!-- Modal End Here -->

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>