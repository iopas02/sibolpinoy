<?php
$connect = new PDO('mysql:host=localhost;dbname=sibolpinoy', 'root', '');

//loading date from database
$data = array();
$query = "SELECT * FROM scheduler ORDER BY id";
$statement = $connect->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);
?>


