<?php
session_start();
    $firstName = $lastName = $level ="";
    if(isset($_SESSION["firstName"]) && isset($_SESSION["lastName"]) && isset($_SESSION["level"]) && isset($_SESSION["username"])){
        $firstName = $_SESSION["firstName"];
        $lastName = $_SESSION["lastName"];
        $username = $_SESSION["username"];
        $level = $_SESSION["level"];
    }
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="../img/logo.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- For Calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="style/dataTables.bootstrap5.min.css" />


    <link rel="stylesheet" href="style/addstyle.css" />
    <link rel="stylesheet" href="style/colored.css" />
    
  </head>
  


<?php
// functions
function levelCheck($lev){
    if($lev == "0"){
      $lev = "admin";
    }
    else if($lev == "1"){
      $lev = "superadmin";
    }
    echo $lev;
  }
  date_default_timezone_set('Asia/Manila');
  function relativeTime($time, $short = false){
    $SECOND = 1;
    $MINUTE = 60 * $SECOND;
    $HOUR = 60 * $MINUTE;
    $DAY = 24 * $HOUR;
    $MONTH = 30 * $DAY;
    $before = time() - $time;

    if ($before < 0)
    {
        return "not yet";
    }

    if ($short){
        if ($before < 1 * $MINUTE)
        {
            return ($before <5) ? "just now" : $before . " ago";
        }

        if ($before < 2 * $MINUTE)
        {
            return "1m ago";
        }

        if ($before < 45 * $MINUTE)
        {
            return floor($before / 60) . "m ago";
        }

        if ($before < 90 * $MINUTE)
        {
            return "1h ago";
        }

        if ($before < 24 * $HOUR)
        {

            return floor($before / 60 / 60). "h ago";
        }

        if ($before < 48 * $HOUR)
        {
            return "1d ago";
        }

        if ($before < 30 * $DAY)
        {
            return floor($before / 60 / 60 / 24) . "d ago";
        }


        if ($before < 12 * $MONTH)
        {
            $months = floor($before / 60 / 60 / 24 / 30);
            return $months <= 1 ? "1mo ago" : $months . "mo ago";
        }
        else
        {
            $years = floor  ($before / 60 / 60 / 24 / 30 / 12);
            return $years <= 1 ? "1y ago" : $years."y ago";
        }
    }

    if ($before < 1 * $MINUTE)
    {
        return ($before <= 1) ? "just now" : $before . " seconds ago";
    }

    if ($before < 2 * $MINUTE)
    {
        return "a minute ago";
    }

    if ($before < 45 * $MINUTE)
    {
        return floor($before / 60) . " minutes ago";
    }

    if ($before < 90 * $MINUTE)
    {
        return "an hour ago";
    }

    if ($before < 24 * $HOUR)
    {

        return (floor($before / 60 / 60) == 1 ? 'about an hour' : floor($before / 60 / 60).' hours'). " ago";
    }

    if ($before < 48 * $HOUR)
    {
        return "yesterday";
    }

    if ($before < 30 * $DAY)
    {
        return floor($before / 60 / 60 / 24) . " days ago";
    }

    if ($before < 12 * $MONTH)
    {

        $months = floor($before / 60 / 60 / 24 / 30);
        return $months <= 1 ? "one month ago" : $months . " months ago";
    }
    else
    {
        $years = floor  ($before / 60 / 60 / 24 / 30 / 12);
        return $years <= 1 ? "one year ago" : "NA";
    }

    return "$time";
}
?>