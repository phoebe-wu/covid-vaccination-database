<?php
session_start();
require '../../connect.php';

$conn = OpenCon();
$brand = $_POST['brand'];

if ($brand != ''){

    header("location:n_vaccine_inventory.php?v_brand=".$brand);
}else{
    header("location:n_vaccine_inventory.php");
}


CloseCon($conn);


