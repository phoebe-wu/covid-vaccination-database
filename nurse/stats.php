
<!DOCTYPE html>
<html lang="en">
<?php
    include '../connect.php';
    $conn = OpenCon();
    
    session_start();
    // for single page testing
    if (!isset($_SESSION['userid'])) {
        $_SESSION['userid'] = 10001;
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics  - BC Health COVID-19</title>

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
                        <li class="sidebar-item active ">
                            <a href="stats.php" class='sidebar-link'>
                                <i class="bi bi-bar-chart-line"></i>
                                <span>Statistics</span>
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
                                <span>Special Medical Report</span>
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
                        <h3>Fun Statistics ฅ(≚ᄌ≚) </h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="nurse_main.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Statistics</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
                    
            <div class="page-content">
                
                <section class="row">
                    <div class="col-12 col-lg-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Find Facilities with ... </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            
                                            <form action="stats.php" method="post" class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-10 mb-2">
                                                            <h6>(Opening/Closing) times</h6>
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                <select name="time1" class="form-select" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="opening_time">Opening</option>
                                                                    <option value="closing_time">Closing</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 mb-2">
                                                            <h6>(Before/After) [inclusive]</h6>
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                <select name="greater_less1" class="form-select" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="<=">Before</option>
                                                                    <option value=">">After</option>
                                                                </select>
                                                            </div>
                                                        </div>                             
                                                        <div class="col-md-10 mb-2">
                                                            <h6>All (Earliest, Latest, or Average) Appointment Times</h6>
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                <select name="agg1" class="form-select" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="MIN">Earliest</option>
                                                                    <option value="MAX">Latest</option>
                                                                    <option value="AVG">Average</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 mb-2">
                                                            <h6>With the same ... </h6>
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                <select name="group1" class="form-select" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="vaccine_brand">Vaccine Brand</option>
                                                                    <option value="vaccine_center.facility_type">Facility Type</option>
                                                                    <option value="vaccine_center.city">City</option>
                                                                    <option value="health_authority">Health Authority</option>
                                                                    <option value="date">Appointment Date</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Result</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="summary d-flex px-6 py-3">
                                    <div class="name ms-4">
                                        <?php
                                            if (isset($_POST["time1"]) and isset($_POST["agg1"]) and isset($_POST["greater_less1"]) and isset($_POST["group1"])){
                                                $sql = "SELECT facility_ID, address, city 
                                                FROM Vaccine_Center 
                                                WHERE {$_POST["time1"]} {$_POST["greater_less1"]}  ALL (SELECT SEC_TO_TIME({$_POST["agg1"]}(TIME_TO_SEC(`time`))) AS t 
                                                FROM Appointments, Vaccine_Center, City_In_HA where Appointments.facility_ID = Vaccine_Center.facility_ID AND City_In_HA.city = Vaccine_Center.city 
                                                GROUP BY {$_POST["group1"]})";
                                                $results = $conn->query($sql);    
                                                if ($results->num_rows > 0){
                                                    while($row = $results->fetch_assoc()){
                                                        echo "<h6> id: {$row['facility_ID']}";
                                                        echo "<h6> address: {$row['address']}, {$row['city']}";
                                                        echo "<br>";
                                                        echo "<br>";
                                                    }
                                                }
                                                unset($_POST);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="row">
                    <div class="col-12 col-lg-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Numbers per Health Authority </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            
                                            <form action="stats.php" method="post" class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-10 mb-2">
                                                            <h6>(List, Total, Average#, Min#, Max#)</h6>
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                <select name="agg2" class="form-select" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="c">List</option>
                                                                    <option value="SUM(c)">Total</option>
                                                                    <option value="AVG(c)">Average</option>
                                                                    <option value="MIN(c)">Minimum</option>
                                                                    <option value="MAX(c)">Maximum</option>
                                                                </select>
                                                            </div>
                                                        </div>                             
                                                        <div class="col-md-10 mb-2">
                                                            <h6>Number of </h6>
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                <select name="type2" class="form-select" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="Vaccine_Center">Vaccine Centres</option>
                                                                    <option value="Testing_Center">Testing Centres</option>
                                                                    <option value="Appointments">Appointments</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Result</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="summary d-flex px-6 py-3">
                                    <div class="name ms-4">
                                        <?php
                                            if (isset($_POST["agg2"]) and isset($_POST["type2"])){
                                                if ($_POST["type2"] == "Testing_Center") {
                                                    $sql = "SELECT temp.ha, {$_POST["agg2"]} as result
                                                    FROM (SELECT Health_Authority as ha, Count(*) as c
                                                    FROM Testing_Center, City_In_HA where City_In_HA.city = Testing_Center.city 
                                                    GROUP BY Health_Authority) AS temp";
                                                }
                                                else if ($_POST["type2"] == "Vaccine_Center") {
                                                    $sql = "SELECT temp.ha, {$_POST["agg2"]} as result
                                                    FROM (SELECT Health_Authority as ha, Count(*) as c
                                                    FROM Vaccine_Center, City_In_HA where City_In_HA.city = Vaccine_Center.city 
                                                    GROUP BY Health_Authority) AS temp";
                                                }
                                                else {
                                                    $sql = "SELECT temp.ha, {$_POST["agg2"]} as result
                                                    FROM (SELECT Health_Authority as ha, Count(*) as c
                                                    FROM Appointments, Vaccine_Center, City_In_HA where Appointments.facility_ID = Vaccine_Center.facility_ID AND City_In_HA.city = Vaccine_Center.city 
                                                    GROUP BY Health_Authority) AS temp";
                                                }
                                                $results = $conn->query($sql);    
                                                if ($results->num_rows > 0){
                                                    while($row = $results->fetch_assoc()){
                                                        if ($_POST["agg2"] == "c") {
                                                            echo "<h6> HA: {$row['ha']}";
                                                        }
                                                        echo "<h6> result: {$row['result']}";
                                                        echo "<br>";
                                                        echo "<br>";
                                                    }
                                                }
                                                unset($_POST);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="row">
                    <div class="col-12 col-lg-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Vaccine Numbers in Inventory per Brand or Inventory</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            
                                            <form action="stats.php" method="post" class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-10 mb-2">
                                                            <h6>(Total, Num of Brands)</h6>
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                <select name="agg3" class="form-select" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="SUM(amount)">Total</option>
                                                                    <option value="COUNT(amount)"># of Brands/Facilities </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10 mb-2">
                                                            <h6>per (Brand/Facility) </h6>
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                <select name="type3" class="form-select" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="brand">Brand</option>
                                                                    <option value="facility_ID">Facility Centres</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                                            <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Result</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="summary d-flex px-6 py-3">
                                    <div class="name ms-4">
                                        <?php
                                            if (isset($_POST["agg3"]) and isset($_POST["type3"])){
                                                $sql = "SELECT {$_POST["type3"]}, {$_POST["agg3"]} as result
                                                FROM Inventory_Of_Vaccine
                                                GROUP BY {$_POST["type3"]}";
                                                
                                                $results = $conn->query($sql);    
                                                if ($results->num_rows > 0){
                                                    while($row = $results->fetch_assoc()){
                                                        if ($_POST["type3"] == "brand") {
                                                            echo "<h6> brand: {$row['brand']}";
                                                        } 
                                                        else {
                                                            echo "<h6> facility ID: {$row['facility_ID']}";
                                                        }
                                                        echo "<h6> result: {$row['result']}";
                                                        echo "<br>";
                                                        echo "<br>";
                                                    }
                                                }
                                                unset($_POST);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                
            </div>
            <?php
                CloseCon($conn);
            ?>
        </div>
    </div>
    <script src="../assets/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>
