<?php 
include '../connect.php';
$conn = OpenCon();

session_start(); 

$id = $_GET['id'];
$sql = "DELETE FROM Patient WHERE user_ID = '$id' ";


	if ($conn->query($sql) == TRUE) {
		header("location:patient_list.php");
	 } else {
		header("location:patient_list.php");
		echo "Error: Record update failed" . $sql . "<br>" . $conn->error;
	 }
?>