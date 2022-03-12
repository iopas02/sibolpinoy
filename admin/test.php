<?php

$date = date("Y");
$unique = uniqid();
$md5c = md5($unique);

$limit = 5;
$radnadom_num =  random_int(10 ** ($limit - 1), (10 ** $limit) - 1);

echo "<br>";
echo $date."-".$radnadom_num;