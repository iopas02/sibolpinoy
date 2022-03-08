<?php
session_start();
$alert = "";
if(isset($_GET["success"])){
    $success = $_GET["success"];
    if($success == "login"){
      $alert = "<div class='alert alert-success' role='alert'>Login successfully!</div>";
    }
}
?>
<!doctype html>
<html lang="en">
  
  <!-- Header Start -->
  <?php
    require "layout.part/admin.header.php";  
  ?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['line']});
    google.charts.load("current", {packages:["corechart"]});
    google.charts.load('current', {'packages':['bar']});
      
    google.charts.setOnLoadCallback(seminarChart);
    google.charts.setOnLoadCallback(affilateChart);
    google.charts.setOnLoadCallback(businessChart);
    google.charts.setOnLoadCallback(technologicalChart);

    function seminarChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'ISO 9001:2015 Requirments and Internal Quality Audit', 'Startegic Planning and Risk-Based Management', 'Building Organizational Resilience 101: Risk Management and Root Cause Analysis'],
          ['Jan',  45, 25, 45],
          ['Feb',  75, 25, 30],
          ['Mar',  50, 35, 37],
          ['Apr',  45, 45, 24],
          ['May',  45, 21, 24],
          ['Jun',  25, 35, 34],
          ['Jul',  37, 20, 45],
          ['Aug',  47, 65, 35],
          ['Sep',  45, 24, 65],
          ['Oct',  27, 21, 21],
          ['Nov',  37, 40, 25],
          ['Dec',  37, 37, 37],
        ]);
    var options = {
        chart: {
        title: 'Seminar on the Year 2021',
        },
        width: 600,
        height: 350,
        axes: {
        x: {
            0: {side: 'top'}
        }
        }
    };
    var chart = new google.charts.Line(document.getElementById('line_top_x'));
    chart.draw(data, google.charts.Line.convertOptions(options));
    }

    function affilateChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Affiliation');
        data.addColumn('number', 'PAX');
        data.addRows([
          ['Student', 130], 
          ['IT', 53],
          ['Entrepreneur', 73],
          ['LAW Firm', 103],
          ['Finance', 83],
          ['Marketing', 73],
          ['Government Sector', 93],
          ['Education', 120]  
        ]);
        var options = {
          title: 'Affiliation Pie Graph',
          legend: 'side',
          width: 700,
          slices: {  0: {offset: 0.1},
                    3: {offset: 0.3},
                    7: {offset: 0.2}
          },
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

      function businessChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'utomotive Quality Management System Standard (IATF 16949:2016)', 'Energy Management System (ISO 50001:2011)', 'Environmental Management System (ISO 14001:2015)', 'Food Safety Management System (ISO 22000:2005) & HACCP', 'Food Safety Systems Certification (FSSC 22000)', 'Information Security Management System (ISO 27001:2013)', 'Occupational Health & Safety Management System (OHSAS 18001)/ISO 45001:2016)', 'Quality Management System (ISO 9001:2015)', 'Third-Party BE Assessment', 'Leadership Excellence', 'Strategic Planning', 'Customer-Focused Excellence', 'Knowledge Management', 'HR Excellence', 'Operations Excellence', 'P&Q Diagnosis', '5s', 'WIT', 'Lean Management', 'Labor-Management Cooperation'],
          ['2021', 1000, 980, 111, 231, 234, 777, 245, 89, 345, 333, 499, 780, 450, 790, 890, 312, 212, 870, 111, 340],
        ]);
        var options = {
          chart: {
            title: 'Business Consultancy',
            subtitle: 'Total Consultation for the year 2021',
          },
          legend: {position: 'none', textStyle: {color: 'black', fontSize: 8}},
          bars: 'horizontal' // Required for Material Bar Charts.
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function technologicalChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Logo', 'Flyer', 'Design Services', 'Banner design', 'Ad Boxes design', 'Brochure', 'Web Content', 'Redesign Services', 'Content Upload', 'Technical Maintenance', 'Customer-Focused Excellence', 'Web Hosting', 'Web Statistics', ' Presentation Services', 'Transcription', 'Proofreading', 'Conceptual Design'],
          ['2021', 1000, 400, 500, 333, 455, 654, 123, 111, 86, 35, 785, 231, 567, 444, 111, 890, 666],
        ]);
        var options = {
          chart: {
            title: 'Technological Consultation',
            subtitle: 'Total Consultation for the year 2021',
          },
          legend: {position: 'none', textStyle: {color: 'black', fontSize: 8}},
        };
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
      
  </script>
  <!-- Header End -->
  
  <body>
    <title>Sibol-PINOY Admin Dashboard</title>

    <!-- top navigation bar -->
    <?php
      require "layout.part/admin.top.navbar.php";
      
      echo $alert;
      unset($sucess);
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
        <div class="col-md-3 mt-4">
          <div class="py-3 card-d">
            <div class="">
              <h2 class="px-4 py-2 text-dark card-text">Number of Visitor</h2>
              <hr class="dropdown-divider bg-dark" />
              <h5 class="px-4 py-1 count-text text-blue"><img class="svg-img" src="svg/clock-history.svg" alt=""><span> 1,234 </span></h5>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-4">
          <div class="py-3 card-d">
            <div class="">
              <h2 class="px-4 py-2 text-dark card-text">Total Number of Email</h2>
              <hr class="dropdown-divider bg-dark" />
              <h5 class="px-4 py-1 count-text text-blue"><img class="svg-img" src="svg/envelope-open.svg" alt=""><span> 1,234 </span></h5>
            </div>
          </div>
        </div>

        <div class="col-md-3 mt-4">
          <div class="py-3 card-d">
            <div class="">
              <h2 class="px-4 py-2 text-dark card-text">Number of Clients</h2>
              <hr class="dropdown-divider bg-dark" />
              <h5 class="px-4 py-1 count-text text-blue"><img class="svg-img" src="svg/people-fill.svg" alt=""><span> 1,234 </span></h5>
            </div>
          </div>
        </div>

        <div class="col-md-3 mb-3">
        <div class="container">
          <div class="row ">
            <div class="col-lg-12 text-center bg-dark text-white page-header" style="border-top-right-radius: 45px;">
              2022
            </div>
            <div class="col-md-4 bg-dark text-white" style="border-bottom-left-radius: 45px;">
            <hr class="dropdown-divider bg-light" />
                <div class="text-center py-5">
                  <div class="count-text">06</div>
                  <div class="user-text">Mar</div>
                </div>
            </div>
            <div class="col-md-8">
              <h3 class="page-header">Event for Today</h3>

              <div class="card-text">
                ISO 9001:2015 Requirements and Internal Quality Audit
              </div>

              <div class="pt-3 login-text">
                <img src="svg/watch.svg" style="width: 18px; height: 18px;" alt="" /> 10:00 am
              </div>
            </div>
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
                        <h6 class="bg-white text-dark user-text">Services and Images</h6>
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
            <div class="container pt-3 pb-3 bg-light" id="about">
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

      <!-- THIRD EVENT CARDS START HERE -->  
      <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="text-left text-dark px-3 user-text">Upcoming Events</h3>
            </div>
      
            <div id="carouselExampleIndicators" class="carousel slide wow fadeInUp" data-wow-delay="0.2s" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" style="background-color: blue;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" style="background-color: blue;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-5">
                            <div class="col-lg-6" style="min-height: 400px;">
                                <div class="position-relative" >
                                    <div class="testimonial-item text-center" >
                                        <img class="img-fluid w-100" style="height: 345px" src="../img/event_1.jpg">
                                    </div>
                                </div>                     
                            </div>
                            <div class="col-lg-6">
                                <h5 class="bg-white text-dark pe-3 secondary-font">Avail UP TO 50% OFF on any of the following Training-Workshops below:</h5>
                                <h6 class="bg-white text-dark pe-3 second-header">𝐈𝐒𝐎 𝟗𝟎𝟎𝟏:𝟐𝟎𝟏𝟓 𝐑𝐞𝐪𝐮𝐢𝐫𝐞𝐦𝐞𝐧𝐭𝐬 𝐚𝐧𝐝 𝐈𝐧𝐭𝐞𝐫𝐧𝐚𝐥 𝐐𝐮𝐚𝐥𝐢𝐭𝐲 𝐀𝐮𝐝𝐢𝐭: March 5, 6, 12 & 13, 2022 | 9AM-5PM</h6>

                                <p class="mb-4">Registration Rates:</p>
                                <p class="mb-4">Regular Fee: P2,000.00</p>
                                <p class="mb-4">Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022</p>
                                <p class="mb-4">Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row g-5">
                            <div class="col-lg-6" style="min-height: 400px;">
                                <div class="position-relative">
                                    <div class="testimonial-item text-center">
                                        <img class="img-fluid w-100" style="height: 345px" src="../img/event_2.jpg">
                                    </div>
                                </div>                     
                            </div>
                            <div class="col-lg-6">
                                <h5 class="bg-white text-dark pe-3 secondary-font">Avail UP TO 50% OFF on any of the following Training-Workshops below:</h5>
                                <h6 class="bg-white text-dark pe-3 second-header">𝐒𝐭𝐫𝐚𝐭𝐞𝐠𝐢𝐜 𝐏𝐥𝐚𝐧𝐧𝐢𝐧𝐠 𝐚𝐧𝐝 𝐑𝐢𝐬𝐤-𝐁𝐚𝐬𝐞𝐝 𝐌𝐚𝐧𝐚𝐠𝐞𝐦𝐞𝐧𝐭: March 7 - 11, 2022 | 5PM-9PM</h6>
                                <p class="mb-4">Registration Rates:</p>
                                <p class="mb-4">Regular Fee: P2,000.00</p>
                                <p class="mb-4">Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022</p>
                                <p class="mb-4">Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- THIRD EVENT CARDS END HERE -->

      <!-- FOURTH GRAPH CARDS START HERE -->
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Seminar on the Year 2021
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
              Affiliation Graph
            </div>
            <div class="card-body">
              <!-- <canvas class="chart" width="400" height="200"></canvas> -->
              <div id="piechart"  style="width: 500px; height: 400px;"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- FOURTH GRAPH CARDS END HERE -->

      <!-- Fifth GRAPH CONSULTATION CARDS START HERE -->
      <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card bg-white p-1 text-white h-100">
              <div id="barchart_material" style="width: 285px; height: 350px;"></div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-white p-1 text-dark h-100">
              <div id="columnchart_material" style="width: 285px; height: 350px;"></div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">Success Card</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white h-100">
              <div class="card-body py-5">Danger Card</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
      </div>
      <!-- Fifth GRAPH CONSULTATION CARDS END HERE -->
       
    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>
    <!-- Footer and JS Script End Here -->
  </body>
</html>