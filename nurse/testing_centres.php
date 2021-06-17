<?php 
include '../connect.php';
$conn = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Centres - BC Health COVID-19</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap.css">
   
    <link rel="stylesheet" href="../assets/iconly/bold.css">

    <link rel="stylesheet" href="../assets/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="../assets/choices.min.css"/>
</head>

<body>
    <div id="app">
    <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="nurse_main.php"><img src="../medical.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="nurse_main.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="stats.php" class='sidebar-link'>
                                <i class="bi bi-bar-chart-line"></i>
                                <span>Statistics</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="appointment_summary.php" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Upcoming Appointments</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="medical_report.php" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Special Medical Report</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="vaccination_centres.php" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Vaccination Centres</span>
                            </a>
                        </li>

                        <li class="sidebar-item active ">
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
                        <li class="sidebar-item  ">
                            <a href="n_vaccine_inventory/n_vaccine_inventory.php" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Vaccine Inventory</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="n_testing_inventory/n_testingkit_inventory.php" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Testing Kit Inventory</span>
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
            <div class="page-heading">
			 <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>BC COVID-19 Testing Centres</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="nurse_main.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Testing Centres</li>
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
						 <h4 class="card-title">Find a Testing Centre</h4>
						 <p> Use the filters to find a  BC testing centre best suited to your needs.</p>
					  </div>
					  <div class="card-content">
						 <div class="card-body">
							<form class="form" action="testing_centres_filter.php" method="post">
							    <div class="row">
								   <div class="col-md-6 col-12">
									<div class="form-group">
									    <label for="city-column">City</label>
                                        <p> Select your preferred city </p>
                                        <select class="choices form-select" name="city">
                                            <option value=""> All</option>
                                            <?php
                                            $sql = "SELECT DISTINCT city FROM Testing_Center";
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
													<label for="vaccine-column">Testing Method</label>
													<p> Select all your preferred testing methods </p>
                                                    <select class="choices form-select" name="vkinds">
                                                        <option value=""> All</option>
                                                        <?php
                                                        $sql = "SELECT kind FROM Testing_Kit";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                $k = str_replace(' ', '_', $row["kind"]);
                                                                echo "<option value=".$k;
                                                                if(isset($Vkinds)) {
                                                                    $Vkinds = str_replace("_", " ", $_GET['Vkinds']);
                                                                    if($Vkinds == $row["kind"]){
                                                                        echo " selected='selected'";
                                                                    }
                                                                }
                                                                echo ">".$row["kind"]."</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
											    </div>
                                    </div>
								   <div class="col-md-6 col-12">
									 <div class="checkbox">
										<input type="checkbox" id="checkbox5"
										    class='form-check-input' name="allkits" value="division"
                                            <?php
                                            if (!empty($_GET['Division'])) {       //columns selected
                                                    echo "checked";
                                            }
                                            ?>
                                        >
										<label for="checkbox5"> Show Testing Centres that have All Kits in Stock</label>
									 </div>
								   </div>
<!--								   <div class="col-md-6 col-12">-->
<!--									<div class="checkbox">-->
<!--									    <input type="checkbox" id="checkbox5"-->
<!--										   class='form-check-input' unchecked>-->
<!--									    <label for="checkbox5"> Open Now</label>-->
<!--									</div>-->
<!--								  </div>-->
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                                class="btn btn-primary me-1 mb-1"
                                                formaction="testing_centres_filter.php" name="submit">
                                            Submit</button>
<!--                                        <button type="reset"-->
<!--                                                class="btn btn-light-secondary me-1 mb-1" formaction="vaccine_centres_filter.php" name="reset">-->
<!--                                            Reset</button>-->
                                    </div>
							    </div>
                                <br>
							    <table class="table table-striped" id="table1">
								    <tr>
									   <th>Address</th>
									   <th>Phone</th>
									   <th>City</th>
									   <th>Opening Time</th>
									   <th>Closing Time</th>
								    </tr>
								    <?php
                                    $result = '';
                                    if (isset($_GET['Division']) && ($_GET['Division'] == "division")){

                                        $sql_division = "SELECT * FROM Testing_Center AS tc Where 
                                                NOT EXISTS 
                                                ((SELECT tk.kind FROM Testing_Kit AS tk) 
                                                EXCEPT 
                                                (SELECT it.kind FROM Inventory_Of_Tests AS it where tc.facility_ID = it.facility_ID))";
                                        $result = mysqli_query($conn, $sql_division);
                                    } else {
                                        if (isset($_GET['Vkinds'])) {
                                            $vkind = str_replace("_"," ",$_GET['Vkinds']);
                                            $sql_join = "CREATE VIEW tc_it_join AS
                                                                        SELECT tc.facility_ID, tc.phone, tc.address, tc.opening_time, tc.closing_time, tc.drivethru, tc.city,
                                                                                it.kind
                                                                        FROM Testing_Center AS tc
                                                                        JOIN Inventory_Of_Tests AS it
                                                                        ON tc.facility_ID = it.facility_ID";

                                            $result = mysqli_query($conn, $sql_join);
                                            if ($result ==0) {
                                                //echo "join unseccessful";
                                            }

                                            if (isset($_GET['Vcity'])){       //city is selected
                                                $vcity = $_GET['Vcity'];
                                                $sql = " SELECT * FROM tc_it_join Where city like '$vcity' AND kind like '$vkind'";
                                                $result = mysqli_query($conn, $sql);
                                            } else {
                                                    $sql = "SELECT * FROM tc_it_join Where kind like '$vkind'";
                                                    $result = $conn->query($sql);
                                                    }
                                            } else{
                                            if (isset($_GET['Vcity'])){
                                                $vcity = $_GET['Vcity'];
                                                $sql = "SELECT * FROM Testing_Center Where city like '$vcity'";
                                                $result = $conn->query($sql);
//                                                var_dump($result);
                                            } else {
                                                $sql = "SELECT * FROM Testing_Center";
                                                $result = $conn->query($sql);
                                            }
                                        }
                                    }
//								   $result = $conn->query($sql);
								   if ($result->num_rows > 0) {
								   // output data of each row
								   while($row = $result->fetch_assoc()) {
                                    echo "<tr><td class='border-class'>".$row["address"].
                                   	"</td><td class='border-class'>".$row["city"].
                                   	"</td><td class='border-class'>".$row["phone"].
                                   	"</td><td class='border-class'>".$row["opening_time"].
                                   	"</td><td class='border-class'>".$row["closing_time"].
                                   	"</td></tr>";
								   }
								   echo "</table>";
								   } else {
								   echo "0 results";
								   }
								   CloseCon($conn);
								    ?>
							 </table>
							</form>
						 </div>
					  </div>
				   </div>
			    </div>
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
    </div>
</body>

</html>
