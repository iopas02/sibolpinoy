<!DOCTYPE html>
<html lang="en">

<?php
    require "includes/header.php";
?>
 <title>Sibol-PINOY</title>
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
        $index = "active";
        require "includes/navbar.php";
        unset($index);
    ?>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/new_carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                            <!-- <h1 class="display-3 text-white animated slideInDown">Sibol-PINOY</h1> -->
                                <h4 class="text-white animated slideInDown header-font">Take Your Business To The Next Level</h4>
                                <p class="text-white mb-4 pb-2 secondary-font">Unlocking potentials, building oppurtunities.</p>
                                <a href="#check-services" class="btn py-md-3 px-md-5 me-3 animated slideInLeft text-light bg-blue">Read More</a>
                                <a href="#" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/new_carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                            <!-- <h1 class="display-3 text-white animated slideInDown">Sibol-PINOY</h1> -->
                                <h4 class="text-white animated slideInDown header-font">Take Your Business To The Next Level</h4>
                                <p class="text-white mb-4 pb-2 secondary-font">Unlocking potentials, building oppurtunities.</p>
                                <a href="#check-services" class="btn py-md-3 px-md-5 me-3 animated slideInLeft text-light bg-blue">Read More</a>
                                <a href="#" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="ontainer-fluid bg-white py-5 mt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-comments text-primary mb-4"></i>
                            <h5 class="mb-3 second-header">Passion & Commitment</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nostrum autem, ab vel voluptates molestias?</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-box-open text-primary mb-4"></i>
                            <h5 class="mb-3 second-header">Honesty & Openness</h5><br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, iste.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h5 class="mb-3 second-header">Dedicated Team</h5><br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate neque obcaecati voluptas possimus qui labore impedit cumque! Esse.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hand-holding-heart text-primary mb-4"></i>
                            <h5 class="mb-3 second-header">Practical Approach</h5><br>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel suscipit mollitia quis commodi! Accusantium autem ipsa explicabo saepe quas quae?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- sibol-PINOY parallax video Start-->
    <div class="container-fluid paraVideo">
        <video autoplay muted loop>
            <source src="video/video_2.mp4" type="video/mp4">
        </video>
    </div>
    <!-- sibol-PINOY parallax video End-->

    <!-- About Start -->
    <div class="container-fluid bg-white py-5" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="video/head_banner_1.gif" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="bg-white text-start text-dark pe-3 secondary-font">About Us</h6>
                    <h1 class="mb-4 header-font">Welcome to Sibol-PINOY Management Consultancy</h1>
                    <p class="mb-4">Sibol-PINOY is a training and management consultancy which seeks to make expensive tools and techniques on productivity, 
                    quality and performance excellence within the reach of micro, small and medium enterprises, including the government and NGOs. What we promotes are the following:</p>
                    
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-dark me-2"></i><a href="#check-promotes">Brave and Conquer</a></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-dark me-2"></i><a href="#check-promotes">Organized Goals</a></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-dark me-2"></i><a href="#check-promotes">Productivity and Result</a></p>
                        </div>
                        <!-- <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-dark me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-dark me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-dark me-2"></i>International Certificate</p>
                        </div> -->
                    </div>
                    <a class="btn py-3 px-5 mt-2 text-light bg-blue" href="about.php">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


   <!-- Categories Start -->
    <div class="ontainer-fluid bg-white py-5 category" id="services">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-center text-dark px-3 secondary-font">Services</h6>
                <h1 class="mb-5 header-font">Services Categories</h1>
            </div>

            <div class="row g-4 mt-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/business-consultancy.jpg" alt="" >
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0 secondary-font">Business Consultancy</h5>
                            <!-- <br><small>In Sibol-Pinoy, we boast of our world class approach in helping organizations achieve
                            their objectives. We just do not partner with our
                            clients, we engage and become one with them in
                            their journey to quality improvement</small> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/tech-solution.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0 secondary-font">Technological solutions</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/training-development.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0 secondary-font">Training & development</h5>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/research-development.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0 secondary-font">Research development</h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->

    <!-- WHY CHOOSE SIBOL -->
    <div class="ontainer-fluid bg-white py-5" id="check-services">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="bg-white text-center text-dark px-3 header-font">
                CHECK OUR SERVICES</h2>
                <h6 class="mb-5 secondary-font">Here at SPMC we always present our services at its best</h6>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <!-- <img class="img-fluid" src="img/team-1.jpg" alt=""> -->
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="py-2 second-header">Business Consultancy</h5><br>
                            <p>In Sibol-Pinoy, we boast of our world class approach in helping organizations achieve
                            their objectives. We just do not partner with our
                            clients, we engage and become one with them in
                            their journey to quality improvement</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                           <!--  <img class="img-fluid" src="img/team-2.jpg" alt=""> -->
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="py-2 second-header">Technological Solutions</h5>
                            <p>Let Sibol-Pinoy help you provide complete
                            customer solutions that span the IT life-cycle.
                            Our technology experts will work with you to
                            exceed the demand of high-growth technology in
                            the vertical markets locally and around the world.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.05s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <!-- <img class="img-fluid" src="img/team-3.jpg" alt=""> -->
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="py-2 second-header">Training and Development</h5>
                            <p>As we envision our client to be self-dependent, we put
                            emphasis on capacity-building and capability-building
                            activities. Thus, Ideation Philippines has carefully designed
                            and developed training modules and short-term courses
                            aligned with global standards.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <!-- <img class="img-fluid" src="img/team-4.jpg" alt=""> -->
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="py-2 second-header">Research Development</h5>
                            <p>Sibol Pinoy Management Consultancy highly engaged team members are
                                specialized in providing technical assistance providing
                                professional development and management support to public
                                and private sector organizations in order to maximize resources
                                and value, while minimizing cost and risk.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WHY CHOOSE SIBOL -->


    <!-- WHAT SIBOL PROMOTES -->
    <div class="ontainer-fluid bg-white py-5" id="check-promotes">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <h2 class="bg-white text-center text-dark px-3 header-font">WHAT WE PROMOTES?</h2>
                <h6 class="mb-5 secondary-font">Sibol-Pinoy Management Consultancy promotes</h6>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp">
                <div class="testimonial-item text-center">
                    <h5 class="my-4 second-header">Organized Goals</h5>
                    <div class="testimonial-text text-dark text-center p-4">
                        <p class="mb-0">Don’t wait until you’ve reached your goals to be proud of yourself. Be proud of each step you take to get to the top.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <h5 class="my-4 second-header">Productivity and Result</h5>
                    <div class="testimonial-text text-dark text-center p-4">
                        <p class="mb-0">It is not about how much time you have, It is How you use it. Here at SPMC we ensure productivity at every minute that passes.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <h5 class="my-4 second-header">Brave and Conquer</h5>
                    <div class="testimonial-text text-dark text-center p-4">
                        <p class="mb-0">Have the confidence, Look up and see the new light in the midst of problems. Conquer new Opportunities with SPMC.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
        

    <?php
    require "includes/footer.php";
    ?>


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