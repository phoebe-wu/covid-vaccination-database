<?php
session_start();
require '../connect.php';

$conn = OpenCon();

$city = $_POST['city'];
$vkinds = $_POST['vkinds'];

if (isset($_POST['allkits'])){
    $division = $_POST['allkits'];
} else {
    $division = "";
}
    if ($city =='' && $vkinds ==''){
        header("location:testing_centres.php?Division=".$division);
    }
    if ($city =='' && $vkinds !=''){
        header("location:testing_centres.php?Vkinds=".$vkinds.'&Division='.$division);
    }
    if ($city !='' && $vkinds ==''){
        header("location:testing_centres.php?Vcity=".$city.'&Division='.$division);
    }
    if ($city !='' && $vkinds !=''){
        header("location:testing_centres.php?Vcity=".$city.'&Vkinds='.$vkinds.'&Division='.$division);

    }



CloseCon($conn);


