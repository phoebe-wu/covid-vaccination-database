<?php
session_start();
require '../../connect.php';

$conn = OpenCon();

    $kind = $_POST['kind'];
    header('refresh:2; url=n_testingkit_inventory.php?t_kind='.$kind);
    echo "filter page: with $kind";

//how to pass a php varaible from one php to another?



CloseCon($conn);


