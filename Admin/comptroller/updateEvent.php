<?php
date_default_timezone_set("asia/manila'");
//setlocale(LC_ALL,"es_ES");

include('config.php');
                        
$idEvent = $_POST['idEvent'];

$event = ucwords($_REQUEST['event']);
$start_date = $_REQUEST['start_date'];
$start_date = date('Y-m-d', strtotime($start_date)); 

$f_fin = $_REQUEST['final_date']; 
$setting_f_final = date('Y-m-d', strtotime($f_fin));  
$final_date1 = strtotime($setting_f_final."+ 1 days");
$final_date = date('Y-m-d', ($final_date1));  
$color_event = $_REQUEST['color_event'];

$UpdateProd = ("UPDATE eventcalendar 
    SET evento ='$event',
        start_date ='$start_date',
        final_date ='$final_date',
        color_event ='$color_event'
    WHERE id='".$idEvent."' ");
$result = mysqli_query($con, $UpdateProd);

header("Location:../admin/calender.php?e=1");

?>