<!DOCTYPE html>
<html lang="en">

<?php
    require "includes/header.php";
?>
 <title>Sibol-PINOY - About Us</title>
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
        $about = "active";
        require "includes/navbar.php";
        unset($about);
    ?>
    <!-- Navbar End -->


    <!-- Header Start -->
    <!-- <div class="container-fluid bg-primary py-5 mb-5">
  
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="container-fluid p-0 mb-5"> 
        <img class="img-fluid" src="img/new_carousel-1.jpg"  alt="">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container-fluid parallax-header">
        <video autoplay muted loop>
                <source src="video/head_banner_1.mp4" type="video/mp4">
        </video>
    </div>
  
    <!-- Header End -->


    <!-- Service Sibol-PINOY Start -->
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-comment text-primary mb-4" aria-hidden="true"></i>
                            <!-- <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i> -->
                            <h5 class="mb-3 second-header">What We Do?</h5>
                            <p>We are here to help you establish your business on your own</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3 second-header">Our Culture</h5>
                            <p>You’ll find our core values expressed in everything we do, whether it’s building our product, designing a new office, or planning team outings.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3 second-header">All Services</h5>
                            <p>We have different services we can offer depends on your need</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Sibol-PINOY End -->


    <!-- About Sibol-PINOY Start -->
    <div class="ParaImage bg-white" style="background-image: url('img/iso.png')"></div>
    
    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp text-center" data-wow-delay="0.2s">
                    <h1 class="bg-white text-dark pe-3 header-font">Our Mission</h1>
                    <!-- <h1 class="mb-4">Welcome to eLEARNING</h1> -->
                    <p class="mb-4">Unlocking potentials of Organizations Both in the public and private sectors that will open limitless opportunity to yield superior results</p>
                </div>

                <div class="col-lg-6 wow fadeInUp text-center" data-wow-delay="0.2s">
                    <h1 class="bg-white text-dark pe-3 header-font">Our Vision</h1>
                    <!-- <h1 class="mb-4">Welcome to eLEARNING</h1> -->
                    <p class="mb-4">Become the Leading business Solution provider in the Philippines.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white py-3">
        <div class="container">
            <div class="embed-responsive embed-responsive-16by9 wow fadeInUp" data-wow-delay="0.1s">
                <iframe class="embed-responsive-item col-lg-12 col-sm-12 about-video" src="video/video_2.mp4" sandbox></iframe>
            </div>
        </div>
    </div>
    <!-- About Sibol-PINOY End -->

    <!-- Sibol Start -->
<div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <!-- <h6 class="bg-white text-center text-dark px-3 secondary-font">Our Team</h6> -->
                <h1 class="mb-5 header-font">Grow With Us!</h1>
            </div>

            <div class="container-xxl py-5 mb-5 wow fadeInUp">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="text-center">
                                <img class="img-fluid border" src="img/spmc.gif" style="height:400px; width:350px;" alt="">
                            </div>
                            <!-- <div class="text-center">
                                <h5 class="mb-0 secondary-font">Red One</h5>
                                <small>Designation</small>
                            </div> -->
                        </div>
                        <div class="col-lg-6 py-5 wow fadeInUp" data-wow-delay="0.3s">    
                            <h1 class="text-center text-blue header-font">
                                <i class="fa fa-quote-left px-5 text-yellow"></i>
                                    <br> We offer solutions, We are the solution. <br>
                                <i class="fa fa-quote-right px-5 text-yellow"></i>     
                            </h1>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        
    <!-- Team Start -->
    <!-- <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Our Team</h6>
                <h1 class="mb-5 header-font">Our Team Profile</h1>
            </div>

            <div class="container-xxl py-5 mb-5 wow fadeInUp">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="text-center">
                                <img class="img-fluid border rounded-circle" src="img/ceo.jpg" style="height:400px; width:370px;" alt="">
                            </div>
                            <div class="text-center">
                                <h5 class="mb-0 secondary-font">Red One</h5>
                                <small>Designation</small>
                            </div>
                        </div>
                        <div class="col-lg-6 py-5 wow fadeInUp" data-wow-delay="0.3s">    
                            <h1 class="text-center text-blue header-font">
                                <i class="fa fa-quote-left px-5 text-yellow"></i>
                                    <br> I believe the children are our future, Teach them well and let them lead the way <br>
                                <i class="fa fa-quote-right px-5 text-yellow"></i>     
                            </h1>
                        </div>    
                    </div>
                </div>
            </div>


            <div class="row g-4 mt-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0 secondary-font">Green Two</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0 secondary-font">Blue Three</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0 secondary-font">Yellow Four</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0 secondary-font">Pink Five</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Team End -->
        

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