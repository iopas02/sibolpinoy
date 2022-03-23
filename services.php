<!DOCTYPE html>
<html lang="en">

<?php
    require "includes/header.php";
?>
 <title>Sibol-PINOY - Services</title>
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
        $service = "active";
        require "includes/navbar.php";
        unset($service);
    ?>
    <!-- Navbar End -->


    <!-- Header Start -->
    <section>
        <div class="sevicestContent" >
            <div class="textServiceContent">
                <div class="textTextService">Business Consultancy</div>
                <div class="textTextService">Technological Solutions</div>
                <div class="textTextService">Training and Development</div>
                <div class="textTextService">Research Development</div>
            </div>
        </div>
    </section>
    <!-- Header End -->


    <!-- Services Start -->
    <div class="container-fluid py-5 bg-white category">
        <div class="container">
            <div class="text-center" >
                <h6 class="text-center text-dark px-3 secondary-font">Services</h6>
                <h1 class="mb-5 header-font">Check our Services</h1>
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
                                                <img class="img-fluid" style="width: 450px;" src="admin/upload/<?= $serv_load['image']?>" alt="">
                                                <div class="bg-white text-center position-absolute py-2 px-3" style="margin-left: 85px; margin-top: -60px">
                                                    <h5 class="py-1 secondary-font"><?= $serv_load['service_title']?></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-10 mx-5 pt-3 small-container">
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
    <!-- Services Start -->


    <!-- Courses Start -->
    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="text-center" >
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Our Client</h6>
                <h1 class="mb-5 header-font">List of our Past Key Clients</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 py-2" >
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/client_1.PNG" alt="">
                        </div>
                        <div class="text-center p-4 pb-0 course-message">
                            <h5 class="mb-4 second-header">Y.M.C.A Manila</h5>
                            <p>Young Men’s Christian Association of Manila on ISO 9001:2015 Quality Management, Thank you for trusting us.</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Mr. ------</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>2.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>15 Participants</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 py-2">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/client_2.PNG" alt="">
                        </div>
                        <div class="text-center p-4 pb-0 course-message">
                            <h5 class="mb-4 second-header">Virgen Milagrosa University Foundation</h5>
                            <p>Thank you for trusting Us on your journey to ISO 9001:2015 certification.</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Mrs. ------</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>4.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>7 participants</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 py-2">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/client_3.PNG" alt="">
                        </div>
                        <div class="text-center p-4 pb-0 course-message">
                            <h5 class="mb-4 second-header">Magna Prime Chemical Tech. inc.</h5>
                            <p>Thank you for trusting Us on your journey Magna prime chemical tech. inc.</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Engr. -----</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>2.55 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>10 participants</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 py-2" >
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/client_4.PNG" alt="">
                        </div>
                        <div class="text-center p-4 pb-0 course-message">
                            <h5 class="mb-4 second-header">Romblon State University</h5>
                            <p>Thank you for trusting us on Quality Management, ISO 9001:2015.</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Engr. -----</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>2.55 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>25 participants</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 py-2">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/client_5.PNG" alt="">
                        </div>
                        <div class="text-center p-4 pb-0 course-message">
                            <h5 class="mb-4 second-header">Bureau Of Customs</h5>
                            <p>Thank you for trusting us In-house Program Orientation and Consultation ISO 9001:2015-Quality Management</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Mrs. -----</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>2.55 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>25 participants</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 py-2">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/client_6.PNG" alt="">
                        </div>
                        <div class="text-center p-4 pb-0 course-message">
                            <h5 class="mb-4 second-header">RCDC</h5>
                            <p>Thank you for trusting us in Training on Knowledge Management.</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Mr. -----</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>3.35 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>10 participants</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 py-2" >
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/client_7.PNG" alt="">
                        </div>
                        <div class="text-center p-4 pb-0 course-message">
                            <h5 class="mb-4 second-header">DEPED El Salvador</h5>
                            <p>Thank you for trusting us on General Orientation on ISO 9001:2015</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Mr. -----</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>3.35 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>15 participants</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 py-2">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/client_8.PNG" alt="">
                        </div>
                        <div class="text-center p-4 pb-0 course-message">
                            <h5 class="mb-4 second-header">National Economic Development Authority</h5>
                            <p>Thank you for trusting us on Quality Management, ISO 9001:2015.</p>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>Mr. -----</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>3.35 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>15 participants</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Courses End -->


    <!-- Testimonial Start -->
    <div class="container-fliud bg-white py-5" >
        <div class="container">
            <div class="text-center">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Testimonial</h6>
                <h1 class="mb-5 header-font">Past Client Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative" >
                <div class="testimonial-item text-center" >
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client_1.PNG" style="width: 80px; height: 80px;">
                    <h5 class="mb-0 second-header">Mr. Juan Dela Cluz</h5>
                    <p>Y.M.C.A Manila</p>
                    <div class="testimonial-text text-dark text-center p-4 bg-light">
                    <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, adipisci!</p>
                    </div>
                </div>
                <div class="testimonial-item text-center" >
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client_2.PNG" style="width: 80px; height: 80px;">
                    <h5 class="mb-0 second-header">Mrs. Marites</h5>
                    <p>Virgen Milagrosa University Foundation</p>
                    <div class="testimonial-text text-dark text-center p-4 bg-light">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui aut tempore accusantium? Explicabo, quia reprehenderit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center" >
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client_3.PNG" style="width: 80px; height: 80px;">
                    <h5 class="mb-0 second-header">Dr. Jose Marua</h5>
                    <p>Magna Prime Chemical Tech. inc.</p>
                    <div class="testimonial-text text-dark text-center p-4 bg-light">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis dicta quaerat quos, vel animi, fugiat similique ipsa illo ipsam, corrupti aspernatur adipisci. Nobis.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center"> 
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img\client_4.PNG" style="width: 80px; height: 80px;">
                    <h5 class="mb-0 second-header">Engr. Maria Fully Grace</h5>
                    <p>Romblon State University</p>
                    <div class="testimonial-text text-dark text-center p-4 bg-light">
                        <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et tenetur blanditiis repellat rem recusandae ex!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
        
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