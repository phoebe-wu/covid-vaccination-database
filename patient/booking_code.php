<?php
session_start();
require '../connect.php';



function handleSubmitRequest($conn)
{

    $pid = $_SESSION['userid'];

    $time = $_POST['Time'];
    $time_in_24_h  = date("H:i:s", strtotime($time));

    $date = $_POST['Date'];
    $date_changed = str_replace('/', '-', $date);
    $date_in_dash =  date('Y-m-d', strtotime($date_changed));

    $vaccineB = $_POST['vaccineB'];
    $facilityid = $_POST['f_id'];
    echo "<br>pid: $pid, time:$time, date: $date, brand:$vaccineB, facilityid:$facilityid <br>";
    //    randomly generate app_id
    $aresult = $conn->query("SELECT app_ID FROM Appointments order by app_ID DESC");
    $aid = ($aresult->fetch_row())[0] + 1;
    $nresult = $conn->query("SELECT user_ID FROM Nurse");
    $ncount = $conn->query("SELECT COUNT(*) FROM Nurse");
    $nnum = ($ncount->fetch_row())[0];
    echo "<br>aid is $aid <br>";
    echo "<br>nid index is $nnum <br>";
    echo "<br>before nid, all set.<br>";

    while ($row = $nresult->fetch_array()) ;
    {
        $nids[] = $row;
    }
    //    randomly generate n_id
    echo "<br>the array nids is  $nids[0],$nids[1],$nids[2],$nids[3],$nids[4] <br>";
    $nid = $nids[rand(0, ($nnum - 1))];
    echo "<br>the THIS nid is  $nid <br>";

    $sql = "INSERT INTO `Appointments`(`app_ID`, `time`, `date`, `p_ID`, `n_ID`, `vaccine_brand`, `facility_ID`) 
VALUES ('$aid','$time_in_24_h','$date_in_dash','$pid','$nid','$vaccineB','$facilityid')";

    if ($conn->query($sql) === TRUE) {
        header('refresh:6; url=appointment_summary.php');
        echo "<br>Appointment booked successfully.<br>";
    } else {
        header('refresh:6; url=booking.php');
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

