<!DOCTYPE html>
<html lang="en">

<?php
    require "includes/header.php";
    require_once "includes/modal.php";
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
            <div class="consultTextContent">
                <h1 class="consultText"> <br> Quality is a choice<br> Choose to be better<br> Choose SPMC!<br></h1>
            </div>
        </div>
    </section>
    
    <!-- Header End -->


    <!-- Consultation services Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <?php
                include_once 'includes/error.php';
            ?>    

            <div class="text-center" >
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Our Services</h6>
                <h1 class="mb-5 header-font">We have 30 mins Free Consultation, Hurry and Book now!</h1>
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
                                                    <h5 class="py-2 secondary-font-two"><?= $serv_load['service_title']?></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-10 mx-5 small-container">
                                                <small class="smaller-text"><?= $serv_load['service_desc']?>
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
                                            <div class="text-center py-2">
                                                <form action="consultation.form" method="POST"> 
                                                    <input type="text" name="service_uniID" value="<?=  $serv_load['service_uniID'] ?>" hidden>
                                                    <button class="text-dark bg-yellow border-0 py-2 px-2" style="border-top-left-radius: 15px; border-bottom-right-radius: 15px" data-bs-toggle="modal" type="submit" name="consult">Book Consultation</button>
                                                </form>
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
                    <small>All fields with (*) are needed to fill up</small>
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
                            <small>Read SPMC <button type="button" class="border-0 bg-white text-primary terms">TERMS and PRIVACY POLICY</button> </small>
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
    <script>   
       $(document).ready(function(){
           $('.terms').on('click', function(){
               $('#termsmodal').modal('show');

           })
       })
   </script>
</body>

</html>