<!DOCTYPE html>
<html lang="en">

<?php
    require "includes/header.php";
?>
 <title>Sibol-PINOY - Contact</title>
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
        $contact = "active";
        require "includes/navbar.php";
        unset($contact);
    ?>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid parallax-header">
        <video autoplay muted loop>
                <source src="video/head_banner_2.mp4" type="video/mp4">
        </video>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fuid bg-white py-5">
        <div class="container">
            <div class="text-center" >
                <h6 class="text-center text-dark px-3 secondary-font">Contact Us</h6>
                <h1 class="mb-5 header-font">Get in touch with us!</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="second-header">Get In Touch</h5>
                    <p class="mb-4">If you have any questions about pricing, services, or anything else, we are here to help!</a></p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 text-light bg-blue" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-yellow"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-dark second-header">Office</h5>
                            <p class="mb-0">Taguig City, Philippines</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 text-light bg-blue" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-yellow"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-dark second-header">Mobile</h5>
                            <p class="mb-0">+63917 113 9078</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 text-light bg-blue" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-yellow"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-dark second-header">Email</h5>
                            <p class="mb-0">info@sibolpinoy.com</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div> -->
                <div class="col-lg-8 col-md-12" >
                 
                    <form action="controllers/mail.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name:">
                                    <label for="first_name">First Name*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                <button class="btn w-100 py-3 text-light bg-blue" type="submit" name="email_submit" >Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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