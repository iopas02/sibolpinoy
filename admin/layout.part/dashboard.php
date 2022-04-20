<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.load('current', {'packages':['corechart']});
   
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawPosition);
    google.charts.setOnLoadCallback(drawStuff);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Organization', 'Frequency'],
            <?php    
                $orgaization_query = "SELECT organization, COUNT(*) AS `orgs_Frequency` FROM client WHERE `status`='Active' GROUP BY organization";
                $orgaization_query_run = mysqli_query($conn, $orgaization_query);
                $eachOrgs = array();
                while ($row = mysqli_fetch_assoc($orgaization_query_run)) {
                    $eachOrgs= "['".$row['organization']."',".$row['orgs_Frequency']."],";
                
                    echo $eachOrgs;
                }
            ?>
        
            // ['welder', 1000],
            // ['tubero', 1170],
            // ['sapatero', 660],
            // ['bumbero', 1030],
            // ['IT', 1580],
            // ['Book Keeping', 975],
            // ['Bartender', 711],
            // ['Call Center', 1030],
            // ['Office staff', 650]
           
        ]);

        var options = {
        width: 600,
        height: 500,
        bar: {groupWidth: "10%"},
        legend: { position: "none" }, 
        chart: {
            title: 'Organization Frequency'
        },
        bars: 'horizontal' // Required for Material Bar Charts.
        };
    
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawPosition() {

    var data = google.visualization.arrayToDataTable([
        ['Position', 'Number'],
        <?php    
            $position_query = "SELECT position, COUNT(*) AS `position_number` FROM client WHERE `status`='Active' GROUP BY position";
            $position_query_run = mysqli_query($conn, $position_query);
            $eachPosition = array();
            while ($row = mysqli_fetch_assoc($position_query_run)) {
                $eachPosition = "['".$row['position']."',".$row['position_number']."],";
            
                echo $eachPosition;
            }
        ?>

        // ['Developer', 29],
        // ['Accountant', 45],
        // ['Manager', 100],
        // ['Project Manager', 45],
        // ['Security Personel', 7,],
        // ['Doctor', 29],
        // ['Nurse', 45],
        // ['Student', 100],
        // ['Faculty', 45],
        // ['CEO', 7,]
    ]);

    var options = {
        title: 'Position percentage', 
        is3D: true,
        legend:{position: 'top', textStyle: {color: 'black', fontSize: 16}},
        width: 600, 
        height: 600,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
    }


    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Events Name', 'Participants'],
        
            <?php    
                $events_partcipants_query = "SELECT tb1.eventID, tb2.event_title, COUNT(*) AS `participants` FROM event_reservation_reports tb1 INNER JOIN events tb2 ON tb1.eventID = tb2.eventID GROUP BY tb2.event_title";
                $events_partcipants_query_run = mysqli_query($conn, $events_partcipants_query);
                $events_partcipants = array();
                while ($row = mysqli_fetch_assoc($events_partcipants_query_run)) {
                    $events_partcipants = "['".$row['event_title']."',".$row['participants']."],";
                
                    echo $events_partcipants;
                }
            ?>

        //   ["King's pawn (e4)", 44],
        //   ["Queen's pawn (d4)", 31],
        //   ["Knight to King 3 (Nf3)", 12],
        //   ["Queen's bishop pawn (c4)", 10],
        //   ['Other', 3]
        ]);

        var options = {
          width: 1200,
          height: 400,
          legend: { position: 'none' },
          chart: {
            title: 'Number of Participants per Events',
            subtitle: 'participants by number' },
          axes: {
            x: {
              0: { side: 'top', label: 'SPMC Events'} // Top x-axis.
            }
          },
          bar: { groupWidth: "10%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
</script>