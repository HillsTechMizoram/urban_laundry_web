<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['lduid'] == 0)) {
    header('location:logout.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Urban Laundry</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="./assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="./assets/vendors/select2/select2.min.css" />
        <link rel="stylesheet" href="./assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
        <!-- Page level plugin CSS-->

        <link href="./assets/vendors/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="./assets/css/demo_2/style.css" />
        <!-- End layout styles -->
        <link rel="shortcut icon" href="./assets/images/favicon.png" />
        <script type="text/javascript">
            $(document).ready(function() {
                $('#pickupaddress').hide();
                $('#service').change(function() {
                    var v = $("#service").val();


                    if (v == 'dropservice') {
                        $('#pickupaddress').hide();
                    }

                    if (v == 'pickupservice') {
                        $('#pickupaddress').show();
                    }
                });
            });

            function submitform() {
                document.getElementById("laundry").submit();
            }
        </script>
    </head>

    <body>
        <div class="container-scroller">
            <?php include('include/header.php'); ?>
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div id="content-wrapper">
                        <div class="container-fluid">

                            <!-- Breadcrumbs-->
                            <div class="col-xl-12 pt-3">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Finished Requests</li>
                                </ol>
                            </div>
                            <div class="col-xl-12 stretch-card grid-margin">
                                <div class="card">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Date of Laundry</th>
                                                <th>Full Name</th>
                                                <th>Mobile Number</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $usserid = $_SESSION['lduid'];
                                        $ret = mysqli_query($con, "select tbllaundryreq.DateofLaundry,tbllaundryreq.ID, tbluser.FullName,tbluser.MobileNumber from  tbllaundryreq inner join tbluser on tbluser.ID=tbllaundryreq.UserId where tbllaundryreq.Status='3' && tbllaundryreq.UserID='$usserid'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>

                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['DateofLaundry']; ?></td>
                                                <td><?php echo $row['FullName']; ?></td>
                                                <td><?php echo $row['MobileNumber']; ?></td>

                                                <td><a href="view_request.php?editid=<?php echo $row['ID']; ?>">View Detail</a>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        } ?>



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