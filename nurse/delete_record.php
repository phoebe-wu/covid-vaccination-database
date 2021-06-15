<?php 
include '../connect.php';
session_start(); 
$conn = OpenCon();


if (isset($_POST['deleteVaccineBtn'])) {
	
	$record = $_POST['delete_id'];
	echo "before change the date is: $record";
	$sql = "DELETE FROM Vaccine_Record WHERE record_id = '$record' ";

	$query = "SELECT * Vaccine_Record WHERE record_id = '$record' ";
	$results = $conn->query($sql);
	$data = $results->fetch_assoc();

	if ($conn->query($sql) === TRUE) {
		header("location:patient_record.php?id=".$data['user_ID']);
 	} else {
		header("location:patient_record.php?id=".$data['user_ID']);
		echo "Error: Could Not delete Record " . $sql . "<br>" . $conn->error;
 	}	
}

if (isset($_POST['deleteTestingBtn'])) {

	$record = $_POST['testingToDelete'];
	$sql = "DELETE FROM Testing_Record WHERE record_id = '$record' ";

	$query = "SELECT * Testing_Record WHERE record_id = '$record' ";
	$results = $conn->query($sql);
	$data = $results->fetch_assoc();

	if ($conn->query($sql) === TRUE) {
		header("location:patient_record.php?id=".$data['user_ID']);
 	} else {
		header("location:patient_record.php?id=".$data['user_ID']);
		echo "Error: Could Not delete Record " . $sql . "<br>" . $conn->error;
 	}	
}

CloseCon($conn);

?>