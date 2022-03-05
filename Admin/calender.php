<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Calendar</title>

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

    <main class="mt-5 pt-3">
        <div class="mt-5"></div>

        <div class="container">
            <div class="row">
                <div class="col msjs">
                <!-- <?php
                    include('msjs.php');
                ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                <h3 class="text-center" id="title">How to create an Events Calendar with PHP and MYSQL</h3>
                </div>
            </div>
        </div>

        <div id="calendar"></div>


    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>