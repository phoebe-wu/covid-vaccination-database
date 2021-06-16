<?php
session_start();
require '../connect.php';

$conn = OpenCon();

$city = $_POST['city'];
$vbrands = $_POST['vbrands'];



// Send to page via cURL, header() or other service.

if (!isset($_POST['attribute'])) {
    //echo "all columns selected, automatically select all columns be default.";
    $attribdata = array('All');
    //echo var_dump($attribdata);
    $serialized = json_encode($attribdata);
    $attrib = rawurlencode($serialized);

    if ($city =='' && $vbrands ==''){
        header("location:vaccine_centres.php?Column=".$attrib);
    }
    if ($city =='' && $vbrands !=''){
        header("location:vaccine_centres.php?Vbrands=".$vbrands.'&Column='.$attrib);
    }
    if ($city !='' && $vbrands ==''){
        header("location:vaccine_centres.php?Vcity=".$city.'&Column='.$attrib);
    }
    if ($city !='' && $vbrands !=''){
        header("location:vaccine_centres.php?Vcity=".$city.'&Vbrands='.$vbrands.'&Column='.$attrib);
        //echo "filter page: with $city and $vbrands";
    }
} else {
    $attribdata = $_POST['attribute'];
    //echo var_dump($attribdata);
    $serialized = json_encode($attribdata);
    $attrib = rawurlencode($serialized);
    if ($city =='' && $vbrands ==''){
        header("location:vaccine_centres.php?Column=".$attrib);
    }
    if ($city =='' && $vbrands !=''){
        header("location:vaccine_centres.php?Vbrands=".$vbrands.'&Column='.$attrib);
    }
    if ($city !='' && $vbrands ==''){
        header("location:vaccine_centres.php?Vcity=".$city.'&Column='.$attrib);
    }
    if ($city !='' && $vbrands !=''){
        header("location:vaccine_centres.php?Vcity=".$city.'&Vbrands='.$vbrands.'&Column='.$attrib);
        //echo "filter page: with $city and $vbrands";
    }

}







CloseCon($conn);


