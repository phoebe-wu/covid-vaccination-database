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
        header("location:register.html");
        echo "<br>All Fields are Required.<br>";
        exit;
    }

    if (strcmp($pwd, $cpwd) !== 0) {
        header("location:register.html");
        echo '<br>The Two Passwords do not Match.<br>" ';
        exit;
    }
    $sql = "INSERT INTO Patient VALUES('$userid', '$pwd', '$name', '$age', '$phn', '$address')";
    $result = mysqli_query($conn, $sql);
    if ($result == false) {
        header("location:register.html");
        echo "<br>Register Unsuccessful, Please Try Again.<br>";
        exit;
    } else {
        header("location:login.html");
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

