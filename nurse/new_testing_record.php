<?php 
include '../connect.php';
$conn = OpenCon();

session_start();
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
                        <li class="sidebar-item ">
                            <a href="stats.php" class='sidebar-link'>
                                <i class="bi bi-bar-chart-line"></i>
                                <span>Statistics</span>
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
                                $id = $_POST['new_id'];
                                $sql = "SELECT * FROM Patient WHERE user_ID = $id";
                                $results = $conn->query($sql);
                                            
                                $row = $results->fetch_assoc();
                                echo '<h3 >New Testing Record - ' . $row['name'] . '</h3>';
                            ?>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="nurse_main.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="patient_list.php">Patients</a></li>
                                <li class="breadcrumb-item"><a href="patient_record.php">Record</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New Testing Record</li>
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
									<h4 class="card-title">New Testing Record</h4>
            						</div>
							</div>
                              </div>
						<div class="card-content">
                                    <div class="card-body">
                                        <form action="insertTestingRecord.php" method="post" class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Patient ID</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="User ID" name="id" readonly="readonly" value="<?= $id?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Date</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="date" class="form-control" name="date"
                                                                    placeholder="Date">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar3-event"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Result</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
												    <div class="form-check">
                                        					<input class="form-check-input" type="radio" name="result"
                                            						id="flexRadioDefault1" value="Positive">
                                        					<label class="form-check-label" for="flexRadioDefault1">
                                            						Positive
                                        					</label>
                                   					 </div>
												    <div class="form-check">
                                        					<input class="form-check-input" type="radio" name="result"
                                            						id="flexRadioDefault1" value="Negative">
                                        					<label class="form-check-label" for="flexRadioDefault1">
                                            						Negative
                                        					</label>
                                   					 </div>
												    <div class="form-check">
                                        					<input class="form-check-input" type="radio" name="result"
                                            						id="flexRadioDefault1" value="Results Pending">
                                        					<label class="form-check-label" for="flexRadioDefault1">
                                            						Results Pending
                                        					</label>
                                   					 </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        <input type="submit" name="submit" formaction="insertTestingRecord.php"
                                                            class="btn btn-success me-1 mb-1" value="Add Record"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
