<?php
session_start();
require '../connect.php';

$conn = OpenCon();

$city = $_POST['city'];
$vbrands = $_POST['vbrands'];
header('refresh:2; url=vaccine_centres.php?Vcity='.$city.'&Vbrands='.$vbrands);
echo "filter page: with $city and $vbrands";




CloseCon($conn);


