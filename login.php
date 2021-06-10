<?php
session_start();
require 'connect.php';



function handleLoginRequest($conn) {

    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $_SESSION['userid'] = $userid;
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
        header('refresh:0.5; url=patient/index.html');
    } else if ($num == 0) {
        $sql_n = "SELECT Count(*) FROM Nurse WHERE (Nurse.user_ID='$userid' and Nurse.password='$password')";
        $result_n = mysqli_query($conn, $sql_n);
        $num_n = ($result_n->fetch_array())[0];
        if ($num_n == 1) {
            echo "<br>Hi Nurse. Logged In Successfully!<br>";
            header('refresh:0.5; url=nurse/nurse_main.html');
        } else if ($num_n == 0) {
            header('refresh:2; url=login.html');
            echo "<br>Email or password wrong. Auto-refresh in 1 seconds.<br>";
        }
    }
    # CloseCon($conn);
}


function handlePOSTRequest() {
    $conn = OpenCon();
    if (array_key_exists('login', $_POST)) {

        handleLoginRequest($conn);
    }
    CloseCon($conn);
}

if (isset($_POST['login'])) {

    handlePOSTRequest();
}

