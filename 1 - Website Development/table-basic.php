<?php

require 'System/Form_Handlers/Ban_User_Handler.php';

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
                        <h3 class="text-themecolor">Customers</h3>
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Table Basic</li> -->
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
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Basic Table</h4> -->
                                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Licence Plate</th>
                                                <th>Ban</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php

                                                $customer_list = $user_obj->returnCustomerList();

                                                foreach ($customer_list as $row)
                                                {


                                                    $vehicle_array = $user_vehicle_obj->returnUser_Vehicles($con, $row['User_ID']);

                                                    

                                                    echo "
                                                    
                                                    <tr>
                                                        <td> <a href='pages-profile.php?id=" . $row['User_ID'] . "'> " . $row['Firstname'] . " " . $row['Lastname'] . " </a> </td>
                                                        <td> ";
                                                        
                                                        foreach ($vehicle_array as $vehicle)
                                                        {

                                                            echo @$vehicle . "<br>";

                                                        }
                                                        
                                                    echo"</td> <td>";
                                                            
                                                    if ($row['Is_Banned'] == "No")
                                                    {

                                                        echo "
                                                        <form action='table-basic.php' method='POST'>
                                                            <input type='hidden' name='ID' id='hiddenField' value=' " . $row['User_ID'] . " ' />
                                                            <input type='submit' style = 'width: 100px;' class='button btn btn-warning' name='Ban_User' value='Ban' />
                                                        </form>";

                                                    }
                                                    else if ($row['Is_Banned'] == "Yes")
                                                    {

                                                        echo "
                                                        <form action='table-basic.php' method='POST'>
                                                            <input type='hidden' name='ID' id='hiddenField' value=' " . $row['User_ID'] . " ' />
                                                            <input type='submit' style = 'width: 100px;' class='button btn btn-danger' name='Unban_User' value='Unban' />
                                                        </form>";

                                                    }
                                                            

                                                    echo "
                                                        </td>
                                                    </tr>";

                                                }

                                            ?>

                                        </tbody>
                                    </table>
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

</body>

</html>