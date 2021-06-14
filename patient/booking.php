
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

    <link href="../patient/appointment_booking%20page/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../patient/appointment_booking%20page/css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />  <!-- time-picker-CSS -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

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
                    <li class="sidebar-item  active">
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
            <h3>Book an Appointment</h3>
        </div>

        <div class="agileits_reservation">
            <form action="booking_code.php" method="post">
                <h2>Vaccine Appointment Booking</h2>
                <div class="cuisine">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <label for="location"></label>
                    <select class="frm-field sect" id="location" name="f_id" required>
                        <option value="">Select Location</option>
                        <?php 
                            $sql = "SELECT facility_ID, address, city FROM Vaccine_Center";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value=".$row["facility_ID"];
                                    if(isset($_GET['f_ID'])) {
                                        if($_GET['f_ID'] == $row["facility_ID"]){
                                            echo " selected='selected'";
                                        }
                                    }
                                    echo ">".$row["address"].", ".$row["city"]."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="agileits_reservation_grid">
                    <div class="cuisine">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <label for="datepicker"></label>
                        <input class="date" id="datepicker" name="Date" placeholder="Select Date"  type="text" required="">
                    </div>
                    <div class="cuisine">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <label for="time"></label>
                        <input type="text" id="time" name="Time" class="timepicker" value=" Time">
                    </div>
                    <div class="cuisine">
                        <!-- start_section_room -->
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <label for="vaccineb"></label>
                        <select class="frm-field sect" id="vaccineb" name="vaccineB" required>
                            <option value="">Select Vaccine</option>
                            <?php 
                                $sql = "SELECT brand FROM Vaccine_Brand_Delivery";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo " <option value= ".$row["brand"]." > ".$row["brand"]." </option>  ";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="date_btn">
                    <input type="submit" value="Book An Appointment" formaction="booking_code.php" name="submit" />
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<script src="../assets/choices.min.js"></script>
<!-- js -->
<script type="text/javascript" src="appointment_booking%20page/js/jquery-2.1.4.min.js"></script>
<!-- carousal -->
<script src="appointment_booking%20page/js/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function() {
        $(".center").slick({
            dots: true,
            infinite: true,
            centerMode: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        centerMode: false,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>
<!-- //carousal -->


<script src="appointment_booking%20page/js/SmoothScroll.min.js"></script>
<!-- smooth scrolling-bottom-to-top -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling-bottom-to-top -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- Time select -->
<script type="text/javascript" src="appointment_booking%20page/js/wickedpicker.js"></script>
<script type="text/javascript">
    $('.timepicker').wickedpicker({twentyFour: true});
</script>
<!-- //Time select -->
<!-- Calendar -->
<link rel="stylesheet" href="appointment_booking%20page/css/jquery-ui.css" />
<script src="appointment_booking%20page/js/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
<!-- //Calendar -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="appointment_booking%20page/js/move-top.js"></script>
<script type="text/javascript" src="appointment_booking%20page/js/easing.js"></script>
<script type="text/javascript" src="appointment_booking%20page/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->

</body>
</html>