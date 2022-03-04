<!DOCTYPE html>
<html lang="en">

<?php
    require "includes/header.php";
?>
 <title>Sibol-PINOY - Events</title>
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
       <div class="container-fluid parallax-header">
        <video autoplay muted loop>
                <source src="video/head_banner_3.mp4" type="video/mp4">
        </video>
    </div>
    <!-- Header End -->


    <!-- Events Start -->
    
    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Upcoming Events</h6>
                <h1 class="mb-5 header-font">Check Our Upcoming Events</h1>
            </div>
      
            <div id="carouselExampleIndicators" class="carousel slide wow fadeInUp" data-wow-delay="0.2s" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" style="background-color: blue;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" style="background-color: blue;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-5">
                            <div class="col-lg-6" style="min-height: 400px;">
                                <div class="position-relative" >
                                    <div class="testimonial-item text-center" >
                                        <img class="img-fluid w-100 h-100" src="img/event_1.jpg">
                                    </div>
                                </div>                     
                            </div>
                            <div class="col-lg-6">
                                <h5 class="bg-white text-dark pe-3 secondary-font">Avail UP TO 50% OFF on any of the following Training-Workshops below:</h5>
                                <h6 class="bg-white text-dark pe-3 second-header">𝐈𝐒𝐎 𝟗𝟎𝟎𝟏:𝟐𝟎𝟏𝟓 𝐑𝐞𝐪𝐮𝐢𝐫𝐞𝐦𝐞𝐧𝐭𝐬 𝐚𝐧𝐝 𝐈𝐧𝐭𝐞𝐫𝐧𝐚𝐥 𝐐𝐮𝐚𝐥𝐢𝐭𝐲 𝐀𝐮𝐝𝐢𝐭: March 5, 6, 12 & 13, 2022 | 9AM-5PM</h6>

                                <p class="mb-4">Registration Rates:</p>
                                <p class="mb-4">Regular Fee: P2,000.00</p>
                                <p class="mb-4">Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022</p>
                                <p class="mb-4">Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.</p>
                                <a class="btn btn-dark py-3 px-5 mt-2" data-bs-toggle="modal" data-bs-target="#registration">For Registration</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row g-5">
                            <div class="col-lg-6" style="min-height: 400px;">
                                <div class="position-relative">
                                    <div class="testimonial-item text-center">
                                        <img class="img-fluid w-100 h-100" src="img/event_2.jpg">
                                    </div>
                                </div>                     
                            </div>
                            <div class="col-lg-6">
                                <h5 class="bg-white text-dark pe-3 secondary-font">Avail UP TO 50% OFF on any of the following Training-Workshops below:</h5>
                                <h6 class="bg-white text-dark pe-3 second-header">𝐒𝐭𝐫𝐚𝐭𝐞𝐠𝐢𝐜 𝐏𝐥𝐚𝐧𝐧𝐢𝐧𝐠 𝐚𝐧𝐝 𝐑𝐢𝐬𝐤-𝐁𝐚𝐬𝐞𝐝 𝐌𝐚𝐧𝐚𝐠𝐞𝐦𝐞𝐧𝐭: March 7 - 11, 2022 | 5PM-9PM</h6>
                                <p class="mb-4">Registration Rates:</p>
                                <p class="mb-4">Regular Fee: P2,000.00</p>
                                <p class="mb-4">Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022</p>
                                <p class="mb-4">Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.</p>
                                <a class="btn btn-dark py-3 px-5 mt-2" data-bs-toggle="modal" data-bs-target="#registration">For Registration</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Events Start -->

    <!-- About Start -->
    <div class="container-fluid bg-light py-5" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-start text-dark pe-3 secondary-font">We Celebrate on this Month</h6>
                    <h1 class="mb-4 header-font">Happy Mother's Day</h1>
                    <h5 class="mb-4 second-header">A simple Message and Celebration From Sibol-Pinoy</h5>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/celebrate_1.gif" alt="" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Previous Events Start -->
    <div class="container-fliud bg-white py-5" >
        <div class="container wow fadeInUp">
            <div class="text-center">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Previous Events</h6>
                <h1 class="mb-5 header-font">For The Previous Events</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative" >
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.1s">
                    <img class="p-2 mx-auto mb-3" src="img/past_event_1.png">
                    <h5 class="mb-0 second-header">ISO 9001:2015 Requirements and Internal Quality Audit</h5>
                    <p>February 19, 20, 26 & 27, 2022 | 9AM-5PM </p>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.2s">
                    <img class=" p-2 mx-auto mb-3" src="img/past_event_2.png">
                    <h5 class="mb-0 second-header">Strategic Planning and Risk-Based Management</h5>
                    <p>February 21-25, 2022 | 5PM-9PM</p>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.3s">
                    <img class=" p-2 mx-auto mb-3" src="img/past_event_3.png">
                    <h5 class="mb-0 second-header">Building Organizational Resilience 101:Risk Management and Root Cause Analysis</h5>
                    <p>16 February 2022 from 5PM to 8PM.</p>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.4s"> 
                    <img class="p-2 mx-auto mb-3" src="img/past_event_4.png">
                    <h5 class="mb-0 second-header">Building Organizational Resilience: Introducing Tools and Techniques in Risk Management and Root Cause Analysis</h5>
                    <p> January 16, 2022, 9AM - 12NN</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Previous Events End -->

    <!-- MOdal Services Start -->
        <!--Registration Form Modal Start -->
        <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="registrationTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="pt-3 text-center">
                        <img class="__logo" src="img/logo.png" alt="">
                    </div>
                    <div class="text-center">
                        <h5 class="modal-title" id="registrationTitle">Events Registration Form</h5>
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
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Select Program</label>
                                    <select id="inputState" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Building Organizational Resilience 101:Risk Management and Root Cause Analysis</option>
                                        <option>Building Organizational Resilience: Introducing Tools and Techniques in Risk Management and Root Cause Analysis</option>
                                    </select>
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
                                    <button type="submit" class="btn btn-primary">Sign in</button>
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
        <!-- Registration Form Modal End -->

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