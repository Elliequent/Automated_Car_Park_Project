<?php

include 'System/Includes/Navbar.php';
include 'System/Includes/Left_Bar.php';

include 'System/Functions/Dashboard_Functions.php';

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
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales Chart and browser state-->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div>

                                    <?php $graph_array = calculate_dashboard_monthly($current_parking_structure_id); ?>

                                    <div id="curve_chart" style = 'min-height: 60vh; min-width: 50vw;'></div>
                                </div>

                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script type="text/javascript">
                                        google.charts.load('current', {'packages':['corechart']});
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() 
                                        {

                                            var data = google.visualization.arrayToDataTable([
                                            ['Month', 'Sales'],
                                            ['<?php echo $graph_array[0][0] ?>',  <?php echo $graph_array[0][1] ?>],
                                            ['<?php echo $graph_array[1][0] ?>',  <?php echo $graph_array[1][1] ?>],
                                            ['<?php echo $graph_array[2][0] ?>',  <?php echo $graph_array[2][1] ?>]
                                            ]);

                                            var options = {
                                            title: 'Monthly Sales',
                                            curveType: 'function',
                                            legend: { position: 'none' }
                                            };

                                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                            chart.draw(data, options);

                                        }
                                    </script>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4 no-block">
                                    <h5 class="card-title mb-0 align-self-center">Currently Occupied</h5>
                                </div>
                                <div id="visitor" style="min-height: 50vh; width:100%;">
                            
                                        <?php calculate_dashboard_visitors($current_parking_structure_id) ?>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Sales Chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Projects of the Month -->
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

</body>

</html>