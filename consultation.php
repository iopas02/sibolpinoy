<!DOCTYPE html>
<html lang="en">

<?php
    require "includes/header.php";
?>
 <title>Sibol-PINOY - Consultation</title>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php
        require "includes/navbar.php";
    ?>
    <!-- Navbar End -->


    <!-- Header Start -->

      <section>
        <div class="consultContent" >
            <div class="indexTextContent">
                <h1 class="indexText">Unlocking Potential</h1>
                <h1 class="indexText" style="padding-left: 25px;">Building Opportunities</h1>
            </div>
        </div>
    </section>
    
    <!-- Header End -->


    <!-- Consultation services Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center" >
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Our Services</h6>
                <h1 class="mb-5 header-font">We have 15 mins Free Consultation, Hurry and Book now!</h1>
            </div>
            
            <div class="row g-4 mt-3">
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
                                                <img class="img-fluid" src="admin/upload/<?= $serv_load['image']?>" alt="">
                                                <div class="bg-white text-center position-absolute py-2 px-3" style="margin-left: 85px; margin-top: -60px">
                                                    <h5 class="py-2 second-header"><?= $serv_load['service_title']?></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-10 mx-5 small-container">
                                                <small><?= $serv_load['service_desc']?>
                                                </small>  
                                            </div>
                                            <div class="">
                                                <h5 class="py-2 mx-5 second-header">What do we offer here?</h5>
                                            </div>
                                            <div class="accordion col-md-10 mx-5" id="" >
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
                                                                                    <div class="accordion-collapse collapse px-4" id="<?= $clear ?>">
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
                                            <div class="text-center py-2">
                                                <button class="text-dark bg-yellow border-0 py-2 px-2" style="border-top-left-radius: 15px; border-bottom-right-radius: 15px" data-bs-toggle="modal" type="button" data-bs-target="#businessForm">Book Consultation</button>
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
    </div>
    <!-- Consultation Services End -->

    <!-- Question Form Start -->
    <div class="container-fluid bg-white py-5" id="about">
        <div class="container">
            <div class="text-center">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Message Us</h6>
                <h1 class="mb-5 header-font">Do You Have Any Question?</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute py-5" src="img/sibol-GIF.gif" alt="" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="bg-white text-start text-dark pe-3 secondary-font">You Can leave A Message</h6>
                    <form action="controllers/mail.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name:">
                                    <label for="first_name">First Name*</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="mi" name="mi" placeholder="M.I.">
                                    <label for="mi">M.I.*</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                    <label for="last_name">Last Name*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="cemail" placeholder="Email Address">
                                    <label for="email">Email Address*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number">
                                    <label for="contact">Contact Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="orgs" name="orgs" placeholder="Organization/Company">
                                    <label for="orgs">Organization/Company*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="position" name="position" placeholder="Position">
                                    <label for="position">Position*</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                    <label for="subject">Subject*</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 120px"></textarea>
                                    <label for="message">Message*</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <small>SPMC <a href=#>TERMS</a> and <a href="#poirty">PRIVACY POLICY</a></small>
                                <div class="form-check">
                                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                                    <label class="form-check-label" for="invalidCheck3">
                                        Agree to terms and conditions
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 py-3 text-light bg-blue" type="submit" name="consult_submit" >Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Question Form End -->

    <!-- MOdal Services Start -->

        <!--Business Form Modal Start -->
        <div class="modal fade" data-bs-backdrop="static" id="businessForm" tabindex="-1" role="dialog" aria-labelledby="registrationTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="pt-3 text-center">
                        <img class="__logo" src="img/logo.png" alt="">
                    </div>
                    <div class="text-center">
                        <h5 class="modal-title" id="registrationTitle">Business Consultation Form</h5>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">First Name</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="eg. Juan">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Last Name</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="eg. Dela Cruz">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Mobile Number</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="eg. +62942*******">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Email Address</label>
                                    <input class="form-control form-control-sm" type="email" placeholder="eg. xxxxx@gmail.com">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Gender</label>
                                    <select id="inputState" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Female</option>
                                        <option>Male</option>
                                        <option>LGBTQ</option>
                                    </select>
                                </div>
                                <div class="form-check form-switch">
                                    <h6 class="py-2 second_header">Compliance and Standards</h6>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Automotive Quality Management System Standard (IATF 16949:2016)</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Energy Management System (ISO 50001:2011)</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Environmental Management System (ISO 14001:2015)</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Food Safety Management System (ISO 22000:2005) & HACCP</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Food Safety Systems Certification (FSSC 22000)</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Information Security Management System (ISO 27001:2013)</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Occupational Health & Safety Management System (OHSAS 18001)/ISO 45001:2016)</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Quality Management System (ISO 9001:2015)</label><br>
                                </div>
                                <div class="form-check form-switch">
                                    <h6 class="py-2 second_header">Performance Excellence</h6>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Business Excellence Self-Assessment</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Third-Party BE Assessment</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Leadership Excellence</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Strategic Planning</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Customer-Focused Excellence</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Knowledge Management</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">HR Excellence</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Operations Excellence</label><br>
                                </div>
                                <div class="form-check form-switch">
                                    <h6 class="py-2 second_header">Productivity & Quality</h6>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">P&Q Diagnosis</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">5s</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">SS</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">WIT</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Lean Management</label><br>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Labor-Management Cooperation</label><br>
                                </div>
                                <div class="mb-1">
                                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Book Me</button>
                                </div>
                            </form>
                        </div>
                        <div class="container">
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-blue text-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Business Form Modal End -->

        <!--Technol0gy Form Modal Start -->
        <div class="modal fade" data-bs-backdrop="static" id="technologyForm" tabindex="-1" role="dialog" aria-labelledby="registrationTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="pt-3 text-center">
                    <img class="__logo" src="img/logo.png" alt="">
                </div>
                <div class="text-center">
                    <h5 class="modal-title" id="registrationTitle">Technology Solution Form</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">First Name</label>
                                <input class="form-control form-control-sm" type="text" placeholder="eg. Juan">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Last Name</label>
                                <input class="form-control form-control-sm" type="text" placeholder="eg. Dela Cruz">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Mobile Number</label>
                                <input class="form-control form-control-sm" type="text" placeholder="eg. +62942*******">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Email Address</label>
                                <input class="form-control form-control-sm" type="email" placeholder="eg. xxxxx@gmail.com">
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Gender</label>
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>Female</option>
                                    <option>Male</option>
                                    <option>LGBTQ</option>
                                </select>
                            </div>
                            <div class="form-check form-switch">
                                <h6 class="py-2 second_header">Graphics Services</h6>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Logo</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Flyer</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Design Services</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Banner design</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Ad Boxes design</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Brochure</label><br>
                            </div>
                            <div class="form-check form-switch">
                                <h6 class="py-2 second_header">Web Designing</h6>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Web Content</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Redesign Services</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Content Upload</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Technical Maintenance</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Customer-Focused Excellence</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Web Hosting</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Web Statistics</label><br>
                            </div>
                            <div class="form-check form-switch">
                                <h6 class="py-2 second_header">Document Services</h6>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Presentation Services</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Transcription</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Proofreading</label><br>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Conceptual Design</label><br>
                            </div>
                            <div class="mb-1">
                                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Book Me</button>
                            </div>
                        </form>
                    </div>
                    <div class="container">
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-blue text-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div>
        <!-- technology Form Modal End -->

    <!-- MOdal Services End -->


    <!-- Footer Start -->
    <?php
        require "includes/footer.php";
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>