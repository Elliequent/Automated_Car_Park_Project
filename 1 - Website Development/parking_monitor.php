<?php

include 'System/Includes/Navbar.php';
include 'System/Includes/Left_Bar.php';

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
                        <h3 class="text-themecolor"> Parking Structure</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Parking Monitor</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="display">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- ============================================================== -->

<?php

Include 'System/Includes/Jquery.php';

?>

<script>														
                            var parking_location = 1;

                                $(document).ready(function() 
                                {

                                    $.ajax
                                    ({
                                        url: "System/AJAX/AJAX_Parking_System.php",
                                        type: "POST",
                                        data: "page=1&parking_location=" + parking_location,
                                        cache: false,

                                        success: function(data) 
                                        {

                                            $('.display').html(data);

                                        }

                                    });

                                    // alert("Test 1");   														// Error Checking - AJAX

                                });	// End of (document).ready(function()

                            </script>

</body>

</html>