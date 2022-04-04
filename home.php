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


    <!-- Header Start -->
    <section>
        <div class="indexContent" >
            <div class="indexTextContent">
                <h1 class="indexText">Unlocking Potential</h1>
                <h1 class="indexText">Building Opportunities</h1>
            </div>
        </div>
    </section>
    <!-- Header End -->


    <!-- Service Start -->
    <div class="container-fluid bg-white py-5 mt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-comments text-primary mb-4"></i>
                            <h5 class="mb-3 secondary-font-two">Passion & Commitment</h5>
                            <!-- <p class="smaller-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nostrum autem, ab vel voluptates molestias?</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" >
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-box-open text-primary mb-4"></i>
                            <h5 class="mb-3 secondary-font-two">Honesty & Openness</h5>
                            <!-- <p class="smaller-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, iste.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" >
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h5 class="mb-3 secondary-font-two">Dedicated Team</h5>
                            <!-- <p class="smaller-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate neque obcaecati voluptas possimus qui labore impedit cumque! Esse.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" >
                    <div class="text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hand-holding-heart text-primary mb-4"></i>
                            <h5 class="mb-3 secondary-font-two">Practical Approach</h5>
                            <!-- <p class="smaller-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel suscipit mollitia quis commodi! Accusantium autem ipsa explicabo saepe quas quae?</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="container-fluid bg-white py-5" id="about">
        <div class="container">
                <div class="row justify-content-center align-item-center">
                    <div class="col-md-10 text-center" >
                        <!-- <h6 class="bg-white text-start text-dark pe-3 secondary-font">About Us</h6> -->
                        <h1 class="mb-4 header-fonts">Welcome to Sibol-PINOY Management Consultancy</h1>
                        <p class="mb-4 desc-font">Sibol-PINOY is a training and management consultancy which seeks to make expensive tools and techniques on productivity, 
                        quality and performance excellence within the reach of micro, small and medium enterprises, including the government and NGOs. What we promotes are the following:</p>
                        
                        <a class="btn py-2 px-5 mt-1 text-light bg-blue" href="about.php">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- About End -->


   
    <div class="ontainer-fluid bg-white py-5 category" id="services">
        <!-- Categories Start -->
        <div class="container-fluid bg-white py-5 category" id="services">
            <div class="container">
                <div class="text-center">
                    <h6 class="text-center text-dark px-3 secondary-font">Services</h6>
                    <h1 class="mb-5 header-font">Here at SPMC we always present our services at its best</h1>
                </div>

                <div class="container col-md-12">

                    <div class="row col-md-12 d-flex justify-content-center align-items-center">
                        <?php
                            $serv_reload_query = "SELECT * FROM `services` WHERE `status`='Active' ";
                            $serv_reload_query_result = mysqli_query($conn, $serv_reload_query);
                            if(mysqli_num_rows($serv_reload_query_result)>0){
                                foreach($serv_reload_query_result as $service_offer){
                                    ?>
                                        <div class="col-md-5 p-4">
                                            <a class="position-relative d-block text-center overflow-hidden" href="services.php">
                                                <img class="" style="width: 380px; height: 230px;" src="admin/upload/<?= $service_offer['image']?>" alt="">
                                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin-left: 45px;">
                                                    <h5 class="m-0 secondary-font-two"><?= $service_offer['service_title']?></h5>
                                                </div>
                                            </a>
                                            <p class="desc-font-two pt-3" style="height: 150px;"><?= $service_offer['service_desc']?></p>
                                        </div>

                                    <?php
                                }
                            }
                        ?>
                    </div>
                    
            
                </div>
            </div>
        </div>
        <!-- Categories End -->



    <!-- Events Start -->

        <div class="container-fluid bg-white py-5">
            <div class="container">
                <div class="text-center">
                    <h6 class="bg-white text-center text-dark px-3 secondary-font">Upcoming Events</h6>
                </div>
                
                <div class="row col-md-12">
                    <?php
                        $tatus = 'published';
                        $load_event_query = "SELECT * FROM `events` WHERE `status`='$tatus' ORDER BY `date_start`";
                        $load_event_query_result = mysqli_query($conn, $load_event_query );
                        if(mysqli_num_rows($load_event_query_result) > 0 ){
                            foreach($load_event_query_result as $published_event){
                                ?>
                                    <div class="col-md-3 text-center py-2 img-content">
                                        <img src="admin/upload/<?= $published_event['event_img']?>" style="width: 250px; height: 210px;" alt="">
                                    </div>
                                    <div class="col-md-7 py-2 event-content">
                                        <div class="text-one"> <?= $published_event['header']?> </div>
                                        <div class="text-two"><?= $published_event['event_title']?></div>
                                        <div class="text-one"><?= $published_event['date_and_time']?></div>
                                        <div class="text-one"><?= $published_event['reg_fee']?></div>
                                        <div class="smaller-text"><?= $published_event['desc_1']?></div>
                                        <div class="smaller-text"><?= $published_event['desc_2']?></div>
    
                                    </div>
                                    <div class="col-md-2 text-center py-3 date">       
                                        <div class="date-text"><?= date('d',  strtotime($published_event['date_start'])) ?></div>
                                        <div class="month-text"><?= date('M',  strtotime($published_event['date_start'])) ?></div>
                                    </div>
                                    <hr class="dropdown-divider bg-dark" />
                                <?php
                            }
                        }    

                    ?>
                </div>
                
            </div>
        </div>
    </div> 
    <!-- Events Start -->
        
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