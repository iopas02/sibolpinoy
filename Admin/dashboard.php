<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
      require "comptroller/datagraph.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Admin Dashboard</title>

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
      <div class="container-fluid p-4">
        <div class="row">
          <div class="col-md-12 my-2">
            <h4 class="page-header">Dashboard</h4>
            <hr class="dropdown-divider bg-dark" />
          </div>
      </div>

      <!-- FIRST FOUR CARDS START HERE -->
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="py-3 card-d">
            <div class="">
              <h2 class="px-4 py-2 text-dark card-text">Number of Visitor</h2>
              <hr class="dropdown-divider bg-dark" />
              <h5 class="px-4 py-1 count-text text-blue"><img class="svg-img" src="svg/clock-history.svg" alt=""><span> 1,234 </span></h5>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="py-3 card-d">
            <div class="">
              <h2 class="px-4 py-2 text-dark card-text">Total Number of Email</h2>
              <hr class="dropdown-divider bg-dark" />
              <h5 class="px-4 py-1 count-text text-blue"><img class="svg-img" src="svg/envelope-open.svg" alt=""><span> 1,234 </span></h5>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="py-3 card-d">
            <div class="">
              <h2 class="px-4 py-2 text-dark card-text">Number of Clients</h2>
              <hr class="dropdown-divider bg-dark" />
              <h5 class="px-4 py-1 count-text text-blue"><img class="svg-img" src="svg/people-fill.svg" alt=""><span> 1,234 </span></h5>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
          <div class="py-3 card-d">
            <div class="">
              <h2 class="px-4 py-2 text-dark card-text">Number of Admin</h2>
              <hr class="dropdown-divider bg-dark" />
              <h5 class="px-4 py-1 count-text text-blue"><img class="svg-img" src="svg/person-video3.svg" alt=""><span> 1,234 </span></h5>
            </div>
          </div>
        </div>

      </div>
      <!-- FIRST FOUR CARDS END HERE -->

      <!-- SECOND TWO CARDS START HERE -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <!-- Consultation services Start -->
            <div class="container">
                <div class="container">
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="bg-white text-dark user-text">Services Images</h6>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="overflow-hidden">
                                    <img class="prev-image" src="../img/business-consultancy.jpg" alt="">
                                </div>
                                <div class="text-center">
                                    <h5 class="text-normal">Business Consultancy</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="team-item">
                                <div class="overflow-hidden">
                                    <img class="prev-image" src="../img/tech-solution.jpg" alt="">
                                </div>
                                <div class="text-center">
                                    <h5 class="text-normal">Technological Solutions</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="team-item">
                                <div class="overflow-hidden">
                                    <img class="prev-image" src="../img/training-development.jpg" alt="">
                                </div>
                                <div class="text-center">
                                    <h5 class="text-normal">Training and Development</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="team-item">
                                <div class="overflow-hidden">
                                    <img class="prev-image" src="../img/research-development.jpg" alt="">
                                </div>
                                <div class="text-center">
                                    <h5 class="text-normal">Research Development</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Consultation Services End -->
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="container pt-3 bg-light" id="about">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                            <h6 class="text-dark pe-3 secondary-font">We Celebrate on this Month</h6>
                            <h1 class="header-font">Happy Mother's Day</h1>
                            <h5 class="second-header">A simple Message and Celebration From Sibol-Pinoy</h5>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s"  >
                            <div class="position-relative h-50">
                                <img class="prev-gif"  src="../img/celebrate_1.gif" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- SECOND TWO CARDS END HERE -->

      <!-- THIRD GRAPH CARDS START HERE -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Area Chart Example
            </div>
            <div class="card-body">
              <!-- <canvas class="chart" width="400" height="200"></canvas> -->
              <div id="line_top_x"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Area Chart Example
            </div>
            <div class="card-body">
              <canvas class="chart" width="400" height="200"></canvas>
            </div>
          </div>
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