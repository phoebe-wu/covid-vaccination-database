<?php
session_start();
require '../../connect.php';

$conn = OpenCon();

$brand = $_POST['brand'];
header('refresh:2; url=n_vaccine_inventory.php?v_brand='.$brand);
echo "filter page: with $brand";




CloseCon($conn);


