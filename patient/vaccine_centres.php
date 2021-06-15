<!DOCTYPE html>
<html lang="en">

<?php
    include '../connect.php';
    $conn = OpenCon();
    
?>
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
							<a href="index.php"><img src="../medical.png" alt="Logo" srcset=""></a>
						</div>
						<div class="toggler">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i
									class="bi bi-x bi-middle"></i></a>
						</div>
					</div>
				</div>
				<div class="sidebar-menu">
					<ul class="menu">
						<li class="sidebar-title">Menu</li>

						<li class="sidebar-item ">
							<a href="index.php" class='sidebar-link'>
								<i class="bi bi-grid-fill"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="sidebar-item  ">
							<a href="booking.php" class='sidebar-link'>
								<i class="bi bi-pen-fill"></i>
								<span>Book An Appointment</span>
							</a>
						</li>

						<li class="sidebar-item  active">
							<a href="vaccine_centres.php" class='sidebar-link'>
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


						<li class="sidebar-title">My Records</li>

						<li class="sidebar-item  ">
							<a href="p_testing_record.php" class='sidebar-link'>
								<i class="bi bi-file-earmark-medical-fill"></i>
								<span>Testing Records</span>
							</a>
						</li>
						<li class="sidebar-item  ">
							<a href="p_vaccine_record.php" class='sidebar-link'>
								<i class="bi bi-file-earmark-medical-fill"></i>
								<span>Vaccine Records</span>
							</a>
						</li>

						<li class="sidebar-title"> </li>

						<li class="sidebar-item  ">
							<a href="../logout.php" class='sidebar-link'>
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
			<header class="mb-3">
				<a href="#" class="burger-btn d-block d-xl-none">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</header>

			<div class="page-heading">
				<h3>Vaccination Centres</h3>
			</div>
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
									<form id="myform_vc" action="vaccine_centres_filter.php" method="post">
										<div class="row">
											<div class="col-md-6 -12">
												<div class="form-group">
													<label for="city-column">City</label>
													<p> Select your preferred city </p>
													<select class="choices form-select" name="city">
                                                        	<option value=""> All</option>
                                                        	<?php 
                                                            $sql = "SELECT city FROM Vaccine_Center";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                            // output data of each row
                                                                while($row = $result->fetch_assoc()) {

                                                                    echo "<option value=".$row["city"];
                                                                    if(isset($_GET['Vcity'])) {
                                                                        if($_GET['Vcity'] == $row["city"]){
                                                                            echo " selected='selected'";
                                                                        }
                                                                    }
                                                                    echo ">".$row["city"]."</option>";
//
                                                                }
                                                            }
                                                        	?>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="vaccine-column">Vaccine Brand</label>
													<p> Select all your preferred brands </p>
                                                    <select class="choices form-select multiple-remove" multiple="multiple" name="vbrands">
                                                        	<?php 
                                                            $sql = "SELECT brand FROM Vaccine_Brand_Delivery";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                            // output data of each row
                                                                while($row = $result->fetch_assoc()) {
                                                                    echo "<option value=".$row["brand"];
                                                                    if(isset($_GET['Vbrands'])) {
                                                                        if($_GET['Vbrands'] == $row["brand"]){
                                                                            echo " selected='selected'";
                                                                        }
                                                                    }
                                                                    echo ">".$row["brand"]."</option>";

//                                                                    echo "<option value=".$row["brand"].">".$row["brand"]."</option>";
                                                                }
                                                            }
                                                        	?>
                                                    </select>
												</div>
                                            </div>

											<div class="col-12 d-flex justify-content-end">
												<button type="submit"
													class="btn btn-primary me-1 mb-1"
                                                        formaction="vaccine_centres_filter.php" name="submit">
                                                    Filter</button>
												<button type="reset"
													class="btn btn-light-secondary me-1 mb-1" formaction="vaccine_centres_filter.php" name="reset">
                                                    Reset</button>
											</div>

										</div>
										<table class="table table-striped" id="table1">
											<thead>

												<tr>
                                                    <?php
                                                    if (isset($_GET['Vbrands'])) { //vbrands selected, two table join
                                                        echo'<th>Address</th>
                                                            <th>Phone</th>
                                                            <th>City</th>
                                                            <th>Offer Vaccine</th>
                                                            <th>Opening Time</th>
                                                            <th>Closing Time</th>
                                                            <th>Facility Type</th>
                                                            <th>Link to Book</th>';

                                                    } else {                        //vbrand not selected, will not join tables
                                                        echo'<th>Address</th>
                                                            <th>Phone</th>
                                                            <th>City</th>
                                                            <th>Opening Time</th>
                                                            <th>Closing Time</th>
                                                            <th>Facility Type</th>
                                                            <th>Link to Book</th>';
                                                    }
                                                    ?>

												</tr>
											</thead>
											<tbody>
												<?php
												if (isset($_GET['Vbrands'])) { //vbrands selected, two table join
                                                        $vbrand = $_GET['Vbrands'];
                                                        $sql_join = "CREATE VIEW vc_iv_join AS
                                                                        SELECT vc.facility_ID, vc.phone, vc.address, vc.opening_time, vc.closing_time,vc.facility_type,vc.city,
                                                                                iv.brand
                                                                        FROM Vaccine_Center AS vc
                                                                        JOIN Inventory_Of_Vaccine AS iv
                                                                        ON vc.facility_ID = iv.facility_ID";
                                                    $result = mysqli_query($conn, $sql_join);
                                                    if($result == 0) {
                                                        echo 'create view error';
                                                    }

                                                        if (isset($_GET['Vcity'])) {       //city is selected
                                                            $vcity = $_GET['Vcity'];
                                                            $sql = " SELECT * FROM vc_iv_join Where city like '$vcity' AND brand like '$vbrand'";
                                                            $result = mysqli_query($conn, $sql);
                                                        } else {        //city is not selected
                                                            $sql = " SELECT * FROM vc_iv_join Where brand like '$vbrand'";
                                                            $result = mysqli_query($conn, $sql);
                                                        }

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<tr><td class='border-class'>".$row["address"].
                                                                "</td><td class='border-class'>".$row["phone"].
                                                                "</td><td class='border-class'>".$row["city"].
                                                                "</td><td class='border-class'>".$row["brand"].
                                                                "</td><td class='border-class'>".$row["opening_time"].
                                                                "</td><td class='border-class'>".$row["closing_time"].
                                                                "	</td><td class='border-class'>".$row["facility_type"].
                                                                "</td><td>
                                                        <a href='booking.php?f_ID=".$row["facility_ID"]."'
                                                        class='badge bg-light-primary'> Book Here</a>
													</td></tr>";
                                                        }
                                                        echo "</table>";
                                                        $sql_drop = "DROP VIEW vc_iv_join";
                                                        $result_drop = $conn->query($sql_drop);
                                                        if ($result_drop == 0) {
                                                            echo 'error dropping view';
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }

												} else {                        //vbrand not selected, will not join tables
                                                    $result='';
												     if (isset($_GET['Vcity'])) {       //city is selected
                                                        $vcity = $_GET['Vcity'];
                                                        $sql = "SELECT * FROM Vaccine_Center Where city like '$vcity'";
												         $result = $conn->query($sql);
												        } else {
												         $sql = "SELECT * FROM Vaccine_Center";
												         $result = $conn->query($sql);
												     }

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<tr><td class='border-class'>".$row["address"].
                                                                "</td><td class='border-class'>".$row["phone"].
                                                                "</td><td class='border-class'>".$row["city"].
                                                                "</td><td class='border-class'>".$row["opening_time"].
                                                                "</td><td class='border-class'>".$row["closing_time"].
                                                                "	</td><td class='border-class'>".$row["facility_type"].
                                                                "</td><td>
                                                        <a href='booking.php?f_ID=".$row["facility_ID"]."'
                                                        class='badge bg-light-primary'> Book Here</a>
													</td></tr>";
                                                        }
                                                        echo "</table>";
                                                    } else {
                                                        echo "0 results";
                                                    }
                                                    }

                                                    CloseCon($conn);



								    			?>
											</tbody>
										</table>
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

	<script src="../assets~/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="../assets/choices.min.js"></script>

</body>

</html>