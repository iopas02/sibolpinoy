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
    <div class="container-fluid ParaImage" style="background-image: url('img/consultation.jpg');"> 
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-sm-10 col-lg-8">
                <!-- <h1 class="display-3 text-white animated slideInDown">Sibol-PINOY</h1> -->
                <h4 class="text-dark header-font">Consultation</h4>
                <p class="mb-4 pb-2 text-dark secondary-font">Quality is a choice, Choose to be better, Choose <strong>SPMC</strong>.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Consultation services Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Our Services</h6>
                <h1 class="mb-5 header-font">We have 15 mins Free Consultation, Hurry and Book now!</h1>
            </div>
            <div class="row g-4 mt-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/business-consultancy.jpg" alt="">
                        </div>
                        <div class="text-center pt-4">
                            <h5 class="py-2 second-header">Business Consultancy</h5>
                        </div>
                        <div class="small-container">
                            <small>In Sibol-Pinoy, we boast of our world class approach in helping organizations achieve
                                their objectives. We just do not partner with our
                                clients, we engage and become one with them in
                                their journey to quality improvement.
                            </small>  
                        </div>
                        <div class="">
                            <h5 class="py-2 second-header">What do we offer here?</h5>
                        </div>
                        <div class="accordion" id="businessConsultancy">
                            <div class="accrodion-item mb-1">
                                <h5 class="accordion-header second-header" id="bc_header1">
                                    <button class="accordion-button text-light" style="background: darkblue;border-top-left-radius: 30px; border-bottom-right-radius: 30px" type="button" data-bs-toggle="collapse" data-bs-target="#compliance" aris-expanded="true" aria-controls="compliance">
                                        Compliance and Standards
                                    </button>
                                </h5>
                                <div class="accordion-collapse collapse" id="compliance">
                                    <div class="accordion-body">
                                        <ul>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Automotive Quality Management System Standard (IATF 16949:2016)</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Energy Management System (ISO 50001:2011)</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Environmental Management System (ISO 14001:2015)</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Food Safety Management System (ISO 22000:2005) & HACCP</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Food Safety Systems Certification (FSSC 22000)</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Information Security Management System (ISO 27001:2013)</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Occupational Health & Safety Management System (OHSAS 18001)/ISO 45001:2016)</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Quality Management System (ISO 9001:2015)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accrodion-item mb-1">
                                <h5 class="accordion-header second-header" id="bc_header2">
                                    <button class="accordion-button text-light" style="background: darkblue; border-top-left-radius: 30px; border-bottom-right-radius: 30px" type="button" data-bs-toggle="collapse" data-bs-target="#performance" aris-expanded="true" aria-controls="compliance">
                                        Performance Excellence
                                    </button>
                                </h5>
                                <div class="accordion-collapse collapse" id="performance">
                                    <div class="accordion-body">
                                        <ul>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Business Excellence Self-Assessment</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Third-Party BE Assessment</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Leadership Excellence</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Strategic Planning</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Customer-Focused Excellence</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Knowledge Management</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>HR Excellence</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Operations Excellence</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accrodion-item mb-1">
                                <h5 class="accordion-header second-header" id="bc_header3">
                                    <button class="accordion-button text-light" style="background: darkblue; border-top-left-radius: 30px; border-bottom-right-radius: 30px" type="button" data-bs-toggle="collapse" data-bs-target="#productivity" aris-expanded="true" aria-controls="compliance">
                                        Productivity & Quality
                                    </button>
                                </h5>
                                <div class="accordion-collapse collapse" id="productivity">
                                    <div class="accordion-body">
                                        <ul>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>P&Q Diagnosis</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>5s</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>SS</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>WIT</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Lean Management</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Labor-Management Cooperation</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-2">
                            <button class="text-dark bg-yellow border-0 py-2 px-2" style="border-top-left-radius: 15px; border-bottom-right-radius: 15px" data-bs-toggle="modal" type="button" data-bs-target="#businessForm">Book Consultation</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/tech-solution.jpg" alt="">
                        </div>
                        <div class="text-center pt-4">
                            <h5 class="py-2 second-header">Technological Solutions</h5>
                        </div>
                        <div class="small-container">
                            <small>Let Sibol-Pinoy help you provide complete
                                customer solutions that span the IT life-cycle.
                                Our technology experts will work with you to
                                exceed the demand of high-growth technology in
                                the vertical markets locally and around the world.
                            </small>   
                        </div>
                        <div class="">
                            <h5 class="py-2 second-header">What do we offer here?</h5>
                        </div>
                        <div class="accordion" id="technological">
                            <div class="accrodion-item mb-1">
                                <h5 class="accordion-header second-header" id="ts_header1">
                                    <button class="accordion-button text-light" style="background: darkblue; border-top-left-radius: 30px; border-bottom-right-radius: 30px" type="button" data-bs-toggle="collapse" data-bs-target="#graphics" aris-expanded="true" aria-controls="compliance">
                                        Graphics Services
                                    </button>
                                </h5>
                                <div class="accordion-collapse collapse" id="graphics">
                                    <div class="accordion-body">
                                        <ul>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Logo</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Flyer</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Design Services</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Banner design</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Ad Boxes design</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Brochure</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accrodion-item mb-1">
                                <h5 class="accordion-header second-header" id="ts_header2">
                                    <button class="accordion-button text-light" style="background: darkblue; border-top-left-radius: 30px; border-bottom-right-radius: 30px" type="button" data-bs-toggle="collapse" data-bs-target="#webDesigning" aris-expanded="true" aria-controls="compliance">
                                        Web Designing
                                    </button>
                                </h5>
                                <div class="accordion-collapse collapse" id="webDesigning">
                                    <div class="accordion-body">
                                        <ul>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Web Content</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Redesign Services</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Content Upload</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Technical Maintenance</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Customer-Focused Excellence</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Web Hosting</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Web Statistics</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accrodion-item mb-1">
                                <h5 class="accordion-header second-header" id="ts_header3">
                                    <button class="accordion-button text-light" style="background: darkblue; border-top-left-radius: 30px; border-bottom-right-radius: 30px" type="button" data-bs-toggle="collapse" data-bs-target="#documentServices" aris-expanded="true" aria-controls="compliance">
                                        Document Services
                                    </button>
                                </h5>
                                <div class="accordion-collapse collapse" id="documentServices">
                                    <div class="accordion-body">
                                        <ul>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Presentation Services</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Transcription</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Proofreading</li>
                                            <li style="list-style-type: none;"><i class="fa fa-check text-dark"></i>Conceptual Design</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-2">
                            <button class="text-dark bg-yellow border-0 py-2 px-2" style="border-top-left-radius: 15px; border-bottom-right-radius: 15px" data-bs-toggle="modal" type="button" data-bs-target="#technologyForm">Book Consultation</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/training-development.jpg" alt="">
                        </div>
                        <div class="text-center pt-4">
                            <h5 class="py-2 second-header">Training and Development</h5>
                        </div>
                        <div class="small-container">
                            <small>As we envision our client to be self-dependent, we put
                                emphasis on capacity-building and capability-building
                                activities. Thus, Ideation Philippines has carefully designed
                                and developed training modules and short-term courses
                                aligned with global standards.
                            </small>   
                        </div>
                        <div class="">
                            <h5 class="py-2 second-header">What do we offer here?</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/research-development.jpg" alt="">
                        </div>
                        <div class="text-center pt-4">
                            <h5 class="py-2 second-header">Research Development</h5>
                        </div>
                        <div class="small-container">
                            <small>Sibol Pinoy Management Consultancy highly engaged team members are
                            specialized in providing technical assistance providing
                            professional development and management support to public
                            and private sector organizations in order to maximize resources
                            and value, while minimizing cost and risk.
                        </small>
                        </div>
                        <div class="">
                            <h5 class="py-2 second-header">What do we offer here?</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Consultation Services End -->

    <!-- Question Form Start -->
    <div class="container-fluid bg-white py-5" id="about">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Message Us</h6>
                <h1 class="mb-5 header-font">Do You Have Any Question?</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/sibol-GIF.gif" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="bg-white text-start text-dark pe-3 secondary-font">You Can leave A Message</h6>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 py-3 text-light bg-blue" type="submit">Send Message</button>
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