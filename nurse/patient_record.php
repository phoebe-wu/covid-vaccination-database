
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

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
                        <h3>Patient Record - Test Patient</h3>
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
									<th>Update</th>
									<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									<td>Graiden</td>
									<td>vehicula.a</td>
									<td>076 4820 8838</td>
									<td>Offenburg</td>
									<td><button type="button" class="btn btn-sm btn-outline-primary">
                                                Update
                                            </button> </td>
									<td>
									<a href="#" class="btn btn-sm btn-outline-danger">Delete</a></td>
									</td>
									</tr>
									<?php
									include '../connect.php';
                                   		$conn = OpenCon();
								   	$sql = "SELECT * FROM Vaccine_Record";
								   	$result = $conn->query($sql);
								   	if ($result->num_rows > 0) {
								   	// output data of each row
									while($row = $result->fetch_assoc()) {
                                        	echo "<tr><td class='border-class'>".$row["record_id"].
                                  			"</td><td class='border-class'>".$row["date"].
                                   		"</td><td class='border-class'>".$row["brand"].
                                   		"</td><td class='border-class'>".$row["dose"].
                                   		"</td></tr>";
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
									<tr>
									<td>Graiden</td>
									<td>076 4820 8838</td>
									<td>Offenburg</td>
									<td><a href="#" class="btn btn-sm btn-outline-primary">Update</a></td>
									<td>
									<a href="#" class="btn btn-sm btn-outline-danger">Delete</a></td>
									</td>
									</tr>
									<?php
									include '../connect.php';
                                   		$conn = OpenCon();
								   	$sql = "SELECT * FROM Testing_Record";
								   	$result = $conn->query($sql);
								   	if ($result->num_rows > 0) {
								   	// output data of each row
									while($row = $result->fetch_assoc()) {
                                        	echo "<tr><td class='border-class'>".$row["record_id"].
                                  			"</td><td class='border-class'>".$row["date"].
                                   		"</td><td class='border-class'>".$row["brand"].
                                   		"</td><td class='border-class'>".$row["dose"].

                                   		"</td></tr>";
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