<?php
    require('./connection.php');
    date_default_timezone_set("Asia/Manila");
    $visitor = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s");
    
    if(!empty($visitor)){
        // echo $visitor;
        $check_visitor = "SELECT `visitorsIP` FROM `visitors` WHERE visitorsIP=$visitor";
        $visitor_query = mysqli_query($conn, $check_visitor);
        if($visitor_query > 0 ){
            exit();
        }else{
            $new_visitor = "INSERT INTO `visitors` (`visitorsIP`,`date_visited`) VALUES ('$visitor', '$date')";
            mysqli_query($conn, $new_visitor);
        }
    }
       
?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/styled.css" rel="stylesheet">
    <link href="css/plus.style.css" rel="stylesheet">
</head>