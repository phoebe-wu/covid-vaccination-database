<?php
    include '../connect.php';
    $conn = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient List - BC Health COVID-19</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap.css">

    <link rel="stylesheet" href="../assets/iconly/bold.css">

    <link rel="stylesheet" href="../assets/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="stylesheet" href="../assets/choices.min.css"/>
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
                        <h3>Patient List</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="nurse_main.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Patients</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
		  <br>
		  <section id="input-group-buttons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Find a Patient</h4>
							 <p> Look up a patient with their name <span style="font-weight:bold;"> OR </span> personal health number </p>
                                    <form method="post" action="patient_list.php">
                                        <div class="btn-group me-1 mb-1">
                                            <select name="dosage" class="form-select" id="basicSelect">
                                                <option value="" selected>Vaccination Status</option>
                                                <option value="1">Vaccinated with One Dose</option>
                                                <option value="2">Vaccinated with Two Doses</option>
                                                <option value="0">Unvaccinated</option>
                                            </select>
                                        </div>
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
                                            <select name="result" class="form-select" id="basicSelect">
                                                <option value="" selected>Test Result</option>
                                                <?php 
                                                    $sql = "SELECT result FROM Testing_Record GROUP BY result";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "<option value=".$row["result"].">".$row["result"]."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="btn-group me-1 mb-1">
                                                
                                                <input type="text" class="form-control form-control" name="medical_cond" placeholder="Medical Condition">
                                        </div>
                                        <br>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1"> 
                                                                <i class="bi bi-search"></i></span>
                                                            <input type="text" class="form-control" name="nameToSearch"
                                                                placeholder="Name"
                                                                aria-label="Recipient's username"
                                                                aria-describedby="search_name">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="bi bi-search"></i></span>
                                                            <input type="text" class="form-control" name="phn"
                                                                    placeholder="Personal Health Number"
                                                                    aria-label="Recipient's username"
                                                                    aria-describedby="button-addon2">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button class="btn btn-outline-secondary" type="submit" name="nameSubmit"
                                                    id="search_name">Search</button>
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
               </section>
               <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-content">
                                 <div class="card-body">
                                    <table class="table table-striped" id="table1">
                                        <tr>
                                           <th>PHN</th>
                                           <th>Name</th>
                                           <th>Address</th>
                                           <th>Age</th>
                                           <th>Manage Record</th>
                                           <th>Delete Patient</th>
                                        </tr>
                                        <?php
                                        
                                            $sql = "SELECT Patient.user_ID, Patient.name, Patient.age, Patient.phn, Patient.address
                                                FROM Patient";   
                                            if ($_POST['medical_cond'] != ''){
                                                $sql = $sql.", Has_Medical_Condition";
                                                }
                                            if (($_POST['dosage'] != '') or ($_POST['brand'] != '')){
                                                $sql = $sql.", Vaccine_Record";
                                                }
                                            if ($_POST['result'] != ''){
                                                $sql = $sql.", Testing_Record";
                                            }
                                            if (($_POST['medical_cond'] != '') or ($_POST['dosage'] != '') 
                                                or ($_POST['brand'] != '') or ($_POST['result'] != '') 
                                                or ($_POST['nameToSearch'] != '') or ($_POST['phn'] != '')) {
                                                
                                                $sql = $sql." WHERE";
                                                $and = 0;
                                                if ($_POST['medical_cond'] != ''){
                                                    $sql = $sql." Patient.user_ID = Has_Medical_Condition.user_ID AND description = '{$_POST['medical_cond']}'";
                                                    $and = 1;
                                                }
                                                if (($_POST['dosage'] != '') or ($_POST['brand'] != '')){
                                                    if ($and == 1) {
                                                        $sql = $sql." AND";
                                                        $and = 0;
                                                    }
                                                    $sql = $sql." Patient.user_ID = Vaccine_Record.user_ID";
                                                    $and = 1;
                                                    
                                                    if ($_POST['dosage'] != ''){
                                                        $sql = $sql." AND Vaccine_Record.dose = {$_POST['dosage']}";
                                                    }
                                                    if ($_POST['brand'] != ''){
                                                        if ($and == 1) {
                                                            $sql = $sql." AND";
                                                            $and = 0;
                                                        }
                                                        $sql = $sql." Vaccine_Record.brand = '{$_POST['brand']}'";
                                                        $and = 1;
                                                    }
                                                }
                                                if ($_POST['result'] != ''){
                                                    if ($and == 1) {
                                                        $sql = $sql." AND";
                                                        $and = 0;
                                                    }
                                                    $sql = $sql." Patient.user_ID = Testing_Record.user_ID AND Testing_Record.result = '{$_POST['result']}'";
                                                    $and = 1;
                                                }
                                                if ($_POST['nameToSearch'] != ''){
                                                    if ($and == 1) {
                                                        $sql = $sql." AND";
                                                        $and = 0;
                                                    }
                                                    $sql = $sql." Patient.name LIKE '%{$_POST['nameToSearch']}%'";
                                                    $and = 1;
                                                }
                                                if ($_POST['phn'] != ''){
                                                    if ($and == 1) {
                                                        $sql = $sql." AND";
                                                        $and = 0;
                                                    }
                                                    $sql = $sql." Patient.phn = {$_POST['phn']}";
                                                }
                                            }
                                                
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                            // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>".$row['phn']."</td>";
                                                    echo "<td>".$row['name']."</td>";
                                                    echo "<td>".$row['address']."</td>";
                                                    echo "<td>".$row['age']."</td>";
                                                    echo "<td> <a href='patient_record.php?id=".$row["user_ID"]."'class='badge bg-light-primary'> Manage</a></td>";
                                                    echo "<td> <a href='delete_patient.php?id=".$row["user_ID"]."'class='badge bg-light-danger'> Delete</a></td>";
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
        </div>
    </div>
    <script src="../assets~/perfect-scrollbar/perfect-scrollbar.min.js"></script>
</body>
</html>
