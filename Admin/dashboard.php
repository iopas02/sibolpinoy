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
    google.charts.setOnLoadCallback(seminarChart);
    google.charts.setOnLoadCallback(affilateChart);

    function seminarChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'ISO 9001:2015 Requirments and Internal Quality Audit', 'Startegic Planning and Risk-Based Management', 'Building Organizational Resilience 101: Risk Management and Root Cause Analysis'],
          ['Jan',  45, 25, 45],
          ['Feb',  75, 25, 30],
          ['Mar',  50, 35, 37],
          ['Apr',  45, 45, 24],
          ['May',  45, 21, 24],
          ['Jun',  25, 35, 34],
          ['jul',  37, 20, 45],
          ['Aug',  47, 65, 35],
          ['Sep',  45, 24, 65],
          ['Oct',  27, 21, 21],
          ['Nov',  37, 40, 25],
          ['Dec',  37, 37, 37],
        ]);


    var options = {
        chart: {
        title: 'Seminar for Year 2021',
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
          slices: {  0: {offset: 0.1},
                    3: {offset: 0.3},
                    7: {offset: 0.2}
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
      
  </script>
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
              Seminar for Year 2021
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
              <div id="piechart"  style="width: 600px; height: 400px;"></div>
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