<?php
session_start();
require 'connect.php';



function handleSubmitRequest($conn) {

    $pid = $_SESSION['userid'];
    $time = $_POST['Time'];
    $date = $_POST['Date'];
    $vaccineB = $_POST['vaccineB'];
    $loc_id = $_POST['loc_id'];
    $facilityid = //need query from v-c

    $nresult = $conn-> query("SELECT user_ID FROM Nurse");
    $ncount = $conn-> query("SELECT COUNT(*) FROM Nurse");
    while($row = $nresult->fetch_row());
    {
        $nids[]=$row;
    }
    $nid =  $nids[rand()]

    $facilityid = //need query from v-c









    if (($userid == '') || ($password == '')) {
        header("refresh:2; url='login.html'");
        echo "<br>Email or password cannot be empty. Auto-refresh in 1 second.<br>";
        exit;
    }
    $sql = "SELECT Count(*) FROM Patient WHERE (Patient.user_ID='$userid' and Patient.PASSWORD='$password')";
    $result = mysqli_query($conn, $sql);
    $num = ($result->fetch_array())[0];

    if ($num == 1) {
        echo "<br>Logged In Successfully!<br>";
        header('refresh:0.5; url=patient/index.php');
    } else if ($num == 0) {
        $sql_n = "SELECT Count(*) FROM Nurse WHERE (Nurse.user_ID='$userid' and Nurse.password='$password')";
        $result_n = mysqli_query($conn, $sql_n);
        $num_n = ($result_n->fetch_array())[0];
        if ($num_n == 1) {
            echo "<br>Hi Nurse. Logged In Successfully!<br>";
            header('refresh:0.5; url=nurse/nurse_main.php');
        } else if ($num_n == 0) {
            header('refresh:2; url=login.html');
            echo "<br>Email or password wrong. Auto-refresh in 1 seconds.<br>";
        }
    }
    # CloseCon($conn);
}


function handlePOSTRequest() {
    $conn = OpenCon();
    if (array_key_exists('submit', $_POST)) {

        handleSubmitRequest($conn);
    }
    CloseCon($conn);
}

if (isset($_POST['submit'])) {

    handlePOSTRequest();
}

