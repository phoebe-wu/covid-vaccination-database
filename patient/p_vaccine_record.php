
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
    <title>Vaccination Record - BC Health COVID-19</title>

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
                        <li class="sidebar-item  active">
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
                <h3>Record of Vaccines</h3>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4><b>Your Vaccine Record</b></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>User id</th>
                                <th>Record id</th>
                                <th>Date</th>
                                <th>Dose</th>
                                <th>Brand</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php                                                            
                                    $sql = "SELECT user_ID, record_ID, date, dose, brand FROM Vaccine_Record where user_ID = {$_SESSION['userid']}";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0){
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr>
                                            <td>".$row["user_ID"]."</td>
                                            <td>".$row["record_ID"]."</td>
                                            <td>".$row["date"]."</td>
                                            <td>".$row["dose"]."</td>
                                            <td>".$row["brand"]."</td>
                                            </tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
            <?php
                CloseCon($conn);
            ?>    
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
