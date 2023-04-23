<?php
session_start();
//error_reporting(0);
include('include/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['lduid'] == 0)) {
    header('location:logout.php');
} else {


    if (isset($_POST['submit'])) {
        $luid = $_SESSION['lduid'];
        $fname = $_POST['fullname'];
        $mobno = $_POST['mobilenumber'];
        $email = $_POST['email'];

        $query = mysqli_query($con, "update tbluser set FullName='$fname' where ID='$luid'");
        if ($query) {
            $msg = "User profile has been updated.";
        } else {
            $msg = "Something Went Wrong. Please try again.";
        }
    }
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
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="./assets/css/demo_2/style.css" />
        <!-- End layout styles -->
        <link rel="shortcut icon" href="./assets/images/favicon.png" />
        <script type="text/javascript">
            function checkpass() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert('New Password and Confirm Password field does not match');
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>

    <body>
        <div class="container-scroller">
            <?php include('include/header.php'); ?>
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="content-wrapper">

                        <div class="page-header">
                            <h3 class="page-title">Change password</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">user profile</li>
                                </ol>
                            </nav>
                        </div>
                        <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                    echo $msg;
                                                                                }  ?> </p>

                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $luid = $_SESSION['lduid'];
                                        $ret = mysqli_query($con, "select * from tbluser where ID='$luid'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <!-- <h4 class="card-title">Change Password</h4> -->
                                            <!-- <p class="card-description">Laundry request form For Customer</p> -->
                                            <form name="laundry" method="post">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-label-group">
                                                                <label for="firstName">Full Name</label>
                                                                <input type="text" id="fullname" name="fullname" class="form-control" required="required" autofocus="autofocus" value="<?php echo $row['FullName']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-label-group">
                                                                <label for="lastName">Mobile Number</label>
                                                                <input type="text" id="mobilenumber" name="mobilenumber" class="form-control" required="required" maxlength="10" readonly="true" value="<?php echo $row['MobileNumber']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <label for="inputEmail">Email address</label>
                                                        <input type="email" id="email" name="email" class="form-control" readonly="true" required="required" value="<?php echo $row['Email']; ?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <p style="text-align: center; ">
                                                <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                                            </p>
                                            </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <?php include('include/footer.php'); ?>
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
    </body>

    </html>
<?php }  ?>