<?php
    include '../connect.php';
    $conn = OpenCon();
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
                        <h3>Upcoming Appointments</h3>
                        <p class="text-subtitle text-muted">Summary page</p>
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
                            <div class="card-body">
                                <p>Filter By</p>
                                <div class="btn-group mb-1">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Brand
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Moderna</a>
                                            <a class="dropdown-item" href="#">Janssen</a>
                                            <a class="dropdown-item" href="#">Pfizer-BioNTech</a>
                                            <a class="dropdown-item" href="#">AstraZeneca</a>
                                            <a class="dropdown-item" href="#">Novavax</a>
                                            <a class="dropdown-item" href="#">Gamaleya</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group mb-1">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle me-1" type="button"
                                                id="dropdownMenuButtonSec" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            City
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
                                            <a class="dropdown-item" href="#">Richmond</a>
                                            <a class="dropdown-item" href="#">Vancouver</a>
                                            <a class="dropdown-item" href="#">Sechelt</a>
                                            <a class="dropdown-item" href="#">Saanichton</a>
                                            <a class="dropdown-item" href="#">Kelowna</a>
                                            <a class="dropdown-item" href="#">Burnaby</a>
                                            <a class="dropdown-item" href="#">Coquitlam</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group mb-1">
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle me-1" type="button"
                                                id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Time
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item" href="#">tomorrow</a>
                                            <a class="dropdown-item" href="#">in 7 days</a>
                                            <a class="dropdown-item" href="#">past</a>
                                        </div>
                                    </div>
                                </div>

                                <p>Sort by</p>
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input" type="radio" name="Primary" id="Primary"
                                           checked>
                                    <label class="form-check-label" for="Primary">
                                        descending date (future to past)
                                    </label>
                                </div>
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input" type="radio" name="Primary" id="Secondary"
                                           checked>
                                    <label class="form-check-label" for="Secondary">
                                        ascending date (past to future)
                                    </label>
                                </div>
                                <br>
                                <div class="col-md-6 col-12">
                                    <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="bi bi-search"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="Patient id"
                                               aria-label="Patient id"
                                               aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="button"
                                                id="button-addon2">Search</button>
                                    </div>
                                </div>
                                <table class="table table-striped" id="table1">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Facility id</th>
                                        <th>Patient id</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Vaccine Brand</th>
                                        <th>Dose</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>2021-05-21</th>
                                        <td>4201231</td>
                                        <td>10002</td>
                                        <td>123 street</td>
                                        <td>Vancouver</td>
                                        <td>Moderna</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <th>2021-06-21</th>
                                        <td>114224</td>
                                        <td>10004</td>
                                        <td>234 street</td>
                                        <td>Richmond</td>
                                        <td>Janssen</td>
                                        <td>2</td>
                                    </tr>
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