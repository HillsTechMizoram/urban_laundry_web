<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['ldaid'] == 0)) {
    header('location:logout.php');
} else {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Urban Laundry Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="./assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="./assets/vendors/jquery-bar-rating/css-stars.css" />
        <link rel="stylesheet" href="./assets/vendors/font-awesome/css/font-awesome.min.css" />
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="./assets/css/demo_1/style.css" />
        <!-- End layout styles -->
        <link rel="shortcut icon" href="./assets/images/favicon.png" />
    </head>

    <body>
        <div class="container-scroller">
            <?php include('include/sidebar.php'); ?>
            <div class="container-fluid page-body-wrapper">
            <?php include('include/navigationbar.php'); ?>

                <div class="main-panel">
                    <div id="content-wrapper">
                        <div class="container-fluid">

                            <!-- Breadcrumbs-->
                            <div class="col-xl-12 pt-3">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Overview</li>
                                </ol>
                            </div>
                            <?php
                            $fdate = $_POST['fromdate'];
                            $tdate = $_POST['todate'];
                            ?>
                            <h5 align="center" style="color:blue">Laundry Request Count Report from <?php echo $fdate ?> to <?php echo $tdate ?></h5>
                            <hr />


                            <div class="col-xl-12 stretch-card grid-margin">
                                <div class="card">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Total Requests</th>
                                                <th>New Requests</th>
                                                <th>Acceted Requests</th>
                                                <th>Inprocess Requests</th>
                                                <th>Finished Requests</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $ret = mysqli_query($con, "select month(DateofLaundry) as lmonth,year(DateofLaundry) as lyear,count(id) as totalcount,count(if(Status='0',0,null)) as newrequest,count(if(Status='1',0,null)) as acceptrequest,count(if(Status='2',0,null)) as inprocessrequest,count(if(Status='3',0,null)) as finishedrequest from tbllaundryreq where DateofLaundry between '$fdate' and '$tdate' group by lmonth,lyear");
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>

                                            <tr>
                                                <td><?php echo $row['lmonth'] . "/" . $row['lyear']; ?></td>
                                                <td><?php echo $total = $row['totalcount']; ?></td>
                                                <td><?php echo $ntotal = $row['newrequest']; ?></td>
                                                <td><?php echo $atotl = $row['acceptrequest']; ?></td>
                                                <td><?php echo $intotal = $row['inprocessrequest']; ?></td>
                                                <td><?php echo $ffftotal = $row['finishedrequest']; ?></td>

                                            </tr>
                                        <?php
                                            $ftotal += $total;
                                            $fntotal += $ntotal;
                                            $fatotl += $atotl;
                                            $fintotal += $intotal;
                                            $fftotal += $ffftotal;
                                        } ?>

                                        <tr>
                                            <td>Total </td>
                                            <td><?php echo $ftotal; ?></td>
                                            <td><?php echo $fntotal; ?></td>
                                            <td><?php echo $fatotl; ?></td>
                                            <td><?php echo $fintotal; ?></td>
                                            <td><?php echo $fftotal; ?></td>

                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <?php include('include/footer.php'); ?>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>

        <!-- <script>
            $(document).ready(function() {
                $('#myDataTable').DataTable();
            });
        </script> -->

        <!-- <script src="./assets/js/jquery-3.6.3.min.js"></script>
        <script src="./assets/js/jquery.dataTables.min.js"></script> -->
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="./assets/vendors/select2/select2.min.js"></script>
        <script src="./assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="./assets/js/off-canvas.js"></script>
        <script src="./assets/js/hoverable-collapse.js"></script>
        <script src="./assets/js/misc.js"></script>
        <script src="./assets/js/settings.js"></script>
        <script src="./assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="./assets/js/file-upload.js"></script>
        <script src="./assets/js/typeahead.js"></script>
        <script src="./assets/js/select2.js"></script>

        <!-- End custom js for this page -->
        <script src="./assets/vendor/datatables/jquery.dataTables.js"></script>
        <script src="./assets/vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="./assets/vendors/datatables/datatables-demo.js"></script>
        <!-- <script src="./assets/js/data-table.js"></script> -->


    </body>

    </html>
<?php }  ?>