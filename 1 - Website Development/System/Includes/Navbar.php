<?php

require 'System/Config/config.php';

require 'System/Classes/User.php';
require 'System/Classes/Event.php';
require 'System/Classes/Vehicle.php';
require 'System/Classes/User_Vehicles.php';
require 'System/Classes/Parking_Structure.php';
require 'System/Classes/Parking_Space.php';
require 'System/Classes/Arrival_Departure.php';

//  Check if user is currently logged - redirect if not
if (isset($_SESSION['username'])) 
{

    // Prevents loging into the website without log on
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM User WHERE Username = '$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query); 

    $user_obj = new User($con, $user['User_ID']);
    $user_vehicle_obj = new User_Vehicles($con, $user['User_ID']);

    $current_parking_structure_id = 1;

} 
else 
{

    header("Location: Login.php");

}

// Clear login session variables
unset($_SESSION['log_email']);
unset($_SESSION['ERROR']);
unset($error_array);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="Assets/CSS/bootstrap.css" rel="stylesheet">
    <link href="Assets/CSS/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="Assets/CSS/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="Assets/CSS/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="Assets/CSS/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== --
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background-color: #1A2238;">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <h2 class="logo_PP"> Practical Parking </h2>
                        
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- User profile -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                                id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="Assets/Images/Default_Profile_Picture/head_deep_blue.png" style = 'border-radius:50%;' alt="user" class="" /> 
                                    <span style ='color: white; margin-left: 10px;' class="hidden-md-down"> <?php echo $user_obj->firstname_and_lastname() ?> </span> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>

                <div class="form-inline">

                   <a href="System/Functions/Logout.php"> <div style = 'overflow: inherit;'class="col-sm-6 col-md-4 col-lg-3 text-truncate"><i style = 'color: white; padding-right: 40px; font-size: 40px;' class="fa fa-arrow-circle-o-right"></i> </a>

                </div>

            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->