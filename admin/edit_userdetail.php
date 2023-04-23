<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['ldaid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {

        $eid = $_GET['editid'];
        $FName = $_POST['fullname'];
        $ContactNo = $_POST['mobilenumber'];
        $email = $_POST['email'];


        $query = mysqli_query($con, "update tbluser set FullName='$FName',  MobileNumber='$ContactNo',  Email='$email' where Id='$eid'");
        if ($query) {
            $msg = "User detail has been updated.";
        } else {
            $msg = "Something Went Wrong. Please try again";
        }
    }
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
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper pb-0">
                        <div class="page-header">
                            <h3 class="page-title">Change password</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">User Details</li>
                                </ol>
                            </nav>
                        </div>

                        <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                    echo $msg;
                                                                                }  ?> </p>

                        <form method="post" action="">
                            <?php
                            $cid = $_GET['editid'];
                            $ret = mysqli_query($con, "select * from tbluser where Id='$cid'");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {

                            ?>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <label for="fullname">Full Name</label>
                                                <input type="text" id="fullname" name="fullname" class="form-control" required="required" autofocus="autofocus" value="<?php echo $row['FullName']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <label for="mobilenumber">Mobile Number</label>
                                                <input type="text" id="mobilenumber" name="mobilenumber" maxlength="10" class="form-control" required="required" value="<?php echo $row['MobileNumber']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" required="required" readonly="true" value="<?php echo $row['Email']; ?>">
                                    </div>
                                </div>


                            <?php } ?>

                            <p style="text-align: center; "><button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button></p>
                        </form>



                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
                        </div>

                        <div>
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Distributed By: <a href="https://themewagon.com/" target="_blank">Themewagon</a></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="./assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
        <script src="./assets/vendors/chart.js/Chart.min.js"></script>
        <script src="./assets/vendors/flot/jquery.flot.js"></script>
        <script src="./assets/vendors/flot/jquery.flot.resize.js"></script>
        <script src="./assets/vendors/flot/jquery.flot.categories.js"></script>
        <script src="./assets/vendors/flot/jquery.flot.fillbetween.js"></script>
        <script src="./assets/vendors/flot/jquery.flot.stack.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="./assets/js/off-canvas.js"></script>
        <script src="./assets/js/hoverable-collapse.js"></script>
        <script src="./assets/js/misc.js"></script>
        <script src="./assets/js/settings.js"></script>
        <script src="./assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="./assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
    </body>

    </html>
<?php }  ?>