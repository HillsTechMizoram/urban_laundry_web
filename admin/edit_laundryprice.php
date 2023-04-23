<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['ldaid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {

        $eid = $_GET['editid'];
        $topwear = $_POST['topwear'];
        $bottomwear = $_POST['bottomwear'];
        $woolen = $_POST['woolen'];


        $query = mysqli_query($con, "update tblpricelist set TopWear='$topwear',  BottomWear='$bottomwear',  Woolen='$woolen' where Id='$eid'");
        if ($query) {
            $msg = "New price has been updated.";
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
                            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                        echo $msg;
                                                                                    }  ?> </p>


                            <div class="col-xl-12 stretch-card grid-margin">
                                <div class="card">
                                    <form method="post" class="pt-4 pl-2 pr-2" action="">
                                        <?php
                                        $cid = $_GET['editid'];
                                        $ret = mysqli_query($con, "select * from tblpricelist where Id='$cid'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-label-group">
                                                            <label for="topwear">Topwear Price</label>
                                                            <input type="text" id="topwear" name="topwear" class="form-control" required="required" autofocus="autofocus" value="<?php echo $row['TopWear']; ?>">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-label-group">
                                                            <label for="bottomwear">Bottomwear Price</label>
                                                            <input type="text" id="bottomwear" name="bottomwear" class="form-control" required="required" value="<?php echo $row['BottomWear']; ?>">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label for="woolen">Woolen Price</label>
                                                    <input type="text" id="woolen" name="woolen" class="form-control" required="required" value="<?php echo $row['Woolen']; ?>">

                                                </div>
                                            </div>


                                        <?php } ?>

                                        <p style="text-align: center; "><button type="submit" name="submit" class="btn btn-primary btn-min-width mr-1 mb-1">Update</button></p>
                                    </form>
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