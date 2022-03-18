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
        $event = "active";
        require "includes/navbar.php";
        unset($event);
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
            
            <div class="row col-md-12">
                <?php
                    $tatus = 'published';
                    $load_event_query = "SELECT * FROM `events` WHERE `status`='$tatus' ORDER BY `date_start`";
                    $load_event_query_result = mysqli_query($conn, $load_event_query );
                    if(mysqli_num_rows($load_event_query_result) > 0 ){
                        foreach($load_event_query_result as $published_event){
                            ?>
                                <div class="col-md-3 text-center py-2">
                                    <img src="admin/upload/<?= $published_event['event_img']?>" style="width: 250px; height: 210px;" alt="">
                                </div>
                                <div class="col-md-7 py-2">
                                    <div class="text-one"> <?= $published_event['header']?> </div>
                                    <div class="text-two"><?= $published_event['event_title']?></div>
                                    <div class="text-one"><?= $published_event['date_and_time']?></div>
                                    <div class="text-one"><?= $published_event['reg_fee']?></div>
                                    <div class="smaller-text"><?= $published_event['desc_1']?></div>
                                    <div class="smaller-text"><?= $published_event['desc_2']?></div>

                                    <button class="col-md-3 b-0 bg-blue p-1 mt-2 text-white">Register</button>    
                                </div>
                                <div class="col-md-2 text-center py-3">       
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
            
            <div class="d-flex justify-content-center align-items-center">
                <table id="example" class="table data-table" style="width: 70%">
                    <thead>
                        <tr hidden>
                            <th class="col-md-4">Image</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if(isset($_GET['page_no']) && $_GET['page_no'] !=''){
                                $page_no = $_GET['page_no'];
                            }else{
                                $page_no = 1;
                            }

                            $total_records_per_page = 5;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2";

                            $result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM `events`" );
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_number_of_page = ceil($total_records / $total_records_per_page);
                            $second_last = $total_number_of_page - 1;

                            $prev_event_query = "SELECT * FROM `events` WHERE `status`='unpublished' ORDER BY `date_start` LIMIT $offset,$total_records_per_page";
                            $prev_event_query_result = mysqli_query($conn,$prev_event_query);
                            if(mysqli_num_rows($prev_event_query_result) > 0){
                                foreach($prev_event_query_result as $prev_event){
                                    ?>
                                        <tr>
                                            <td class="col-md-4">
                                                <img class="" style="width: 250px; height: 150px;" src="admin/upload/<?= $prev_event['event_img']?>">
                                            </td>
                                            <td>
                                                <h5 class="mb-0 second-header"><?= $prev_event['event_title']?></h5>
                                                <p><?= $prev_event['date_and_time']?> </p>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr hidden>
                            <th>Image</th>
                            <th>Description</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-center align-items-center">
            <ul class="pagination pull-right">
                <!-- <li class="pull-left btn btn-default disabled">Showing Page <?php echo $page_no." of ".$total_number_of_page;?></li> -->
                <li class=" p-2 <?php if($page_no <= 1) { echo "disabled";}?>">
                    <a <?php if($page_no > 1) { echo "href='?page_no=$previous_page'";} ?>>Previous</a>
                </li>

                <?php
                    if($total_number_of_page <=10){

                        for($counter = 1; $counter <=$total_number_of_page;$counter++){
                            if($counter == $page_no){
                                echo "<li class='active p-2'><a> $counter </a></li>";
                            }else{
                                echo "<li class='p-2'><a href='?page_no=$counter'> $counter </a></li>";
                            }
                        }
                    }elseif($total_number_of_page > 10){
                        if($page_no <=4){
                            for($counter = 1; $counter < 8; $counter++){
                                if($counter == $page_no){
                                    echo "<li class='active p-2'><a> $counter </a></li>";
                                }else {
                                    echo "<li class='p-2'><a href'?page_no=$counter'> $counter </a></li>";
                                }
                            }
                            echo "<li class='p-2'><a>...</a></li>";
                            echo "<li class='p-2'><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li class='p-2'><a href='?page_no=$total_number_of_page'>$total_number_of_page</a></li>";
                        }
                    }elseif($page_no > 4 && $page_no < $total_number_of_page -4 ){
                        echo "<li><a href='?page_no=1'>1</a></li>";
                        echo "<li><a href='?page_no=2'>2</a></li>";
                        echo "<li><a>...</a></li>";

                        for($counter = $page_no - $adjacents; $counter <=$page_no + $adjacents;$counter++){
                            if($counter == $page_no){
                                echo "<li class='active'><a> $counter </a></li>";
                            }else{
                                echo "<li><a href'?page_no=$counter'> $counter </a></li>";
                            }
                        }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_number_of_page'>$total_number_of_page</a></li>";
                    }else{
                        echo "<li><a href='?page_no=1'>1</a></li>";
                        echo "<li><a href='?page_no=2'>2</a></li>";
                        echo "<li><a>...</a></li>";

                        for($counter = $total_number_of_page - 6; $counter <= $total_number_of_page;$counter++){
                            if($counter == $page_no){
                                echo "<li class='active'><a> $counter </a></li>";
                            }else{
                                echo "<li><a href'?page_no=$counter'> $counter </a></li>";
                            }
                        }
                            
                    } 
                ?>

                <li class="p-2 <?php if($page_no >= $total_number_of_page) {echo "disabled";} ?>" >
                    <a <?php if($page_no < $total_number_of_page) {echo "href='?page_no=$next_page'";} ?>>Next</a>
                </li>
                <?php if($page_no < $total_number_of_page) {echo "<li class='p-2'><a href='?page_no=$total_number_of_page'>Last &rsaquo;</a?</li>";} ?>
                
            </ul>
            </div>
            


            <!-- <div class="owl-carousel testimonial-carousel position-relative" >
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.1s">
                    <img class="p-2 mx-auto mb-3" styel="width: 150px; height:180px;" src="img/past_event_1.png">
                    <h5 class="mb-0 second-header">ISO 9001:2015 Requirements and Internal Quality Audit</h5>
                    <p>February 19, 20, 26 & 27, 2022 | 9AM-5PM </p>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.2s">
                    <img class=" p-2 mx-auto mb-3" styel="width: 150px; height:180px;" src="img/past_event_2.png">
                    <h5 class="mb-0 second-header">Strategic Planning and Risk-Based Management</h5>
                    <p>February 21-25, 2022 | 5PM-9PM</p>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.3s">
                    <img class=" p-2 mx-auto mb-3" styel="width: 150px; height:180px;" src="img/past_event_3.png">
                    <h5 class="mb-0 second-header">Building Organizational Resilience 101:Risk Management and Root Cause Analysis</h5>
                    <p>16 February 2022 from 5PM to 8PM.</p>
                </div>
                <div class="testimonial-item text-center wow fadeInUp" data-wow-delay="0.4s"> 
                    <img class="p-2 mx-auto mb-3" styel="width: 150px; height:180px;" src="img/past_event_4.png">
                    <h5 class="mb-0 second-header">Building Organizational Resilience: Introducing Tools and Techniques in Risk Management and Root Cause Analysis</h5>
                    <p> January 16, 2022, 9AM - 12NN</p>
                </div>
            </div> -->
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