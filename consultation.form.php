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
            <div class="consultTextContent">
                <h1 class="consultText"> <br> Quality is a choice<br> Choose to be better<br> Choose SPMC!<br></h1>
            </div>
        </div>
    </section>
    
    <!-- Header End -->
        <?php

            if(isset($_POST['consult'])){
                $service_id = mysqli_real_escape_string($conn, $_POST['service_uniID']);
                $status = 'Active';

                $append_service_query = "SELECT * FROM `services` WHERE `service_uniID`='$service_id' AND `status`='$status' ";
                $append_result = $conn->query($append_service_query);
                if($append_result->num_rows > 0){
                    while($data = $append_result->fetch_assoc()){
                        $service_uniID = $data['service_uniID'];
                        $service_name = $data['service_title'];
                    }
                }

            }
        ?>
        <div class="row col-md-12">
            
            <div class="pt-3 text-center">
                <img class="__logo" src="img/logo.png" alt="">
            </div>
            <div class="text-center">
                <h5 class="modal-title" id="registrationTitle" value=""><?= $service_name ?></h5>
            </div>

            <div class="container-fluid">
                <div class="col-md-12 p-5 d-flex justify-content-center align-items-center">
                    <form action="controllers/consultation.control.php" method="POST">
                        <div class="row col-md-12 mb-3">
                            <div class="col-md-5">
                                <input class="form-control form-control-sm" type="text" name="services" value="<?= $service_uniID?>" hidden>
                                <input class="form-control form-control-sm" type="text" name="services_name" value="<?= $service_name?>" hidden>
                                <label for="" class="form-label">First Name</label>
                                <input class="form-control form-control-sm" type="text" name="firstName" placeholder="First Name" required>
                            </div>
                            <div class="col-md-2">
                                <label for="" class="form-label">M.I.</label>
                                <input class="form-control form-control-sm" type="text" name="mi" placeholder="M.I." required>
                            </div>
                            <div class="col-md-5">
                                <label for="" class="form-label">Last Name</label>
                                <input class="form-control form-control-sm" type="text" name="lastName" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="row col-md-12 mb-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Email Address</label>
                                <input class="form-control form-control-sm" type="email" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Contact Number</label>
                                <input class="form-control form-control-sm" type="text" name="contact" placeholder="Contact Number">
                            </div>  
                        </div>
                        
                        <div class="row col-md-12 mb-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Organization</label>
                                <input class="form-control form-control-sm" type="text" name="orgs" placeholder="Organization" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Position</label>
                                <input class="form-control form-control-sm" type="text" name="position" placeholder="Position" required>
                            </div>
                        </div>

                        <div class="row col-md-12 mb-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Consultation Date</label>
                                <input class="form-control form-control-sm" type="date" name="date" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Consultation Time</label>
                                <input class="form-control form-control-sm" type="time" name="time" required>
                            </div>
                        </div>
                      
                        <h5 class="modal-title" id="registrationTitle">Select Your Agenda</h5>
                        <?php
                            $service_uniID;
                            $status = 'Active';
                            $append_categories_query = "SELECT * FROM `services_category` WHERE `service_uniID`='$service_uniID' AND `status`='$status' ";
                            $category_results = $conn->query($append_categories_query);
                            if($category_results->num_rows > 0){
                                foreach($category_results as $service_cat){
                                    ?>
                                        <div class="form-check form-switch">
                                            <h6 class="py-2 second_header"><?= $service_cat['category_title'] ?></h6>
                                            <?php
                                                $cat_uniID = $service_cat['category_uniID'];
                                                $status = 'Active';
                                                $append_sub_cat_query = "SELECT * FROM `services_sub_category` WHERE `category_uniID`='$cat_uniID' AND `status`='$status' ";
                                                $sub_cat_result = $conn->query($append_sub_cat_query);
                                                if($sub_cat_result->num_rows > 0 ){
                                                    foreach($sub_cat_result as $sub_cat){
                                                        ?>
                                                            <input class="form-check-input" type="checkbox" name=sub_cat[] id="flexSwitchCheckDefault" value="<?= $sub_cat['sub_cat_uniID'] ?>">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault"><?= $sub_cat['sub_cat_title'] ?></label><br>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                           
                                        </div>

                                    <?php
                                }
                            } 
                        ?>
                       
                        <div class="mb-1">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
                        </div>
                        <input type="text" name="status" value="pending" hidden>
                        <input type="text" name="action" value="New" hidden>
                        <div class="col-12">
                            <small>SPMC <a href=#>TERMS</a> and <a href="#">PRIVACY POLICY</a></small>
                            <div class="form-check">
                                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                                <label class="form-check-label" for="invalidCheck3">
                                    Agree to terms and conditions
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn bg-blue text-white" name="book_me">Book Me</button>
                        </div>
                    </form>
                </div>    
            </div> 
        </div>

        </div>
       
        
       
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