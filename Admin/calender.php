<!doctype html>
<html lang="en">
  
  
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>
  <!-- Header End -->
  <?php
    include('comptroller/config.php');

    $SqlEvents   = ("SELECT * FROM eventcalendar");
    $resulEvents = mysqli_query($con, $SqlEvents);

  ?>

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

      <!---THIS IS FOR MODAL---->
      <?php  
        include('layout.part/modalNewEventCalendar.php');
        include('layout.part/modalUpdateEvent.php');
      ?>
      <!---THIS IS FOR MODAL END---->

    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>

<script type="text/javascript">

$(document).ready(function() {
    $("#calendar").fullCalendar({
      header: {
        left: "prev,next today",
        center: "title",
        right: "month,agendaWeek,agendaDay"
      },


      defaultView: "month",
      navLinks: true, 
      editable: true,
      eventLimit: true, 
      selectable: true,
      selectHelper: false,

  //new event
    select: function(start, end){
        $("#exampleModal").modal();
        $("input[name=start_date]").val(start.format('DD-MM-YYYY'));
        
        var valueEndDate = end.format("DD-MM-YYYY");
        var F_final = moment(valueEndDate, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //I have 1 day left
        $('input[name=fecha_fin').val(F_final);  

      },
        
      events: [
        <?php
        while($dataEvent = mysqli_fetch_array($resulEvents)){ ?>
            {
            _id: '<?php echo $dataEvent['id']; ?>',
            title: '<?php echo $dataEvent['event']; ?>',
            start: '<?php echo $dataEvent['start_date']; ?>',
            end:   '<?php echo $dataEvent['final_date']; ?>',
            color: '<?php echo $dataEvent['color_event']; ?>'
            },
          <?php } ?>
      ],


  //Delete Event
  eventRender: function(event, element) {
      element
        .find(".fc-content")
        .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
      
      //Delete Event
      element.find(".closeon").on("click", function() {

    var question = confirm("Do you want to delete this event?");   
    if (question) {

      $("#calendar").fullCalendar("removeEvents", event._id);

      $.ajax({
              type: "POST",
              url: 'comptroller/deleteEvent.php',
              data: {id:event._id},
              success: function(datos)
              {
                $(".alert-danger").show();

                setTimeout(function () {
                  $(".alert-danger").slideUp(500);
                }, 3000); 

              }
          });
        }
      });
    },


  //Moviendo Evento Drag - Drop
  eventDrop: function (event, delta) {
    var idEvento = event._id;
    var start = (event.start.format('DD-MM-YYYY'));
    var end = (event.end.format("DD-MM-YYYY"));

      $.ajax({
          url: 'drag_drop_evento.php',
          data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
          type: "POST",
          success: function (response) {
          // $("#respuesta").html(response);
          }
      });
  },

  //Modify Calendar Event
  eventClick:function(event){
      var idEvent = event._id;
      $('input[name=idEvent').val(idEvent);
      $('input[name=event').val(event.title);
      $('input[name=start_date').val(event.start.format('DD-MM-YYYY'));
      $('input[name=final_date').val(event.end.format("DD-MM-YYYY"));

      $("#modalUpdateEvent").modal();
    },


    });


  //Oculta mensajes de Notificacion
    setTimeout(function () {
      $(".alert").slideUp(300);
    }, 3000); 


  });

</script>

    
    <!-- Footer and JS Script End Here -->


  </body>
</html>