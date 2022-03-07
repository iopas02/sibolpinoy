<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Admin Inbox</title>

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
                <h4 class="page-header">Services Categories</h4>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <!-- FOURTH GRAPH CARDS START HERE -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row col-md-12">
                            <button class="bg-white border-0">
                                <img src="../img/business-consultancy.jpg" class="h-100 w-100" alt="">    
                            </button>
                        </div>
                        <div class="row col-md-12">
                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <label for="business_comsultancy_title" class="col-form-label">Service ID:</label>
                                    <input type="text" class="form-control" id="business_comsultancy_title" readonly value="1">
                                </div>
                                <div class="col-md-8">
                                    <label for="business_comsultancy_title" class="col-form-label">Title:</label>
                                    <input type="text" class="form-control" id="business_comsultancy_title" readonly value="Business Consultancy">
                                </div>  
                            </div>
                            <div class="mb-3">
                                <label for="business_comsultancy_description" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="business_comsultancy_description" rows="5" readonly placeholder="In Sibol-Pinoy , we boast of our world class approach in helping organizations achieve their objectives. We just do not partner with our clients, we engage and become one with them in their journey to quality improvement"></textarea>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="accordion" id="businessConsultancy">
                            <label for="business_comsultancy_description" class="col-form-label">Business Consultancy Categories:</label>
                                <div class="mb-1">
                                    <button class="col-md-12 text-left btn text-dark bg-light" data-bs-toggle="modal" data-bs-target="#ComplianceandStandards" type="button">
                                        Compliance and Standards
                                    </button>
                                </div>
                                <div class="mb-1">
                                    <button class="col-md-12 text-left btn text-dark bg-light" type="button">
                                        Performance Excellence
                                    </button>
                                </div>
                                <div class="mb-1">
                                    <button class="col-md-12 text-left btn text-dark bg-light" type="button" >
                                        Productivity & Quality
                                    </button>
                                </div>
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
            <div class="col-md-6 mb-3">

            <div class="card h-100">
                <div class="card-header">
                <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                Affiliation Graph
                </div>
                <div class="card-body">
                <!-- <canvas class="chart" width="400" height="200"></canvas> -->
                <div id="piechart"  style="width: 600px; height: 400px;"></div>
                </div>
            </div>
            </div>
        </div>
        <!-- FOURTH GRAPH CARDS END HERE -->

        <!-- Modal Start Here -->
        <div class="modal fade" id="ComplianceandStandards" aria-hidden="true" aria-labelledby="ComplianceandStandardsLabel" tabindex="-1">
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
        </div>

        <!-- Modal End Here -->

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>