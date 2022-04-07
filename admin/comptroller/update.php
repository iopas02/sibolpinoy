<?php

/********THIS PART IS FOR THE UPDATE CALENDAR EVENT and EVENT TABLE START HERE*************/
$connect = new PDO('mysql:host=localhost;dbname=sibolpinoy', 'root', '');

if(isset($_POST["id"]))
{
 $query = " UPDATE scheduler SET title=:title, start_event=:start_event, end_event=:end_event WHERE id=:id";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}
/********THIS PART IS FOR THE UPDATE CALENDAR EVENT and EVENT TABLE END HERE*************/

?>