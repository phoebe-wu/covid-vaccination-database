<?php
session_start();
require '../connect.php';



function handleSubmitRequest($conn) {
    $id = $_POST['new_id'];
    $condition = $_POST['cond'];

    $result = $conn->query("SELECT name FROM Patient WHERE user_ID = {$id}");
    $name = ($result->fetch_row())[0];

    $sql = "INSERT INTO Has_Medical_Condition VALUES ({$id}, '{$name}', '{$condition}')";

    if ($conn->query($sql) === TRUE) {
        header("location:medical_report.php");
    } else {
        header("location:medical_report.php");
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

