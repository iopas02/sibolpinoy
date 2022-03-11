<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=sibolpinoy', 'root', '');

if(isset($_POST["id"]))
{
 $query = " UPDATE events SET title=:title, start_event=:start_event, end_event=:end_event WHERE id=:id";
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

if(isset($_POST["cstatus"])){
    include_once('../../connection.php');

    $emailID = $_POST['emailID']; 
    $newStat = "Read";
    
    $change_stats = "UPDATE email SET status='$newStat' WHERE emailID='$emailID' ";
    $change_stats_results = mysqli_query($conn, $change_stats);
    if(!$change_stats_results){
        header("Location: ../inbox.php");
        exit();
    }else{
        header("Location: ../inbox.php");
        exit();
    }
}

?>