<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['lduid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['topwear'] = $_POST['topwear'];
        $_SESSION['bottomwear'] = $_POST['bottomwear'];
        $_SESSION['woolencloth'] = $_POST['woolencloth'];
        $_SESSION['others'] = $_POST['others'];
        $_SESSION['service'] = $_POST['service'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['contactperson'] = $_POST['contactperson'];
        $_SESSION['description'] = $_POST['description'];
        // $ptype=$_POST['paymenttype'];
        echo "<script>window.location.href='payment.php'</script>";
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
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">Request form</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Overview </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Request Form</h4>
                                        <p class="card-description">Laundry request form For Customer</p>
                                        <form class="forms-sample" name="laundry" id="laundry" method="post" >

                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-label-group">
                                                            <label for="date">Pick up / Drop Date </label>
                                                            <input type="date" id="date" name="date" class="form-control" required="required" autofocus="autofocus">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-label-group">
                                                            <label for="lastName">Topwear(Tshirt,Top,Shirt)</label>
                                                            <input type="text" id="topwear" name="topwear" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label for="inputEmail">Bottomwear(Lower,Jeans,Leggins)</label>
                                                    <input type="text" id="bottomwear" name="bottomwear" class="form-control" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-label-group">
                                                            <label for="inputPassword">Woolen Cloth</label>
                                                            <input type="text" id="woolencloth" name="woolencloth" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-label-group">
                                                            <label for="inputPassword">Others</label>
                                                            <input type="text" id="others" name="others" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-label-group">
                                                            <label for="inputPassword">Service type</label>
                                                            <select id="service" name="service" class="form-control">
                                                                <option value="">Select Service type</option>
                                                                <option value="pickupservice">Pickup Service</option>
                                                                <option value="dropservice">Drop Service</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="pickupaddress">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-label-group">
                                                                <label for="inputPassword">Pickup Address</label>
                                                                <input type="text" id="address" name="address" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-label-group">
                                                            <label for="inputPassword">Contact Person</label>
                                                            <input type="text" id="contactperson" name="contactperson" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-label-group">
                                                            <label for="inputPassword">Description(if any)</label>
                                                            <textarea type="text" id="description" name="description" class="form-control" rows="4"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-primary mr-2"  >Proceed for Payment</button>

                                            <!-- <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                                            <button class="btn btn-light">Cancel</button> -->
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