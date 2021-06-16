
<!DOCTYPE html>
<html lang="en">
<?php
    include '../connect.php';
    $conn = OpenCon();
    
    session_start();
    // for single page testing
    if (!isset($_SESSION['userid'])) {
        $_SESSION['userid'] = 80001;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BC Health COVID-19</title>

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
                            <a href="index.php"><img src="../medical.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
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
                <h3> Welcome! ∠( ᐛ 」∠)＿</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                            $sql = "SELECT name, phn FROM patient WHERE user_ID = {$_SESSION['userid']}";
                                            $results = $conn->query($sql);
                                            
                                            $row = $results->fetch_assoc();
                                            echo '<h5 class="font-bold">' . $row['name'] . '</h5>';
                                            echo '<h6 class="text-muted mb-0">PHN: ' . $row['phn'] . '</h6>';
                                        ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Upcoming Appointments</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Location</th>
                                                        <th>Contact Info</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $sql = "SELECT date, time, address, city, phone FROM Appointments, Vaccine_Center 
                                                        WHERE p_ID = {$_SESSION['userid']} AND Appointments.facility_ID = Vaccine_Center.facility_ID 
                                                        ORDER BY date ASC";
                                                    $results = $conn->query($sql);
                                                    if ($results->num_rows > 0){
                                                        while($row = $results->fetch_assoc()){
                                                            echo "<tr><td class='col-3'><div class='d-flex align-items-center'>
                                                            <p class='font-bold ms-3 mb-0'>".$row["date"]."</p>
                                                            </div></td><td class='col-auto'>
                                                            <p class=' mb-0'>".$row["time"]."</p>
                                                            </td><td class='col-auto'>
                                                            <p class=' mb-0'>".$row["address"].", ".$row["city"]."</p>
                                                            </td><td class='col-auto'>
                                                            <p class=' mb-0'>".$row["phone"]."</p>
                                                            </td></tr>";
                                                            
                                                        }
                                                    }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Summary</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="summary d-flex px-6 py-3">
                                    <div class="name ms-4">
                                        <h5 class="text-center"># Vaccine Records</h5>
                                        <?php
                                            $sql = "SELECT COUNT(*) AS total FROM Vaccine_Record WHERE user_ID = {$_SESSION['userid']}";
                                            $results = $conn->query($sql);
                                            $row = $results->fetch_assoc();
                                            echo '<h6 class="text-muted text-center">'.$row['total'].'</h6>';
                                        ?>
                                    </div>
                                </div>
                                <div class="summary d-flex px-6 py-3">
                                    <div class="name ms-4">
                                        <h5 class="text-center"># Testing Records</h5>
                                        <?php
                                            $sql = "SELECT COUNT(*) AS total FROM Testing_Record WHERE user_ID = {$_SESSION['userid']}";
                                            $results = $conn->query($sql);
                                            $row = $results->fetch_assoc();
                                            echo '<h6 class="text-muted text-center">'.$row['total'].'</h6>';
                                        ?>
                                    </div>
                                </div>
                                <div class="summary d-flex px-6 py-3">
                                    <div class="name ms-4">
                                        <h5 class="text-center"># Appointments</h5>
                                        <?php
                                            $sql = "SELECT COUNT(*) AS total FROM Appointments WHERE p_ID = {$_SESSION['userid']}";
                                            $results = $conn->query($sql);
                                            $row = $results->fetch_assoc();
                                            echo '<h6 class="text-muted text-center">'.$row['total'].'</h6>';
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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>
