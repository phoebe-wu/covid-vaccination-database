<?php
session_start();
require '../connect.php';



function handleSubmitRequest($conn) {

//    $date = DateTime::createFromFormat('m/d/Y', $_POST['date']);
    $date = $_POST['date'];
    echo "before change the date is: $date";
//    $sqldate = $date->format('Y-m-d');
    
    $vaccineB = $_POST['vaccineBrand'];
    $id = $_POST['new_id'];
    $dose = $_POST['dose'];

    $result = $conn->query("SELECT record_id FROM Vaccine_Record order by record_id DESC");
    $recordNum = ($result->fetch_row())[0] + 1;

    $sql = "INSERT INTO `Vaccine_Record`(`record_id`, `date`, `dose`, `brand`, `user_ID`) 
VALUES ('$recordNum','$date','$dose','$vaccineB','$id')";

    if ($conn->query($sql) === TRUE) {
        header('refresh:10; url=patient_record.php?id='.$id);
        echo "<br>Vaccine Record added for $id who had brand $vaccineB $dose dose, successfully.<br>";
    } else {
        header('refresh:10; url=booking.php');
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

