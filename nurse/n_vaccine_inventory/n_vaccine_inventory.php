
<?php
include '../../connect.php';
$conn = OpenCon();

session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vaccine Inventory - BC Health COVID-19</title>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/bootstrap.css">
    
        <link rel="stylesheet" href="../../assets/iconly/bold.css">
    
        <link rel="stylesheet" href="../../assets/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="../../assets/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="../../assets/app.css">
        <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
    </head>
    
    <body>
        <div id="app">
            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header">
                        <div class="d-flex justify-content-between">
                            <div class="logo">
                                <a href="../nurse_main.php"><img src="../../medical.png" alt="Logo" srcset=""></a>
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
                                <a href="../nurse_main.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item ">
                                <a href="../stats.php" class='sidebar-link'>
                                    <i class="bi bi-bar-chart-line"></i>
                                    <span>Statistics</span>
                                </a>
                            </li>
                            <li class="sidebar-item  ">
                                <a href="../appointment_summary.php" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Upcoming Appointments</span>
                                </a>
                            </li>
                            <li class="sidebar-item  ">
                                <a href="../medical_report.php" class='sidebar-link'>
                                    <i class="bi bi-pen-fill"></i>
                                    <span>Special Medical Report</span>
                                </a>
                            </li>
    
                            <li class="sidebar-item  ">
                                <a href="../vaccination_centres.php" class='sidebar-link'>
                                    <i class="bi bi-hexagon-fill"></i>
                                    <span>Vaccination Centres</span>
                                </a>
                            </li>
    
                            <li class="sidebar-item  ">
                                <a href="../testing_centres.php" class='sidebar-link'>
                                    <i class="bi bi-egg-fill"></i>
                                    <span>Testing Centres</span>
                                </a>
                            </li>
    
                            <li class="sidebar-title">Records</li>
                            
                            <li class="sidebar-item  ">
                                <a href="../patient_list.php" class='sidebar-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Patient List</span>
                                </a>
                            </li>
                            <li class="sidebar-item active ">
                                <a href="../n_vaccine_inventory/n_vaccine_inventory.php" class='sidebar-link'>
                                    <i class="bi bi-collection-fill"></i>
                                    <span>Vaccine Inventory</span>
                                </a>
                            </li>
                            <li class="sidebar-item  ">
                                <a href="../n_testing_inventory/n_testingkit_inventory.php" class='sidebar-link'>
                                    <i class="bi bi-collection-fill"></i>
                                    <span>Testing Kit Inventory</span>
                                </a>
                            </li>
                            <li class="sidebar-title"> </li>
                            
                            <li class="sidebar-item  ">
                                <a href="../../logout.php" class='sidebar-link'>
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
                        <h3>Vaccine Inventory</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="nurse_main.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vaccine Inventory</li>
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
                                <h5 class="card-title">Filter by Brand</h5>
                            </div>

                                <div class="card-body">

                                    <div class="col-md-6 mb-4">
                                        <h6>Filter</h6>
                                        <form id="myform_v" action="n_vaccine_inv_filter.php" method="post">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text"
                                                       for="brand">Vaccine Brand</label>
                                                <select class="form-select" name="brand" onchange="this.form.submit();">
                                                    <option value=""> All</option>
                                                    <?php
                                                    $sql = "SELECT brand FROM Vaccine_Brand_Delivery";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            $b = str_replace(' ', '_', $row["brand"]);

                                                            echo "<option value=".$b;
                                                            if(isset($_GET['v_brand'])) {
                                                                if(str_replace('_', ' ', $_GET['v_brand']) == $row["brand"]){
                                                                    echo " selected='selected'";
                                                                }
                                                            }
                                                            echo ">".$row["brand"]."</option>";

                                                        }
                                                    }



                                                    ?>
                                                </select>
                                            </div>
                                        </form>


                                    </div>


<!--                                    <div class="btn-group mb-1">-->
<!--                                        <div class="dropdown">-->
<!--                                            <button class="btn btn-primary dropdown-toggle me-1" type="button"-->
<!--                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"-->
<!--                                                    aria-haspopup="true" aria-expanded="false">-->
<!--                                                Brand-->
<!--                                            </button>-->
<!--                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
<!--                                                <a class="dropdown-item" href="#">Moderna</a>-->
<!--                                                <a class="dropdown-item" href="#">Janssen</a>-->
<!--                                                <a class="dropdown-item" href="#">Pfizer-BioNTech</a>-->
<!--                                                <a class="dropdown-item" href="#">AstraZeneca</a>-->
<!--                                                <a class="dropdown-item" href="#">Novavax</a>-->
<!--                                                <a class="dropdown-item" href="#">Gamaleya</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="btn-group mb-1">-->
<!--                                        <div class="dropdown">-->
<!--                                            <button class="btn btn-secondary dropdown-toggle me-1" type="button"-->
<!--                                                    id="dropdownMenuButtonSec" data-bs-toggle="dropdown"-->
<!--                                                    aria-haspopup="true" aria-expanded="false">-->
<!--                                                City-->
<!--                                            </button>-->
<!--                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">-->
<!--                                                <a class="dropdown-item" href="#">Richmond</a>-->
<!--                                                <a class="dropdown-item" href="#">Vancouver</a>-->
<!--                                                <a class="dropdown-item" href="#">Sechelt</a>-->
<!--                                                <a class="dropdown-item" href="#">Saanichton</a>-->
<!--                                                <a class="dropdown-item" href="#">Kelowna</a>-->
<!--                                                <a class="dropdown-item" href="#">Burnaby</a>-->
<!--                                                <a class="dropdown-item" href="#">Coquitlam</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                        <tr>
                                            <!--(facility_ID: INTEGER, brand: ENUM , amount: INTEGER-->
                                            <th>Facility</th>
                                            <th>Location</th>
                                            <th>Vaccine Brand</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        if (isset($_GET['v_brand'])) {
                                            $brand = str_replace('_', " ",$_GET['v_brand']);
                                            $sql = "SELECT * FROM Inventory_Of_Vaccine, Vaccine_Center 
                                                WHERE Inventory_Of_Vaccine.brand like '%$brand%' AND Inventory_Of_Vaccine.facility_ID = Vaccine_Center.facility_ID";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            $sql = "SELECT * FROM Inventory_Of_Vaccine, Vaccine_Center 
                                            WHERE Inventory_Of_Vaccine.facility_ID = Vaccine_Center.facility_ID";
                                            $result = $conn->query($sql);
                                        }

                                        if ($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                echo "<tr>
                                            <td>".$row["facility_ID"]."</td>
                                            <td>".$row["address"].", ".$row["city"]."</p></td>
                                            <td>".$row["brand"]."</td>
                                            <td>".$row["amount"]."</td>
                                            </tr>";
                                            }
                                        } else {
                                            echo '0 records';
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
            <!-- Basic Dropdown End -->

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
