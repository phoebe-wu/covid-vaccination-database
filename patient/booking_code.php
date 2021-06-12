<?php
session_start();
require '../connect.php';



function handleSubmitRequest($conn)
{

    $pid = $_SESSION['userid'];

    $time = $_POST['Time'];
    echo "<br>TIME $time <br>";
//    $infot = date_parse($time);
//    var_dump($infot);
//    echo "--------------";
    $time_in_24_h  = date("H:i:s", strtotime(str_replace(' ', '', strval($time))));
    echo "<br>TIME24 INPUT $time_in_24_h <br>";
    $date = $_POST['Date'];
    echo "<br>DATE $date <br>";

    $date_in_dash = date('Y-m-d', strtotime(str_replace('/', '-', strval($date))));

//    $date_changed = str_replace('/', '-', strval($date));
//    echo "<br>DATE CHANGED $date_changed <br>";
//    $dateFormat = DateTime::createFromFormat('F-d-Y', $date_changed);
//    echo $dateFormat->format('Y-m-d');
//    $infod = date_parse($date_changed);
//    var_dump($infod);
//    $dateFormat = DateTime::createFromFormat('F d Y', $date_changed);
//     echo "--------------";
//    $date_in_dash =  date('Y-m-d', strtotime(strval($infod['day']). strval($infod['month']). strval($infod['year']) ));
    echo "<br>DATE INPUT $date_in_dash <br>";

    $vaccineB = $_POST['vaccineB'];
    $facilityid = $_POST['f_id'];
    echo "<br>pid: $pid, time:$time, date: $date, brand:$vaccineB, facilityid:$facilityid <br>";
    //    randomly generate app_id
    $aresult = $conn->query("SELECT app_ID FROM Appointments order by app_ID DESC");
    $aid = ($aresult->fetch_row())[0] + 1;
    $nresult = $conn->query("SELECT nurse_ID FROM Works_At_VC where facility_ID = '$facilityid'");
    $ncount = $conn->query("SELECT COUNT(*) FROM Works_At_VC where facility_ID = '$facilityid'");
    $nnum = ($ncount->fetch_row())[0];


//    $nids = [];
//
//    while ($row = $nresult->fetch_array()) ;
//    {
//        $nids = $row;
//    }
    $nids = $nresult->fetch_All();
    print_r($nids);
    //    randomly generate n_id

    $nid = $nids[rand(0, ($nnum - 1))][0];
    echo "<br>your p_id is $pid <br>";
    echo "<br>appointment booked at $time_in_24_h on $date_in_dash<br>";
    echo "<br>app_id is $aid <br>";
    echo "<br>facility_id is $facilityid <br>";
    echo "<br>vaccine brand is $vaccineB <br>";
    echo "<br>the nurseID for your appointment is $nid <br>";

    $sql = "INSERT INTO `Appointments`(`app_ID`, `time`, `date`, `p_ID`, `n_ID`, `vaccine_brand`, `facility_ID`) 
VALUES ('$aid','$time_in_24_h','$date_in_dash','$pid','$nid','$vaccineB','$facilityid')";

    if ($conn->query($sql) === TRUE) {
        header('refresh:5; url=appointment_summary.php');
        echo "<br>Appointment booked successfully.<br>";
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

