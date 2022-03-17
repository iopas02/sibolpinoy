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
                <a href="event.preview.php">event preview</a>
                <hr class="dropdown-divider bg-dark" />
            </div>
        </div>

        <div id="">
            <form action="comptroller/create.event.php" enctype="multipart/form-data" method="post">
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-4" style="min-height: 400px;">
                                <div class="position-relative" >
                                    <div class="pb-2" >
                                        <label>Upload Image Here</label>
                                        <img class="img-fluid w-100" style="height: 345px" src="svg/default_new_image.jpg">  
                                    </div>
                                </div>
                                <input type="file" name="event_image">
                                       
                            </div>
                            <div class="col-lg-8">
                                
                                <div class="bg-white text-dark mb-2">
                                    <label>Header</label>
                                    <input class="w-100 h-100 p-1" type="text" name="header" placeholder="Avail UP TO 50% OFF on any of the following Training-Workshops below:">    
                                </div>
                                
                                <div class="bg-white text-dark pe-3 mb-2">
                                    <label>Event Title:</label>
                                    <input class="w-100 h-100 p-1" type="text" name="event_title" placeholder="ISO 9001:2015 Requirements and internal Aquality Audit">  
                                </div>
                                   
                                <div class="bg-white text-dark pe-3 second-header">
                                    <label>Date And Time </label>
                                    <input class="w-50 h-100 p-1" type="text" name="event_date" placeholder="March 5, 6, 12 & 13, 2022 | 9AM-5PM">
                                    
                                    <label>Start Date</label>
                                    <input class="w-30 h-100 p-1" type="date" name="start_date" > 
                                </div>

                                <div class="mb-2"> 
                                    <label>Registration Fees </label>
                                    <input class="w-50 p-1" type="text" name="reg_fee" placeholder="Regular Fee: P2,000.00">

                                    <label>Status</label>
                                        <select class="w-40 p-2" name="status" id="">
                                                <option value="">Select Status</option>
                                                <option value="sample">sample</option>
                                                <option value="published">published</option>
                                                <option value="unpublished">unpublished</option>
                                        </select> 
                                </div>

                                <div class="mb-2">
                                    <label>Description 1</label>
                                    <input class="w-100 p-1" type="text" name="desc_one" placeholder="Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022">
                                </div>

                                
                                <div class="mb-2">
                                    <label>Description 2</label>
                                    <input class="w-100 p-1" type="text" name="desc_two" placeholder="Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.">
                                </div>
                               
                                <input type="text" hidden name="loginid" value="<?= $id?>">
                                <input type="text" hidden name="admin" value="<?= $rusername?>">
                                <input type="text" hidden name="action" value="published new event">  
                                <button class="btn bg-coloured text-white py-3 px-5 mt-2" type="submit" name="event_published">Published</button>
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