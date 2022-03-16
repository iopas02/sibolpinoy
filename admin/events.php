<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Create Event</title>

    <!-- top navigation bar -->
    <?php
      require "layout.part/admin.top.navbar.php";
    ?>
    <!-- top navigation bar -->


    <!-- THIS IS FOR SIDE NAV-BAR and OFF CANVA START HERE -->
    <?php
      require "layout.part/admin.side.navbar.php";
    ?>

    <!-- THIS IS FOR SIDE NAV-BAR and OFF CANVA END HERE -->

    <main class="mt-5 pt-2">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12 mb-4">
                <h5 class="page-header">Create Event</h5>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div id="">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-5" style="min-height: 400px;">
                                <div class="position-relative" >
                                    <div class="pb-2" >
                                   
                                    <img class="img-fluid w-100" style="height: 345px" src="
                                    <?php
                                        if(isset($_POST['submit1'])){ 
                                            $filepath = "./upload/". $_FILES["event_image"]["name"];
                                            $default = "svg/default_new_image.jpg";

                                            if(!move_uploaded_file($_FILES["event_image"]["tmp_name"], $filepath)) {
                                                echo "$default"; 
                                                         
                                            } else {
                                                echo "$filepath" ;  
                                            }
                                        } 
                                    ?>
                                    ">  
                                    </div>
                                </div>
                                <form action="events.php" enctype="multipart/form-data" method="post">
                                    <input type="file" name="event_image">
                                    <button type="submit" name="submit1" >Test Image</button>    
                                </form>              
                            </div>
                            <div class="col-lg-7">
                                <label>Header Part:</label>
                                <h5 class="bg-white text-dark secondary-font">
                                    <input class="w-100 h-100 p-1" type="text" name="header" placeholder="Avail UP TO 50% OFF on any of the following Training-Workshops below:">    
                                </h5>
                                
                                <label>Event Title:</label>
                                <h6 class="bg-white text-dark pe-3 second-header">
                                    <input class="w-100 h-100 p-1" type="text" name="event_title" placeholder="ISO 9001:2015 Requirements and internal Aquality Audit">  
                                </h6>
                                <label>Date And Time</label>
                                <h6 class="bg-white text-dark pe-3 second-header">
                                   <input class="w-50 h-100 p-1" type="text" name="event_date" placeholder="March 5, 6, 12 & 13, 2022 | 9AM-5PM"> 
                                </h6>

                                <label>Registration Fees</label>
                                <p class="mb-1"> 
                                    <input class="w-50 p-1" type="text" name="reg_fee" placeholder="Regular Fee: P2,000.00"> 
                                </p>

                                <label>Description 1</label>
                                <p class="mb-1">
                                    <input class="w-100 p-1" type="text" name="reg_fee" placeholder="Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022">
                                </p>

                                <label>Description 2</label>
                                <p class="mb-1">
                                    <input class="w-100 p-1" type="text" name="reg_fee" placeholder="Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.">
                                </p>
                                <!-- <a class="btn btn-dark py-3 px-5 mt-2" data-bs-toggle="modal" data-bs-target="#registration">For Registration</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>