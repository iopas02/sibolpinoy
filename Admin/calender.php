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
    <script type="text/javascript" src="admin.js/fullcalendar.min.js"></script>
    <?php
      require "layout.part/admin.footer.php";
    ?>
    
    <!-- Footer and JS Script End Here -->


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
            $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
            
            var valorFechaFin = end.format("DD-MM-YYYY");
            var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
            $('input[name=fecha_fin').val(F_final);  

            },
            
            events: [
            <?php
            while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
                {
                _id: '<?php echo $dataEvento['id']; ?>',
                title: '<?php echo $dataEvento['evento']; ?>',
                start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                end:   '<?php echo $dataEvento['fecha_fin']; ?>',
                color: '<?php echo $dataEvento['color_evento']; ?>'
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
                    url: 'deleteEvento.php',
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


        //Moving Event Drag - Drop
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
            var idEvento = event._id;
            $('input[name=idEvento').val(idEvento);
            $('input[name=evento').val(event.title);
            $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
            $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

            $("#modalUpdateEvento").modal();
        },


        });


        //Hide notification messages
        setTimeout(function () {
            $(".alert").slideUp(300);
        }, 3000); 


        });

    </script>

  </body>
</html>