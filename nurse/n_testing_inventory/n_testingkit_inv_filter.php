<?php
session_start();
require '../../connect.php';

$conn = OpenCon();
$kind = $_POST['kind'];

    if ($kind != ''){

        header("location:n_testingkit_inventory.php?t_kind=".$kind);
    } else {
        header("location:n_testingkit_inventory.php");
    }



CloseCon($conn);


