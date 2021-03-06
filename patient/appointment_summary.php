
<!-- https://www.skypack.dev/ for confetti -->
<!DOCTYPE html>
<html lang="en">

<?php
    include '../connect.php';
    $conn = OpenCon();
    
    session_start();
    // for single page testing
    if (!isset($_SESSION['userid'])) {
        $_SESSION['userid'] = 80002;
    }
?>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Summary - BC Health COVID-19</title>

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
                            <a href="../index.php"><img src="../medical.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu ">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="booking.php" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Book An Appointment</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
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
                <h3>Appointment Successfully Booked!</h3>
            </div>
            <div class="page-content">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Your Appointment Details</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">                                            
                                            <div class="table-responsive">
                                                <table class="table table-hover table-lg">
                                                    <thead>
                                                   </thead>
                                                    <tbody>
                                                        <?php
                                                            $sql = "SELECT name, date, time, vaccine_brand, Vaccine_Center.address, city FROM Appointments, Patient, Vaccine_Center WHERE app_ID = {$_GET['appID']} AND Patient.user_ID = Appointments.p_ID AND Vaccine_Center.facility_ID = Appointments.facility_ID";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0){
                                                                $row = $result->fetch_assoc();

                                                                echo "<tr><td class='col-auto'>
                                                                <p class=' mb-0'>Name</p>
                                                                </td><td class='col-auto'>
                                                                <p class=' mb-0'>".$row["name"]."</p></td></tr>";

                                                                echo "<tr><td class='col-auto'>
                                                                <p class=' mb-0'>Location</p>
                                                                </td><td class='col-auto'>
                                                                <p class=' mb-0'>".$row["address"].", ".$row["city"]."</p></td></tr>";
                    
                                                                echo "<tr><td class='col-auto'>
                                                                <p class=' mb-0'>Date</p>
                                                                </td><td class='col-auto'>
                                                                <p class=' mb-0'>".$row["date"]."</p></td></tr>";
                                                                
                                                                echo "<tr><td class='col-auto'>
                                                                <p class=' mb-0'>Time</p>
                                                                </td><td class='col-auto'>
                                                                <p class=' mb-0'>".$row["time"]."</p></td></tr>";

                                                                echo "<tr><td class='col-auto'>
                                                                <p class=' mb-0'>Preferred Brand</p>
                                                                </td><td class='col-auto'>
                                                                <p class=' mb-0'>".$row["vaccine_brand"]."</p></td></tr>";
                                                                
                                                                

                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <form>
                                                    <script type="module">
                                                        import confetti from 'https://cdn.skypack.dev/canvas-confetti';
                                                        confetti();
                                                    </script>
                                                    <button class="btn btn-light-primary me-1 mb-1" formaction="index.php">Return to Dashboard</button>
                                                </form>
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
    </div>
    <?php
        CloseCon($conn);
    ?>
    <script src="../assets~/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>
