<?php

include 'System/Includes/Navbar.php';
include 'System/Includes/Left_Bar.php';

if(isset($_GET['id'])) 
{

    $id = $_GET['id'];
    $user_profile = new User($con, $id);
    $user_vehicles = new User_Vehicles($con, $id);

}   
else    
{

    $id = 0;

}

?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="mt-4"> <img src="Assets/Images/Default_Profile_Picture/head_deep_blue.png" class="img-circle"
                                        width="150" />
                                    <h4 class="card-title mt-2"> <?php echo $user_profile->firstname_and_lastname(); ?> </h4>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                            <?php echo $user_profile->firstname_and_lastname(); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <?php echo $user_profile->getUsername(); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <?php echo $user_profile->getEmail(); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <?php echo $user_profile->getPhone_number(); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <?php echo $user_profile->getAddress(); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Licence Plate</label>
                                    <div class="col-md-12">
                                        <?php $car = $user_vehicles->returnUser_Vehicles($con, $user_profile->getUser_ID()); echo $car[0] ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Status</label>
                                    <div class="col-md-12">
                                        <?php if ($user_profile->getIs_Banned() == "Yes") echo "<p style = 'color:red;'> BANNED </p>"; else echo "<p style = 'color:green;'> ACTIVE </p>" ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <?php

                Include 'System/Includes/Footer.php';

            ?>


        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->

<?php

Include 'System/Includes/Jquery.php';

?>

</body>

</html>