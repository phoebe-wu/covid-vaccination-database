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
        <title>Upcoming Appointments - BC Health COVID-19</title>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/bootstrap.css">
    
        <link rel="stylesheet" href="../assets/iconly/bold.css">
    
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
    
                            <li class="sidebar-item ">
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
                            <li class="sidebar-item active ">
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
    
                            <li class="sidebar-item  ">
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
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Upcoming Appointments (｡･ө･｡)</h3>
                        <p> View Province Wide Vaccination Appointments</p>
                        <br>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="nurse_main.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section id="basic-dropdown">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Search Appointments</h4>
                            <form method ="post" action="appointment_summary.php">
                                <div class="btn-group me-1 mb-1">
                                            <select name="brand" class="form-select" id="basicSelect">
                                                <option value="" selected>Vaccine Brand</option>
                                                <?php 
                                                    $sql = "SELECT brand FROM Vaccine_Brand_Delivery";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<option value=".$row["brand"].">".$row["brand"]."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                </div>
                                <div class="btn-group me-1 mb-1">
                                            <select name="city" class="form-select" id="basicSelect">
                                                <option value="" selected> City </option>
                                                <?php 
                                                    $sql = "SELECT city FROM Vaccine_Center";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<option value=".$row["city"].">".$row["city"]."</option>";
                                                        }
                                                    }
                                                ?>
                                        </select>
                                </div>
                                <div class="btn-group me-1 mb-1">
                                            <select name="date" class="form-select" id="basicSelect">
                                                <option value="" selected>All Dates</option>
                                                <option value="1">Today</option>
                                                <option value="2">This Week</option>
                                                <option value="3">This Month</option>
                                                <option value="4">Past</option>
                                            </select>
                                </div>
                                <br>
                                <br>
                                <div class="btn-group me-1 mb-1">
                                    <h6 class="text-muted font-semibold">Order: </h6>
                                </div>
                                <div class="btn-group me-1 mb-1">
                                    <input class="form-check-input" type="radio" name="order" value=""
                                            id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ascending dates (Past to Future)
                                    </label>
                                </div>
                                <div class="btn-group me-1 mb-1">
                                    <input class="form-check-input" type="radio" name="order" value="1"
                                            id="flexRadioDefault1" value >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Descending dates (Future to Past)
                                    </label>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-6 mb-1">
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"> 
                                             <i class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="name" placeholder="Patient Name"
                                               aria-label="Recipient's username" aria-describedby="search_name"> 
                                        </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <input type="checkbox" id="checkbox1" class="form-check-input" name="nurse">
                                    <label for="checkbox1">Show Only Appointments Administered By You</label>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="reset" class="btn btn-secondary me-1 mb-1">Reset</button>
                                    <button class="btn btn-primary me-1 mb-1" type="submit" name="submit">Search</button>
                                </div>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <table class="table table-striped" id="table1">
                                        <tr>
                                           <th>Appointment ID</th>
                                           <th>Date</th>
                                           <th>Patient</th>
                                           <th>Location</th>
                                           <th>Time</th>
                                           <th>Vaccine</th>
                                           <th>Nurse</th>
                                        </tr>
                                        <?php
                                            $brand = $_POST['brand'];
                                            $city = $_POST['city'];
                                            $date = $_POST['date'];
                                            $order = $_POST['order'];
                                            $name = $_POST['name'];
                                            $nurse = $_POST['nurse'];

                                            $sql = "SELECT app_ID, Patient.name as patient, Nurse.name as nurse, date, time, vaccine_brand, city, Vaccine_Center.address as address 
                                                FROM Appointments, Patient, Vaccine_Center, Nurse 
                                                WHERE Patient.user_ID = Appointments.p_ID 
                                                    AND Vaccine_Center.facility_ID = Appointments.facility_ID 
                                                    AND Appointments.n_ID = Nurse.user_ID";
                                            
                                            if ($name != '') {
                                                $sql = $sql. " AND Patient.name LIKE '%$name%'";
                                            }
                                            if ($brand != '') {
                                                $sql = $sql. " AND vaccine_brand = '$brand' ";
                                            }
                                            if ($city != '') {
                                                $sql = $sql. " AND city = '$city' ";
                                            }
                                            if ($date != '') {
                                                switch ($date) {
                                                    case 1:
                                                        $sql = $sql. " AND date = CURDATE()";
                                                        break;
                                                    case 2:
                                                        $sql = $sql. " AND WEEKOFYEAR(date)=WEEKOFYEAR(NOW())";
                                                        break;
                                                    case 3:
                                                        $sql = $sql. " AND MONTH(date)=MONTH(NOW())";
                                                        break;
                                                    case 4:
                                                        $sql = $sql. " AND date < CURDATE()";
                                                        break;
                                                }
                                            }
                                            if ($nurse != '') {
                                                $sql = $sql. " AND Nurse.user_ID = {$_SESSION['userid']} ";
                                            }
                                            if ($order == '') {
                                                $sql = $sql. " ORDER BY date ASC";
                                            } else {
                                                $sql = $sql. " ORDER BY date DESC";
                                            }
                                            
                                            //echo $sql;
                                        
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                            // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>".$row['app_ID']."</td>";
                                                    echo "<td>".$row['date']."</td>";
                                                    echo "<td>".$row['patient']."</td>";
                                                    echo "<td>".$row["address"].", ".$row["city"]."</td>";
                                                    echo "<td>".$row['time']."</td>";
                                                    echo "<td>".$row['vaccine_brand']."</td>";
                                                    echo "<td>".$row['nurse']."</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</table>";
                                            } else {
                                                echo "0 results";
                                            }
                                            CloseCon($conn);

                                            unset($_POST);
                                        ?>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                    </div>
               </section>
            
        </div>

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

<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>
