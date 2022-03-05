<?php
$usuario  = "root";
$password = "";
$servidor = "localhost";
$basededatos = "eventoscalendar";
$con = mysqli_connect($servidor, $usuario, $password) or die("Could not connect to the server");
$db = mysqli_select_db($con, $basededatos) or die("oops! Error connecting to the Database");
?>
