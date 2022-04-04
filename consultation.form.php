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
                $service_id = mysqli_real_escape_string($conn, $_POST['consult']);
            }
        ?>
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
                        <input class="form-control form-control-sm" type="text" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">M.I.</label>
                        <input class="form-control form-control-sm" type="text" placeholder="M.I.">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Last Name</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Last Name">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Contact Number</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Contact Number">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Email Address</label>
                        <input class="form-control form-control-sm" type="email" placeholder="Email Address">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Organization</label>
                        <input class="form-control form-control-sm" type="email" placeholder="Organization">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Position</label>
                        <input class="form-control form-control-sm" type="email" placeholder="Position">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Consultation Date</label>
                        <input class="form-control form-control-sm" type="date" >
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Consultation Time</label>
                        <input class="form-control form-control-sm" type="time" >
                    </div>
                    <h5 class="modal-title" id="registrationTitle">Select Your Agenda</h5>
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