<?php
require 'connect.php';



function handleRegisterRequest($conn) {

    $name = $_POST["name"];
    $userid = $_POST["userid"];
    $phn = $_POST["phn"];
    $address = $_POST["address"];
    $pwd = $_POST["password"];
    $cpwd = $_POST["cpassword"];
    $age = $_POST["age"];


    if( ($name == '') || ($userid == '') || ($phn == '') ||($address == '') || ($pwd == '') ||($cpwd == '') || ($age == '')) {
        header("refresh:2; url='register.html'");
        echo "<br>All fields are required. Auto-refresh in 1 second.<br>";
        exit;
    }

    if (strcmp($pwd, $cpwd) !== 0) {
        header("refresh:2; url='register.html'");
        echo '<br>two passwords do not match. Auto-refresh in 1 second.<br>" ';
        exit;
    }
    $sql = "INSERT INTO Patient VALUES('$userid', '$pwd', '$name', '$age', '$phn', '$address')";
    $result = mysqli_query($conn, $sql);
    if ($result == false) {
        header("refresh:2; url='register.html'");
        echo "<br>Register Unsuccessful, try again. Auto-refresh in 1 second.<br>";
        exit;
    } else {
        header('refresh:2; url=login.html');
        echo "<br>Registered Successfully! Please Log in<br>";

    }
}


function handleRegPOSTRequest() {
    $conn = OpenCon();
    if (array_key_exists('register', $_POST)) {

        handleRegisterRequest($conn);
    }
    CloseCon($conn);
}


if (isset($_POST['register'])) {
    handleRegPOSTRequest();
}

