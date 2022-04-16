<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.load('current', {'packages':['corechart']});
    
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawPosition);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Organization', 'Frequency'],
            <?php    
                $orgaization_query = "SELECT organization, COUNT(*) AS `orgs_Frequency` FROM client GROUP BY organization";
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
            $position_query = "SELECT position, COUNT(*) AS `position_number` FROM client GROUP BY position";
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
</script>