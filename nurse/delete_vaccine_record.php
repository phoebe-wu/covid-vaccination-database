<?php 
include '../connect.php';
$conn = OpenCon();

session_start(); 

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM Vaccine_Record WHERE record_ID = '$id' ");
$data = $query->fetch_assoc();
$sql = "DELETE FROM Vaccine_Record WHERE record_ID = '$id' ";


	if ($conn->query($sql) == TRUE) {
		header("location:patient_record.php?id=".$data['user_ID']);
	 } else {
		header("location:patient_record.php?id=".$data['user_ID']);
		echo "Error: Record update failed" . $sql . "<br>" . $conn->error;
	 }
?>