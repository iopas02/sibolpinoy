<!doctype html>
<html lang="en">
  
  <head>
  <!-- Header Start -->
  <?php
      require "layout.part/admin.header.php";
  ?>

  <!-- Header End -->
  </head>
  <body>
    <title>Sibol-PINOY Calendar</title>

    <script>
   
      $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
          left:'prev,next today',
          center:'title',
          right:'month,agendaWeek,agendaDay'
        },
        events: 'load.php',
        selectable:true,
        selectHelper:true,
        select: function(start, end, allDay)
        {
          var title = prompt("Enter Event Title");
          if(title)
          {
          var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
          $.ajax({
            url:"insert.php",
            type:"POST",
            data:{title:title, start:start, end:end},
            success:function()
            {
            calendar.fullCalendar('refetchEvents');
            alert("Added Successfully");
            }
          })
          }
        },
        editable:true,
        eventResize:function(event)
        {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
          url:"update.php",
          type:"POST",
          data:{title:title, start:start, end:end, id:id},
          success:function(){
            calendar.fullCalendar('refetchEvents');
            alert('Event Update');
          }
          })
        },
    
        eventDrop:function(event)
        {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
          url:"update.php",
          type:"POST",
          data:{title:title, start:start, end:end, id:id},
          success:function()
          {
            calendar.fullCalendar('refetchEvents');
            alert("Event Updated");
          }
          });
        },
    
        eventClick:function(event)
        {
          if(confirm("Are you sure you want to remove it?"))
          {
          var id = event.id;
          $.ajax({
            url:"delete.php",
            type:"POST",
            data:{id:id},
            success:function()
            {
            calendar.fullCalendar('refetchEvents');
            alert("Event Removed");
            }
          })
          }
        },
    
        });
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

      <div class="container">
        <div id="calendar"></div>
      </div>


    </main>

    <!-- Footer and JS Script Start Here -->
    <?php
      require "layout.part/admin.footer.php";
    ?>

    <!-- Footer and JS Script End Here -->


  </body>
</html>