<?php
require '../connect.php';

session_start();

function handleSubmitRequest($conn) {

    $date = $_POST['date'];
    $id = $_POST['new_testing_id'];
    $result = $_POST['result'];

    $resultsql = $conn->query("SELECT record_id FROM Testing_Record order by record_id DESC");
    $recordNum = ($resultsql->fetch_row())[0] + 1;

    $sql = "INSERT INTO Testing_Record(`record_id`, `date`, `result`, `user_ID`) 
    VALUES('$recordNum','$date','$result','$id') ";

    if ($conn->query($sql) === TRUE) {
        header("location:patient_record.php?id=".$id);
    } else {
        header('refresh:5; url=patient_list.php');
//        header("location:patient_list.php");
        echo "Error: Could Not Create New Record " . $sql . "<br>" . $conn->error;
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
?>
