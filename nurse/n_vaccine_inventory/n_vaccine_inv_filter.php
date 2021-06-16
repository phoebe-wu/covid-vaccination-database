<?php
session_start();
require '../../connect.php';

$conn = OpenCon();

$brand = $_POST['brand'];
header("location:n_vaccine_inventory.php?v_brand=".$brand);
//echo "filter page: with $brand";




CloseCon($conn);


