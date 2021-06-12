<?php 
include '../connect.php';
$conn = OpenCon();

session_start();
    // for single page testing
    if(!isset($_GET['id'])) {
        $_GET['id'] = 80002;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records - BC Health COVID-19</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap.css">

    <link rel="stylesheet" href="../assets/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
    
</head>

<body>
	
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="nurse_main.html"><img src="../medical.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="nurse_main.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="appointment_summary.html" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Upcoming Appointments</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="application-gallery.html" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Job Signup</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="vaccination_centres.php" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Vaccination Centres</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="testing_centres.php" class='sidebar-link'>
                                <i class="bi bi-egg-fill"></i>
                                <span>Testing Centres</span>
                            </a>
                        </li>


                        <li class="sidebar-title">Records</li>
                        
                        <li class="sidebar-item  active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Patient List</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="n_vaccine_inventory.html" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Vaccine Inventory</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="n_testingkit_inventory.html" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Testing Kit Inventory</span>
                            </a>
                        </li>
                        <li class="sidebar-title"> </li>
                        
                        <li class="sidebar-item  ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
		   <div class="page-heading">
			 <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                            <?php
                                $sql = "SELECT * FROM Patient WHERE user_ID = {$_GET['id']}";
                                $results = $conn->query($sql);
                                            
                                $row = $results->fetch_assoc();
                                echo '<h3 >Patient Record - ' . $row['name'] . '</h3>';
                            ?>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="nurse_main.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="patient_list.php">Patients</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Record</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
		  <br>
		  <section>
		  	<div class="row">
                    <div class="col-12">
                         <div class="card">
                              <div class="card-header">
							<div class="row">
								<div class="col-sm-10 col-12">
									<h4 class="card-title">Vaccination Record</h4>
            						</div>
            						<div class="col-sm-2 col-12 d-flex justify-content-end">
									<div class="form-group">
								  		<a href="new_vaccine_record.php" type="button" class="btn btn-sm btn-success">
                                                New Record
										</a>
									</div>
           						</div>
							</div>
							 <table class="table table-striped" id="table1">
								<thead>
									<tr>
									<th>Record ID</th>
									<th>Date</th>
									<th>Vaccine</th>
									<th>Dose</th>
									<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
								   	$sql = "SELECT record_ID, date, dose, brand FROM Vaccine_Record where user_ID = {$_GET['id']}";
								   	$result = $conn->query($sql);
								   	if ($result->num_rows > 0) {
								   	// output data of each row
									while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row['record_ID']."</td>";
                                        echo "<td>".$row['date']."</td>";
                                        echo "<td>".$row['brand']."</td>";
                                        echo "<td>".$row['dose']."</td>";
                                        echo "<td> <a href='patient_record.php?id=".$row["user_ID"]."'class='badge bg-light-danger'> Delete</a></td>";
                                        echo "</tr>";
								   	}
								   	echo "</table>";
								   	} else {
									echo "0 results";
                                    }
								    ?>
									</tbody>
								</table>
                              </div>
                         </div>
                    </div>
               </div>
		</section>	
		<section>
		  	<div class="row">
                    <div class="col-12">
                         <div class="card">
                              <div class="card-header">
							<div class="row">
								<div class="col-sm-10 col-12">
                                    <h4 class="card-title">Testing Record</h4>
            						</div>
            						<div class="col-sm-2 col-12 d-flex justify-content-end">
								  <a href="new_testing_record.php" type="submit" class="btn btn-sm btn-success me-1 mb-1">New Record</a>
           						 </div>
							</div>
							 <table class="table table-striped" id="table1">
								<thead>
									<tr>
									<th>Record ID</th>
									<th>Date</th>
									<th>Result</th>
									<th>Update</th>
									<th>Delete</th>
									</tr>
								</thead>
								<tbody>
								<?php
								   	$sql = "SELECT record_ID, date, result FROM Testing_Record where user_ID = {$_GET['id']}";
								   	$result = $conn->query($sql);
								   	if ($result->num_rows > 0) {
								   	// output data of each row
									while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$row['record_ID']."</td>";
                                        echo "<td>".$row['date']."</td>";
                                        echo "<td>".$row['result']."</td>";
                                        echo "<td> <a href='patient_record.php?id=".$row["user_ID"]."'class='badge bg-light-primary'> Manage</a></td>";
                                        echo "<td> <a href='patient_record.php?id=".$row["user_ID"]."'class='badge bg-light-danger'> Delete</a></td>";
                                        echo "</tr>";
								   	}
								   	echo "</table>";
								   	} else {
									echo "0 results";
                                    }
								    CloseCon($conn);
								?>
									</tbody>
								</table>
                              </div>
                         </div>
                    </div>
               </div>
		</section>
		<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../assets/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/js/main.js"></script>
</body>
</html>