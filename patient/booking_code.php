<?php
session_start();
require '../connect.php';



function handleSubmitRequest($conn)
{

    $pid = $_SESSION['userid'];

    $time = $_POST['Time'];
    $time_in_24_h  = date("H:i:s", strtotime(str_replace(' ', '', strval($time))));

    $date = DateTime::createFromFormat('m/d/Y', $_POST['Date']);
    $sqldate = $date->format('Y-m-d');
    
    $vaccineB = $_POST['vaccineB'];
    $facilityid = $_POST['f_id'];
    $aresult = $conn->query("SELECT app_ID FROM Appointments order by app_ID DESC");
    $aid = ($aresult->fetch_row())[0] + 1;
    $nresult = $conn->query("SELECT nurse_ID FROM Works_At_VC where facility_ID = '$facilityid'");
    $ncount = $conn->query("SELECT COUNT(*) FROM Works_At_VC where facility_ID = '$facilityid'");
    $nnum = ($ncount->fetch_row())[0];


    $nids = $nresult->fetch_All();

    $nid = $nids[rand(0, ($nnum - 1))][0];

    $sql = "INSERT INTO `Appointments`(`app_ID`, `time`, `date`, `p_ID`, `n_ID`, `vaccine_brand`, `facility_ID`) 
VALUES ('$aid','$time_in_24_h','$sqldate','$pid','$nid','$vaccineB','$facilityid')";

    if ($conn->query($sql) === TRUE) {
        header('refresh:5; url=appointment_summary.php?appID='.$aid);
//        echo "<br>Appointment booked successfully.<br>";
    } else {
        header('refresh:5; url=booking.php');
        echo "Error: Appointment booking failed " . $sql . "<br>" . $conn->error;
    }
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

