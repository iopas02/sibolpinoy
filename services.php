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
    <div class="container-fluid parallax-header">
        <video autoplay muted loop>
                <source src="video/video_4.mp4" type="video/mp4">
        </video>
    </div>
    <!-- Header End -->


    <!-- Services Start -->
    <div class="container-fluid py-5 bg-white category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-center text-dark px-3 secondary-font">Services</h6>
                <h1 class="mb-5 header-font">Check our Services</h1>
            </div>
            <!-- <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-1.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Web Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-2.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Graphic Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-3.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Video Editing</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Online Marketing</h5>
                            <small class="text-primary">49 Courses</small>
                        </div>
                    </a>
                </div>
            </div> -->

            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5 mb-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/business-consultancy.jpg" alt="" >
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                            <h5 class="mb-1 header-font">Business Consultancy</h5>
                            <p class="mb-1">In Sibol-Pinoy , we boast of our world class approach in helping organizations achieve their objectives. We just do not partner with our clients, we engage and become one with them in their journey to quality improvement.</p>
                            <h5 class="mb-1 text-dark second-header">What do we offer here?</h5>
                            <div class="accordion" id="businessConsultancy">
                                <div class="accrodion-item mb-1">
                                    <h5 class="accordion-header second-header" id="bc_header1">
                                        <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#compliance" aris-expanded="true" aria-controls="compliance">
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
                                        <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#performance" aris-expanded="true" aria-controls="compliance">
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
                                        <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#productivity" aris-expanded="true" aria-controls="compliance">
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
                        </div>    
                    </div>

                    <div class="row g-5 mb-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="position-relative h-100">
                                <img class="img-fluid" src="img/tech-solution.jpg" alt="">
                            </div>
                        </div>  
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                            <h5 class="mb-1 header-font">Technological Solutions</h5>
                            <p class="mb-1">Let Sibol-Pinoy help you provide complete customer solutions that span the IT life-cycle. Our technology experts will work with you to exceed the demand of high-growth technology in the vertical markets locally and around the world.</p>
                            <h5 class="mb-1 text-dark second-header">What do we offer here?</h5>
                            <div class="accordion" id="technological">
                                <div class="accrodion-item mb-1">
                                    <h5 class="accordion-header" id="ts_header1">
                                        <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#graphics" aris-expanded="true" aria-controls="compliance">
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
                                        <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#webDesigning" aris-expanded="true" aria-controls="compliance">
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
                                        <button class="accordion-button text-light" style="background: darkblue;" type="button" data-bs-toggle="collapse" data-bs-target="#documentServices" aris-expanded="true" aria-controls="compliance">
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
                        </div>  
                    </div>

                    <div class="row g-5 mb-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="position-relative h-100">
                                <img class="img-fluid" src="img/training-development.jpg" alt="">
                            </div>
                        </div>   
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                            <h5 class="mb-1 header-font">Training and Development</h5>
                            <p class="mb-1">As we envision our client to be self-dependent, we put emphasis on capacity-building and capability-building activities. Thus, Ideation Philippines has carefully designed and developed training modules and short-term courses aligned with global standards.</p>
                            <h5 class="mb-1 text-dark second-header">What do we offer here?</h5>
                        </div> 
                    </div>

                    <div class="row g-5 mb-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="position-relative h-100">
                                <img class="img-fluid" src="img/research-development.jpg" alt="" >
                            </div>
                        </div> 
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                            <h5 class="mb-1 header-font">Research Development</h5>
                            <p class="mb-1">Sibol Pinoy Management Consultancy highly engaged team members ar specialized in providing technical assistance providing professional development and management support to public and private sector organizations in order to maximize resources and value, while minimizing cost and risk.</p>
                            <h5 class="mb-1 text-dark second-header">What do we offer here?</h5>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Start -->


    <!-- Courses Start -->
    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Our Client</h6>
                <h1 class="mb-5 header-font">List of our Past Key Clients</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp py-2" data-wow-delay="0.1s">
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
                <div class="col-lg-3 col-md-6 wow fadeInUp py-2" data-wow-delay="0.2s">
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
                <div class="col-lg-3 col-md-6 wow fadeInUp py-2" data-wow-delay="0.3s">
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
                <div class="col-lg-3 col-md-6 wow fadeInUp py-2" data-wow-delay="0.4s">
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
                <div class="col-lg-3 col-md-6 wow fadeInUp py-2" data-wow-delay="0.5s">
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
                <div class="col-lg-3 col-md-6 wow fadeInUp py-2" data-wow-delay="0.6s">
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
                <div class="col-lg-3 col-md-6 wow fadeInUp py-2" data-wow-delay="0.7s">
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
                <div class="col-lg-3 col-md-6 wow fadeInUp py-2" data-wow-delay="0.8s">
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
        <div class="container wow fadeInUp">
            <div class="text-center">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Testimonial</h6>
                <h1 class="mb-5 header-font">Past Client Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative" >
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.1s">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client_1.PNG" style="width: 80px; height: 80px;">
                    <h5 class="mb-0 second-header">Mr. Juan Dela Cluz</h5>
                    <p>Y.M.C.A Manila</p>
                    <div class="testimonial-text text-dark text-center p-4 bg-light">
                    <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, adipisci!</p>
                    </div>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.2s">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client_2.PNG" style="width: 80px; height: 80px;">
                    <h5 class="mb-0 second-header">Mrs. Marites</h5>
                    <p>Virgen Milagrosa University Foundation</p>
                    <div class="testimonial-text text-dark text-center p-4 bg-light">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui aut tempore accusantium? Explicabo, quia reprehenderit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.3s">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/client_3.PNG" style="width: 80px; height: 80px;">
                    <h5 class="mb-0 second-header">Dr. Jose Marua</h5>
                    <p>Magna Prime Chemical Tech. inc.</p>
                    <div class="testimonial-text text-dark text-center p-4 bg-light">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis dicta quaerat quos, vel animi, fugiat similique ipsa illo ipsam, corrupti aspernatur adipisci. Nobis.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.4s"> 
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