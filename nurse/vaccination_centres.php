<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vaccination Centres - BC Health COVID-19</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="../assets/bootstrap.css">

	<link rel="stylesheet" href="../assets/iconly/bold.css">

	<link rel="stylesheet" href="../assets/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="../assets/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="../assets/app.css">
	<link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">

	<link rel="stylesheet" href="../assets/choices.min.css" />
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

                        <li class="sidebar-item active ">
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
                        
                        <li class="sidebar-item  ">
                            <a href="patient_list.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Patient List</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
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
                        <h3>BC COVID-19 Vaccination Centres</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="nurse_main.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vaccination Centres</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
		  <br>
			<section id="multiple-column-form">
				<div class="row match-height">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Find a Vaccination Centre</h4>
								<p> Use the filters to find a BC vaccination centre best suited to your needs.
								</p>
							</div>
							<div class="card-content">
								<div class="card-body">
									<form class="form">
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<label for="city-column">City</label>
													<select class="choices form-select">
														<option selected> Choose... </option>
														<option value="richmond">Richmond</option>
														<option value="vancouver">Vancouver</option>
														<option value="sechelt">Sechelt</option>
														<option value="saanichton">Saanichton</option>
														<option value="kelowna">Kelowna</option>
														<option value="burnaby">Burnaby</option>
														<option value="coquitlam">Coquitlam</option>
													</select>
												</div>
											</div>
											<div class="col-12 d-flex justify-content-end">
												<button type="submit"
													class="btn btn-primary me-1 mb-1">Filter</button>
												<button type="reset"
													class="btn btn-light-secondary me-1 mb-1">Reset</button>
											</div>
										</div>
										<table class="table table-striped" id="table1">
											<thead>
												<tr>
													<th>Address</th>
													<th>Phone</th>
													<th>City</th>
													<th>Opening Time</th>
													<th>Closing Time</th>
													<th>Facility Type</th>
													<th>Link to Book</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Graiden</td>
													<td>vehicula.aliquet@semconsequat.co.uk</td>
													<td>076 4820 8838</td>
													<td>Offenburg</td>
													<td>
														<span class="badge bg-success">Active</span>
													</td>

													<td>Pharmacy</td>
													<td>
														<a href="appointment_booking page/appointment_booking.html"
															class="badge bg-light-primary"> Book Here</a>
													</td>
												</tr>
												<?php
								   			include '../connect.php';
                                   				$conn = OpenCon();
								   			$sql = "SELECT * FROM Vaccine_Center";
								   			$result = $conn->query($sql);
								   			if ($result->num_rows > 0) {
								   			// output data of each row
								   			while($row = $result->fetch_assoc()) {
                                        			echo "<tr><td class='border-class'>".$row["address"].
                                  					"</td><td class='border-class'>".$row["phone"].
                                   				"</td><td class='border-class'>".$row["city"].
                                   				"</td><td class='border-class'>".$row["opening_time"].
                                   				"</td><td class='border-class'>".$row["closing_time"].
											"</td><td class='border-class'>".$row["facility_type"].
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
								</form>
							</div>
						</div>
					</div>
				</div>
		</div>
		<div class="card-body">

		</div>

		</section>

		<footer>
			<div class="footer clearfix mb-0 text-muted">
				<div class="float-start">
					<p>2021 &copy; Mazer</p>
				</div>
				<div class="float-end">
					<p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
							href="http://ahmadsaugi.com">A. Saugi</a></p>
				</div>
			</div>
		</footer>
	</div>
	</div>

	<script src="assets~/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="assets/simple-datatables.js"></script>
	<script>
		// Simple Datatable
		let table1 = document.querySelector('#table1');
		let dataTable = new simpleDatatables.DataTable(table1);
	</script>
	<script src="assets/choices.min.js"></script>

</body>

</html>