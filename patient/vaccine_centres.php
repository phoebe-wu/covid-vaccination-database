<!DOCTYPE html>
<html lang="en">

<?php
    include '../connect.php';
    $conn = OpenCon();
    session_start();
    
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
				<h3>BC Covid-19 Vaccination Centres</h3>
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
                                                            $sql = "SELECT DISTINCT city FROM Vaccine_Center";
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
                                                    <select class="choices form-select" name="vbrands">
<!--                                                    <select class="choices form-select multiple-remove" multiple="multiple" name="vbrands">-->
                                                        <option value=""> All</option>
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

                                            <ul class="list-unstyled mb-0">
                                                <p> Choose the columns you want to show in the table.
<!--                                                <li class="d-inline-block me-2 mb-1">-->
<!--                                                    <div class="form-check">-->
<!--                                                        <div class="checkbox">-->
<!--                                                            <input type="checkbox" id="checkbox1" class="form-check-input"-->
<!--                                                                   checked>-->
<!--                                                            <label for="checkbox1">All</label>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </li>-->

                                                <?php
                                                $arrayAttr1 = array( 'All','address', 'phone','city','opening_time',
                                                    'closing_time','facility_type','Link to Book');
                                                $arrayAttr2 = array( 'All','address', 'phone','city','brand','opening_time',
                                                    'closing_time','facility_type','Link to Book');
                                                if (isset($_GET['Vbrands'])) { //vbrands selected, two table join
                                                    foreach ($arrayAttr2 as $attr) {

                                                            echo "<li class='d-inline-block me-2 mb-1'>
                                                            <div class='form-check'>
                                                            <div class='checkbox'>
                                                            <input type='checkbox' class='form-check-input' id='checkbox2'
                                                            name='attribute[]' value='$attr'";
                                                            if (isset($_GET['Column'])) {       //columns selected
                                                                $attrib = json_decode($_GET['Column']);
                                                                if(in_array($attr, $attrib)) {
                                                                    echo "checked";
                                                                }
                                                            } else {                              //columns not selected, initially
                                                                if ($attr == "All"){
                                                                    echo "checked";
                                                                }
                                                            }

                                                            echo ">"."<label for='checkbox2'> $attr </label>";

//                                                        else {
//                                                            echo "<li class='d-inline-block me-2 mb-1'>
//                                                            <div class='form-check'>
//                                                            <div class='checkbox'>
//                                                            <input type='checkbox' class='form-check-input' id='checkbox2'
//                                                            name='attribute' value='$attr'>
//                                                            <label for='checkbox2'> $attr </label>";
//                                                        }
                                                    }
                                                } else {                        //vbrand not selected, will not join tables
                                                    foreach ($arrayAttr1 as $attr) {

                                                        echo "<li class='d-inline-block me-2 mb-1'>
                                                            <div class='form-check'>
                                                            <div class='checkbox'>
                                                            <input type='checkbox' class='form-check-input' id='checkbox2'
                                                            name='attribute[]' value='$attr'";
                                                        if (isset($_GET['Column'])) {       //columns selected
                                                            $attrib = json_decode($_GET['Column']);
                                                            if(in_array($attr,$attrib)) {
                                                                echo "checked";
                                                            }
                                                        } else {                              //columns not selected, initially
                                                            if ($attr == "All"){
                                                                echo "checked";
                                                            }
                                                        }

                                                        echo ">"."<label for='checkbox2'> $attr </label>";

//                                                        else {
//                                                            echo "<li class='d-inline-block me-2 mb-1'>
//                                                            <div class='form-check'>
//                                                            <div class='checkbox'>
//                                                            <input type='checkbox' class='form-check-input' id='checkbox2'
//                                                            name='attribute' value='$attr'>
//                                                            <label for='checkbox2'> $attr </label>";
//                                                        }
                                                    }

                                                }
                                                ?>
                                            </ul>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit"
                                                        class="btn btn-primary me-1 mb-1"
                                                        formaction="vaccine_centres_filter.php" name="submit">
                                                    Submit</button>
<!--                                                <button type="reset"-->
<!--                                                        class="btn btn-light-secondary me-1 mb-1" formaction="vaccine_centres_filter.php" name="reset">-->
<!--                                                    Reset</button>-->
                                            </div>



										</div>
										<table class="table table-striped" id="table1">
											<thead>

												<tr>
                                                    <?php

                                                    if (isset($_GET['Vbrands'])) { //vbrands selected, two table join
                                                        if (isset($_GET['Column'])) {       //columns selected
                                                            $attrib = json_decode($_GET['Column']);
                                                            if (in_array("All", $attrib)){
                                                                echo'
                                                            <th>Address</th>
                                                            <th>Phone</th>
                                                            <th>City</th>
                                                            <th>brand </th>
                                                            <th>Opening Time</th>
                                                            <th>Closing Time</th>
                                                            <th>Facility Type</th>
                                                            <th>Link to Book</th>';
                                                            } else{
                                                                foreach ($attrib as $a){
                                                                    echo "<th>$a</th>";
                                                                }
                                                            }
                                                        } else {                              //columns not selected, initially
                                                            echo'
                                                            <th>Address</th>
                                                            <th>Phone</th>
                                                            <th>City</th>
                                                            <th>brand</th>
                                                            <th>Opening Time</th>
                                                            <th>Closing Time</th>
                                                            <th>Facility Type</th>
                                                            <th>Link to Book</th>';
                                                        }
                                                    } else {                        //vbrand not selected, will not join tables
                                                        if (isset($_GET['Column'])) {       //columns selected
                                                            $attrib = json_decode($_GET['Column']);

                                                            //echo "the passed attrib is".print_r($attrib);

                                                            if (in_array("All", $attrib)){
                                                                echo'<th>Address</th>
                                                            <th>Phone</th>
                                                            <th>City</th>
                                                            <th>Opening Time</th>
                                                            <th>Closing Time</th>
                                                            <th>Facility Type</th>
                                                            <th>Link to Book</th>';
                                                            } else{
                                                                foreach ($attrib as $a){
                                                                    echo "<th>".strval($a)."</th>";
                                                                }
                                                            }
                                                        } else {                              //columns not selected, initially
                                                            echo'<th>Address</th>
                                                            <th>Phone</th>
                                                            <th>City</th>
                                                            <th>Opening Time</th>
                                                            <th>Closing Time</th>
                                                            <th>Facility Type</th>
                                                            <th>Link to Book</th>';
                                                        }
                                                    }
                                                    ?>

												</tr>
											</thead>
											<tbody>
												<?php
                                                $attrib = array('');
                                                if (isset($_GET['Column'])) {
                                                    $attrib = json_decode($_GET['Column']);
                                                }
                                                if (isset($_GET['Column']) && (!in_array("All", $attrib)) ) {       //columns selected & All is not selected
                                                    $temp = $attrib;
                                                    if (in_array('Link to Book',$attrib)) {
                                                        array_pop($temp);
                                                    }
                                                    $coln = implode(' , ',$temp);
//                                                    var_dump($coln);

                                                    $result2 = '';

                                                        if (isset($_GET['Vbrands'])) { //vbrands selected, two table join
                                                            $vbrand = $_GET['Vbrands'];
                                                            $sql_join = "CREATE VIEW vc_iv_join AS
                                                                        SELECT vc.facility_ID, vc.phone, vc.address, vc.opening_time, vc.closing_time,vc.facility_type,vc.city,
                                                                                iv.brand
                                                                        FROM Vaccine_Center AS vc
                                                                        JOIN Inventory_Of_Vaccine AS iv
                                                                        ON vc.facility_ID = iv.facility_ID";
                                                            $result = mysqli_query($conn, $sql_join);
//
//                                                            if($result == 0) {
//                                                                echo 'create view error';
//                                                            }
                                                            if (isset($_GET['Vcity'])) {       //city is selected
                                                                $vcity = $_GET['Vcity'];
                                                                $sql = " SELECT $coln FROM vc_iv_join Where city like '$vcity' AND brand like '$vbrand'";
                                                                $sql2 = " SELECT * FROM vc_iv_join Where city like '$vcity' AND brand like '$vbrand'";
//                                                                var_dump($sql);
//                                                                var_dump($sql2);
                                                                $result = mysqli_query($conn, $sql);
                                                                $result2 = mysqli_query($conn,$sql2);
                                                            } else {        //city is not selected
                                                                $sql = " SELECT $coln FROM vc_iv_join Where brand like '$vbrand'";
                                                                $sql2 =" SELECT * FROM vc_iv_join Where brand like '$vbrand'";
//                                                                var_dump($sql);
//                                                                var_dump($sql2);
                                                                $result = mysqli_query($conn, $sql);
                                                                $result2 = mysqli_query($conn,$sql2);
                                                            }

                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while(($row = $result->fetch_array(MYSQLI_NUM)) && ($row2 = $result2->fetch_assoc())) {
                                                                    echo "<tr>";
                                                                    if (!in_array('Link to Book',$attrib)){
                                                                        for ($i = 0; $i < count($temp); $i++) {
                                                                            echo "<td class='border-class'>".$row["$i"];
                                                                        }
//                                                                        foreach ($attrib as $item) {
//                                                                            echo "$item";
//                                                                            echo "<tr><td class='border-class'>".$row[$item];
//                                                                        }
                                                                        echo "</td>";
                                                                    } else{
                                                                        for ($i = 0; $i < count($temp); $i++) {
                                                                            echo "<td class='border-class'>".$row["$i"];
                                                                        }
//                                                                        foreach ($temp as $item) {
//                                                                            echo "<tr><td class='border-class'>".$row[$item];
//                                                                        }
                                                                        echo "</td> 
                                                                                <td> <a href='booking.php?f_ID=".$row2["facility_ID"]."'
                                                                                        class='badge bg-light-primary'> Book Here</a> 
                                                                                        </td>";
                                                                }
                                                                    }
                                                                echo "</tr></table>";
                                                                $sql_drop = "DROP VIEW vc_iv_join";
                                                                $result_drop = $conn->query($sql_drop);
                                                                if ($result_drop == 0) {
                                                                    echo 'error dropping view';
                                                                }
                                                            } else {echo "0 results";}






                                                        } else {                        //vbrand not selected, will not join tables

                                                            $result='';
                                                            if (isset($_GET['Vcity'])) {        //city is selected
                                                                $vcity = $_GET['Vcity'];
                                                                $sql = "SELECT $coln FROM Vaccine_Center Where city like '$vcity'";
                                                                $sql2 = " SELECT * FROM Vaccine_Center Where city like '$vcity'";
//                                                                var_dump($sql);
//                                                                var_dump($sql2);
                                                                $result = $conn->query($sql);
                                                                $result2 = mysqli_query($conn,$sql2);

                                                            } else {
                                                                $sql = "SELECT $coln FROM Vaccine_Center";
                                                                $sql2 = "SELECT * FROM Vaccine_Center";
//                                                                var_dump($sql);
//                                                                var_dump($sql2);
                                                                $result = $conn->query($sql);
                                                                $result2 = $conn->query($sql2);

//                                                                var_dump($result2);
//                                                                if ($result==0) {
//                                                                    echo "FAILED";
//                                                                } else {
//                                                                    echo "SUCCESS";
//                                                                }

                                                            }
                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while(($row = $result->fetch_array(MYSQLI_NUM))&&($row2 = $result2->fetch_array(MYSQLI_NUM))) {
                                                                    if (!in_array('Link to Book',$attrib)){
                                                                        echo $row2;
                                                                        echo "<tr>";
                                                                        for ($i = 0; $i < count($temp); $i++) {
                                                                            echo "<td class='border-class'>".$row["$i"];
                                                                        }

//                                                                        foreach ($attrib as $item) {
//                                                                            echo "THE ITEM INDEX IS $item";
//                                                                            $input = strval($item);
//                                                                            echo "THE ITEM INPUT IS $input";
//                                                                            echo "<tr><td class='border-class'>".$row['$input'];
//                                                                        }

                                                                        echo "</td>";
                                                                    } else{
                                                                        echo "<tr>";
                                                                        for ($i = 0; $i < count($temp); $i++) {
                                                                            echo "<td class='border-class'>".$row["$i"];
                                                                        }
//                                                                        foreach ($temp as $item) {
//                                                                            $input = strval($item);
//                                                                            echo "<tr><td class='border-class'>".$row['$input'];
//                                                                        }
                                                                        echo "</td> 
                                                                                <td> <a href='booking.php?f_ID=".$row2["0"]."'
                                                                                        class='badge bg-light-primary'> Book Here</a> 
                                                                                        </td>
                                                                                        ";
                                                                    }
                                                                }
                                                                echo "</tr></table>";
                                                            } else {
                                                                echo "0 results";
                                                            }
                                                        }

                                                } else {  //other cases All is selected (or by default)
                                                    if (isset($_GET['Vbrands'])) { //vbrands selected, two table join
                                                        $vbrand = $_GET['Vbrands'];
                                                        $sql_join = "CREATE VIEW vc_iv_join AS
                                                                        SELECT vc.facility_ID, vc.phone, vc.address, vc.opening_time, vc.closing_time,vc.facility_type,vc.city,
                                                                                iv.brand
                                                                        FROM Vaccine_Center AS vc
                                                                        JOIN Inventory_Of_Vaccine AS iv
                                                                        ON vc.facility_ID = iv.facility_ID";
                                                        $result = mysqli_query($conn, $sql_join);
//                                                        if($result == 0) {
//                                                            echo 'create view error';
//                                                        }

                                                        if (isset($_GET['Vcity'])) {       //city is selected
                                                            $vcity = $_GET['Vcity'];
                                                            $sql = " SELECT * FROM vc_iv_join Where city like '$vcity' AND brand like '$vbrand'";
                                                            $result = mysqli_query($conn, $sql);
                                                        } else {        //city is not selected
                                                            //echo 'city is not selected';
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