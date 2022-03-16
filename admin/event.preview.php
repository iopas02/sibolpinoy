<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Event Preview</title>

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
                    <h5 class="page-header">Event Preview</h5>
                    <a href="events.php">Create Event</a>
                    <hr class="dropdown-divider bg-dark" />
                </div>
            </div>

            <div class="row col-md-12">
               
                <div class="col-md-3">
                    <img src="upload/IMG-62317b9f5731b3.22549484.png" style="width: 300px; height: 250px;" alt="">
                </div>
                <div class="col-md-7">
                    <p class="text-normal" >Join Sibol-PINOY Management Consultancy on its FREE WEBINAR with the theme, "Pinakbet or Laing: Weighing Alternatives, Making the Right Choice #NOTAPOLITICALFORUM</p>

                    <h5 class="welcome-text">A Webinar on Business Decision-Making, and Product and Service Management.</h5>

                    <h6 class="text-normal">Friday, 1st of April, 2022 from 5:00 PM to 8:00 PM</h6>

                    <p class="text-normal">FREE WEBINAR </p>

                    <p class="text-small">Don't miss the opportunity to discover the world of Business Decision-Making and Product and Service Management!</p>

                    <p class="text-small">You may access the registration form by scanning the QR code or fill-up in this link: https://lnkd.in/gxefz_kY</p>
                </div>
                <div class="col-md-2 text-center py-5">
                    <?php
                    date_default_timezone_set("Asia/Manila");
                    $year = date("Y");
                    $month = date("M");
                    $date = date("d");
                    $time = date("g:i a");  
                    ?>
                 
                        <div class="count-text-two"><?php echo $date ?></div>
                        <div class="user-text"> <?php echo $month ?></div>
                    
                </div>
                <hr class="dropdown-divider bg-dark" />
            </div>
                

        
        </div>
    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>