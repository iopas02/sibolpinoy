<!doctype html>
<html lang="en">
  
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->

  <body>
    <title>Sibol-PINOY Calendar</title>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>

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
              <h4 class="page-header">Calendar</h4>
              <hr class="dropdown-divider bg-dark" />
          </div>
      </div>

      <div class="p-3" id='calendar'></div>


    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>

    <!-- Footer and JS Script End Here -->


  </body>
</html>