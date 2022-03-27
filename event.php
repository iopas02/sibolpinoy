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
    <section>
        <div class="eventContent" >
            <div class="textContent">
                <h1 class="textTextContent">Check Our Upcoming and Previous Events</h1>
            </div>
        </div>
    </section>
    <!-- Header End -->


    <!-- Events Start -->
    
    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="text-center">
                <h6 class="bg-white text-center text-dark px-3 secondary-font">Upcoming Events</h6>
                <h1 class="mb-5 header-font">Check Our Upcoming Events</h1>
            </div>
            
            <div class="row col-md-12 d-flex justify-content-center align-items-center">
                <table class="table data-table" style="width: 80%">
                    <thead hidden>
                        <tr>
                            <th>Image</th>
                            <th>event Id</th>
                            <th>event title</th>
                            <th>event date</th>
                            <th>Payment</th>
                            <th>details</th>
                            <th>date</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php
                           
                            $tatus = 'published';
                            $load_event_query = "SELECT * FROM `events` WHERE `status`='$tatus' ORDER BY `date_start`";
                            $load_event_query_result = mysqli_query($conn, $load_event_query );
                            if(mysqli_num_rows($load_event_query_result) > 0 ){
                                foreach($load_event_query_result as $published_event){
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="">
                                                    <img src="admin/upload/<?= $published_event['event_img']?>" style="width: 250px; height: 210px;" alt="">
                                                </div>
                                            </td>
                                            <td hidden><?= $published_event['eventID']?></td>
                                            <td hidden><?= $published_event['event_title']?></td>
                                            <td hidden><?= $published_event['date_and_time']?></td>
                                            <td hidden><?= $published_event['reg_fee']?></td>
                                            <td>
                                                <div class="col-md-12 p-2">
                                                    <div class="text-one"> <?= $published_event['header']?> </div>
                                                    <div class="text-two"><?= $published_event['event_title']?></div>
                                                    <div class="text-one"><?= $published_event['date_and_time']?></div>
                                                    <div class="text-one"><?= $published_event['reg_fee']?></div>
                                                    <div class="smaller-text"><?= $published_event['desc_1']?></div>
                                                    <div class="smaller-text"><?= $published_event['desc_2']?></div>

                                                    <button class="col-md-4 b-0 bg-blue p-1 mt-2 text-white groupregis" id="groupregis" type="button">Registration</button>  
                                                    <a href="<?= $published_event['desc_2'] ?>" class="text-dark" >Register</a>    
                                                </div>
                                                    
                                            </td>
                                            <td>
                                                <div class="col-md-2 text-center py-3">       
                                                    <div class="date-text"><?= date('d',  strtotime($published_event['date_start'])) ?></div>
                                                    <div class="month-text"><?= date('M',  strtotime($published_event['date_start'])) ?></div>
                                                </div>

                                            </td>
                                            
                                        </tr>
                                      
                                    <?php
                                }
                            }    

                        ?>
                        <hr class="dropdown-divider bg-dark" />
                    </tbody>
                    <tfoot hidden>
                        <tr>
                            <th>Image</th>
                            <th>event Id</th>
                            <th>event title</th>
                            <th>event date</th>
                            <th>Payment</th>
                            <th>details</th>
                            <th>date</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            
        </div>
    </div>
    
    <!-- Events Start -->

    <!-- About Start -->
    <div class="container-fluid bg-white py-5" id="about">
        <div class="container d-flex justify-content-center align-items-center">
          
            <?php
                $header = $title = $message1 = $message2 = $img = '';
                $status = 'published';
                $celeb_reload_query = "SELECT * FROM `celebration` WHERE `status`= '$status' ";
                $celeb_reload_query_result = mysqli_query($conn, $celeb_reload_query);
                if(mysqli_num_rows($celeb_reload_query_result) > 0){
                    while($row = mysqli_fetch_assoc($celeb_reload_query_result)){
                        $header = $row['header']; 
                        $title = $row['commemoration'];
                        $message1 = $row['message1'];
                        $message2 = $row['message2'];
                        $img = $row['image'];
                    }
                }
            ?>
            <div class="row col-md-10">
                <div class="col-lg-6">
                    <h6 class="text-start text-dark pe-3 secondary-font"><?= $header ?></h6>
                    <h1 class="mb-4 header-font"><?= $title ?></h1>
                    <h5 class="mb-4 second-header"><?= $message1 ?></h5>
                    <h6 class="mb-4 second-header"><?= $message2 ?></h6>
                </div>
                <div class="col-lg-6" style="min-height: 300px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="admin/upload/<?= $img ?>" alt="" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Previous Events Start -->
    <div class="container-fliud bg-white py-5" >
        <div class="container">
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

                            $prev_event_query = "SELECT * FROM `events` WHERE `status`='unpublished' LIMIT $offset,$total_records_per_page ";
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
                   
                    <li class="p-2 <?php if($page_no <= 1) { echo "disabled";}?>">
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
                    
                </ul>
            </div>
            
        </div>
    </div>
    <!-- Previous Events End -->

    <!-- MOdal Services Start -->
        <!--Registration Form Modal Start -->
        <div class="modal fade" id="registration" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="pt-3 text-center">
                        <img class="__logo" src="img/logo.png" alt="">
                    </div>
                    <div class="text-center">
                        <h5 class="modal-title" id="registrationTitle">Events Group Registration Form</h5>
                    </div>
                    <div class="modal-body">
                 
                        <div id="exTab1" class="container">	
                            <ul  class="nav nav-pills">
                                <li class="px-2">
                                    <a href="#1a" class="text-dark" data-toggle="tab">Solo</a>
                                </li>
                                <li class="px-2"> 
                                    <a href="#2a" class="text-dark" data-toggle="tab">Group</a>
                                </li>
                            </ul>

                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="1a">
                                    <form action="controllers/event.registration.php" method="POST">
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" readonly id="eventID" name="eventID" hidden>
                                                <label for="event_title" class="form-label">Event Title</label>
                                                <input type="text" class="col-md-12" readonly id="event_title" name="event_title">
                                                <input type="text" name="status" value="pending" hidden>
                                                <input type="text" name="action" value="New" hidden>
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <label for="date" class="form-label">Date and Time</label>
                                                <input type="text" class="col-md-12" readonly id="date" name="date">
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="reg_fee" class="form-label">Other Details</label>
                                                <input type="text" class="col-md-12" readonly id="reg_fee" name="reg_fee">
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-5">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                            </div>                                   
                                            <div class="col-md-2">
                                                <label>M.I.</label>
                                                <input type="text" class="form-control" name="mi" placeholder="M.I.">
                                            </div>
                                            <div class="col-md-5">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-6">
                                                <label>Email Address</label>
                                                <input type="Email" class="form-control" name="email_add" placeholder="Email Address">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control"  name="contact" placeholder="Contact Number">
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-6">
                                                <label>Name Of Oragnization</label>
                                                <input type="text" class="form-control" name="orgs" placeholder="Name Of Oragnization">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Position</label>
                                                <input type="text" class="form-control"  name="position" placeholder="Position">
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-4">
                                                <label>Methods Of Payments: </label><br>
                                                <input type="radio" id="myCheck0" name="payment" onclick="myFunction()"  value="Free">
                                                <label for="myCheck0">Free</label><br>
                                                <input type="radio" id="myCheck" name="payment" onclick="myFunction()"  value="Bank Transfer">
                                                <label for="myCheck">Bank Transfer</label><br>
                                                <input type="radio" id="myCheckTwo" name="payment" onclick="myFunction()" value="GCash">
                                                <label for="myCheckTwo">GCash</label> 
                                            </div>
                                            <div class="col-md-8" id="text0" style="display: none;"> 
                                                FREE WEBINAR
                                            </div>
                                            
                                            <div class="col-md-8" id="text" style="display: none;"> 
                                                Account Number: <span>2000 2941 9654</span><br>
                                                Account Name: <span>Sibol-PINOY Management Consultancy</span><br>
                                                Bank: <span>EastWest Bank, The Fort-PSE TOWER</span>
                                            </div>
                                            
                                            <div class="col-md-8" id="text-two" style="display: none;">
                                                Account Number: <span>0917 113 9078</span><br>
                                                Account Name: <span>SibolPINOY (Ceazar Valerie N.)</span>
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <small>SPMC <a href=#>TERMS</a> and <a href="#">PRIVACY POLICY</a></small>
                                            <div class="form-check">
                                                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                                                <label class="form-check-label" for="invalidCheck3">
                                                    Agree to terms and conditions
                                                </label>
                                            </div>
                                        </div>
                                        <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdqLqzo_tThI7llZqSueGjvUJkY2n5MbSsZmysQ1tApFpcX0Q/viewform?embedded=true" width="640" height="2522" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe> -->
                                        <button type="submit" class="btn bg-blue text-white" name="register">Register</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="2a">
                                    <form action="controllers/event.registration.php" method="POST">
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" readonly id="eID" name="eventID" hidden>
                                                <label for="event_title" class="form-label">Event Title</label>
                                                <input type="text" class="col-md-12" readonly id="eventTitle" name="event_title">
                                                <input type="text" name="status" value="pending" hidden>
                                                <input type="text" name="action" value="New" hidden>
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <label for="date" class="form-label">Date and Time</label>
                                                <input type="text" class="col-md-12" readonly id="dateStart" name="date">
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <label for="reg_fee" class="form-label">Other Details</label>
                                                <input type="text" class="col-md-12" readonly id="regFee" name="reg_fee">
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-5">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="firstname[]" placeholder="First Name">
                                            </div>
                                            <div class="col-md-2">
                                                <label>M.I.</label>
                                                <input type="text" class="form-control" name="mi[]" placeholder="M.I.">
                                            </div>
                                            <div class="col-md-5">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lastname[]" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-6">
                                                <label>Email Address</label>
                                                <input type="Email" class="form-control" name="email_add[]" placeholder="Email Address">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control"  name="contact[]" placeholder="Contact Number">
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-6">
                                                <label>Name Of Oragnization</label>
                                                <input type="text" class="form-control" name="orgs[]" placeholder="Name Of Oragnization">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Position</label>
                                                <input type="text" class="form-control"  name="position[]" placeholder="Position">
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-4">
                                                <label>Methods Of Payments: </label><br>
                                                <input type="radio" id="xCheck0" name="payment[]" onclick="myFunction()"  value="Free">
                                                <label for="xCheck0">Free</label><br>
                                                <input type="radio" id="xCheck1" name="payment[]" onclick="myFunction()"  value="Bank Transfer">
                                                <label for="xCheck1">Bank Transfer</label><br>
                                                <input type="radio" id="xCheck2" name="payment[]" onclick="myFunction()" value="GCash">
                                                <label for="xCheck2">GCash</label> 
                                            </div>
                                            <div class="col-md-8" id="xtext" style="display: none;"> 
                                                FREE WEBINAR
                                            </div>
                                            
                                            <div class="col-md-8" id="xtext1" style="display: none;"> 
                                                Account Number: <span>2000 2941 9654</span><br>
                                                Account Name: <span>Sibol-PINOY Management Consultancy</span><br>
                                                Bank: <span>EastWest Bank, The Fort-PSE TOWER</span>
                                            </div>
                                            
                                            <div class="col-md-8" id="xtext2" style="display: none;">
                                                Account Number: <span>0917 113 9078</span><br>
                                                Account Name: <span>SibolPINOY (Ceazar Valerie N.)</span>
                                            </div>
                                        </div>
                                        <div class="new-forms mb-3"> </div>
                                        <div class="row col-md-12 mb-2">
                                            <a href="javascript:void(0)" class="add-more-form float-end btn bg-blue text-white">Add Member</a>
                                        </div>

                                        <div class="col-12">
                                            <small>SPMC <a href=#>TERMS</a> and <a href="#">PRIVACY POLICY</a></small>
                                            <div class="form-check">
                                                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                                                <label class="form-check-label" for="invalidCheck3">
                                                    Agree to terms and conditions
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn bg-blue text-white" name="group_register">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                   
                 
                    <div class="modal-footer">
                        <button type="button" class="btn bg-dark text-light" data-bs-dismiss="modal">Close</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- Template Javascript -->
    <script>
        
        $(document).ready(function(){
            $('.groupregis').on('click', function(){
                $('#registration').modal('show');

                $tr = $(this).closest('tr');

                var data= $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#eventID').val(data[1]);
                $('#eID').val(data[1]);
                $('#event_title').val(data[2]);
                $('#eventTitle').val(data[2]);
                $('#date').val(data[3]);
                $('#dateStart').val(data[3]);
                $('#reg_fee').val(data[4]);
                $('#regFee').val(data[4]);
            })
        })

        function myFunction() {
            var checkBox0 = document.getElementById("myCheck0");
            var checkBox = document.getElementById("myCheck");
            var checkBoxTwo = document.getElementById("myCheckTwo");

            var checkBox00 = document.getElementById("xCheck0");
            var checkBox01 = document.getElementById("xCheck1");
            var checkBox02 = document.getElementById("xCheck2");

            var text0 = document.getElementById("text0");
            var text = document.getElementById("text");
            var textTwo = document.getElementById("text-two");

            var text00 = document.getElementById("xtext");
            var text01 = document.getElementById("xtext1");
            var text02 = document.getElementById("xtext2");

            if (checkBox0.checked == true){
                text0.style.display = "block";
            } else {
                text0.style.display = "none";
            }

            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }

            if (checkBoxTwo.checked == true){
                textTwo.style.display = "block";
            } else {
                textTwo.style.display = "none";
            }

            if (checkBox00.checked == true){
                text00.style.display = "block";
            } else {
                text00.style.display = "none";
            }

            if (checkBox01.checked == true){
                text01.style.display = "block";
            } else {
                text01.style.display = "none";
            }

            if (checkBox02.checked == true){
                text02.style.display = "block";
            } else {
                text02.style.display = "none";
            }
        }

        $(document).ready(function(){

            $(document).on('click', '.remove-btn' ,function(){
                $(this).closest('.main-form').remove();
            })

            $(document).on('click', '.add-more-form' ,function(){
                // alert("Hello");
                $('.new-forms').append('<div class="main-form">\
                            <hr class="dropdown-divider bg-dark"/>\<label class="col-md-9 col-sm-9">New Member:</label>\
                            <button class="remove-btn col-md-2 bg-dark text-white border-0" type="button">Remove</button>\
                            <div class="row col-md-12 mb-2">\
                                <div class="col-md-5">\
                                    <label>First Name</label>\
                                    <input type="text" class="form-control" name="name[]" placeholder="First Name" value="" required>\
                                </div>\
                                <div class="col-md-2">\
                                    <label>M.I.</label>\
                                    <input type="text" class="form-control" name="mi[]" placeholder="M.I." value="" required>\
                                </div>\
                                <div class="col-md-5">\
                                    <label>Last Name</label>\
                                    <input type="text" class="form-control" name="lastname[]" placeholder="Last Name" value="" required>\
                                </div>\
                            </div>\
                            <div class="row col-md-12 mb-2">\
                                <div class="col-md-6">\
                                    <label>Email Address</label>\
                                    <input type="Email" class="form-control" name="email_add[]" placeholder="Email Address" value="" required>\
                                </div>\
                                <div class="col-md-6">\
                                    <label>Contact Number</label>\
                                    <input type="text" class="form-control"  name="contact[]" placeholder="Contact Number" value="" required>\
                                </div>\
                            </div>\
                            <div class="row col-md-12 mb-2">\
                                <div class="col-md-6">\
                                    <label>Name Of Oragnization</label>\
                                    <input type="text" class="form-control" name="orgs[]" placeholder="Name Of Oragnization" value="" required>\
                                </div>\
                                <div class="col-md-6">\
                                    <label>Position</label>\
                                    <input type="text" class="form-control"  name="position[]" placeholder="Position" value="" required>\
                                </div>\
                            </div>\
                            <div class="row col-md-12 mb-2">\
                                <div class="col-md-4">\
                                    <label>Methods Of Payments: </label><br>\
                                    <select class="form-select" name="payment[]" required>\
                                        <option value="">Open this select menu</option>\
                                        <option value="Free">Free</option>\
                                        <option value="Bank Transfer">Bank Transfer</option>\
                                        <option value="GCash">GCash</option>\
                                    </select>\
                                </div>\
                            </div>\
                            <input type="text" name="status" value="pending" hidden>\
                            <input type="text" name="action" value="New" hidden>\
                        </div>');
            })
        })
    </script>
    <script src="js/main.js"></script>
</body>

</html>