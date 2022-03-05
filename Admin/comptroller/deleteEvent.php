<?php
require_once('config.php');
$id = $_REQUEST['id']; 

$sqlDeleteEvent = ("DELETE FROM eventcalendar WHERE  id='" .$id. "'");
$resultProd = mysqli_query($con, $sqlDeleteEvent);

?>
  