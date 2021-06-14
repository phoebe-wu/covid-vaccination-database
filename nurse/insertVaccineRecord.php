<?php
session_start();
require '../connect.php';



function handleSubmitRequest($conn) {

    $date = DateTime::createFromFormat('m/d/Y', $_POST['date']);
    $sqldate = $date->format('Y-m-d');
    
    $vaccineB = $_POST['vaccineBrand'];
    $id = $_SESSION['new_id'];
    $dose = $_POST['dose'];

    $result = $conn->query("SELECT record_id FROM Vaccine_Record order by record_id DESC");
    $recordNum = ($result->fetch_row())[0] + 1;

    $sql = "INSERT INTO `Vaccine_Record`(`record_id`, `date`, `dose`, `brand`, `user_ID`) 
VALUES ('$recordNum','$sqldate','$dose','$vaccineBrand','$id')";

    if ($conn->query($sql) === TRUE) {
        header('refresh:5; url=patient_record.php?id='.$id);
        echo "<br>Appointment booked successfully.<br>";
    } else {
        header('refresh:5; url=booking.php');
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

