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
    <section>
        <div class="content" >
            <div class="text-container">
                <h1 class="text-design">We Offer Solution</h1>
                <h1 class="text-design" style="padding-left: 15px;">We Are The Solution</h1>
            </div>
        </div>
    </section>
  
    <!-- Header End -->

    <div class="container-fluid bg-white pt-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-center m-3">
                    <h1 class="bg-white text-dark pe-3 header-font">Our Mission</h1>
                    <p class="desc-font-two">Unlocking potentials of Organizations Both in the public and private sectors that will open limitless opportunity to yield superior results</p>
                </div>

                <div class="col-md-12 text-center m-3">
                    <h1 class="bg-white text-dark pe-3 header-font">Our Vision</h1>
                    <p class="desc-font-two">Become the Leading business Solution provider in the Philippines.</p>
                </div>
            </div>
            <hr class="dropdown-divider bg-primary" />
        </div>
       
    </div>


    <!-- Service Sibol-PINOY Start -->
    <div class="container-fluid py-2 pb-3 bg-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-comment text-primary mb-4" aria-hidden="true"></i>
                            <!-- <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i> -->
                            <h5 class="mb-3 secondary-font-two">What We Do?</h5>
                            <p class="desc-font-two">We are here to help you establish your business on your own</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-3 col-sm-6">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3 secondary-font-two">Our Culture</h5>
                            <p class="desc-font-two">You’ll find our core values expressed in everything we do, whether it’s building our product, designing a new office, or planning team outings.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" >
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3 secondary-font-two">All Services</h5>
                            <p class="desc-font-two">We have different services we can offer depends on your need</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Sibol-PINOY End -->


    <!-- About Sibol-PINOY Start -->
    <div class="ParaImage bg-white" style="background-image: url('img/iso.png')"></div>
    

    <div class="container-fluid bg-white py-3">
        
    </div>
    <!-- About Sibol-PINOY End -->

    <!-- Sibol Start -->
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="text-center">
                <h1 class="mb-2 header-font">Grow With Us!</h1>
            </div>

            <div class="container-xxl py-3 mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4" >
                            <h1 class="text-center text-blue py-5 header-font-two">
                                <i class="fa fa-quote-left px-5 text-yellow"></i>
                                    <br> Quality is a choice<br> Choose to be better<br> Choose SPMC!<br>
                                <i class="fa fa-quote-right px-5 text-yellow"></i>     
                            </h1>
                        </div>
                        <div class="col-md-8 py-5">    
                            <div class="container">
                                <div class="embed-responsive embed-responsive-16by9" >
                                    <iframe class="embed-responsive-item col-lg-12 col-sm-12 about-video" src="video/video_2.mp4" sandbox></iframe>
                                </div>
                            </div>
                        </div>    
                    </div>
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