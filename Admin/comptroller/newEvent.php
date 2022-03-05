<?php
date_default_timezone_set("asia/manila'");
//setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

require("config.php");
$event = ucwords($_REQUEST['event']);
$start_date = $_REQUEST['start_date'];
$start_dates = date('Y-m-d', strtotime($start_date)); 

$final_date = $_REQUEST['final_date']; 
$setting_f_final = date('Y-m-d', strtotime($final_date));  
$final_date1  = strtotime($setting_f_final."+ 1 days");
$final_dates = date('Y-m-d', ($final_date1));  
$color_event = $_REQUEST['color_event'];


$InsertNewEvent = "INSERT INTO eventcalendar(
      event,
      start_date,
      final_date,
      color_event
      )
    VALUES (
      '" .$event. "',
      '". $start_dates ."',
      '" .$final_dates. "',
      '" .$color_event. "'
  )";
$resulNewEvent = mysqli_query($con, $InsertNewEvent);

header("Location:../admin/calender.php?e=1");

?>