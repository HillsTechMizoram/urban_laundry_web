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
                        <div class="container-fluid">

                            <!-- Breadcrumbs-->
                            <div class="col-xl-12 pt-3">
                                <ol class="breadcrumb ">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">View Requests</li>
                                </ol>
                            </div>
                            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                        echo $msg;
                                                                                    }  ?> </p>
                            <div class="col-xl-12 pt-1 pb-2">
                                <button type="submit" name="submit" class="btn btn-primary mr-2">Print Invoice</button>
                            </div>


                            <div class="col-xl-12 stretch-card grid-margin">
                                <div class="card">
                                    <!-- <span style="float:left"><i class="mdi mdi-printer" style="font-size:24px;" aria-hidden="true" OnClick="CallPrint(this.value)" style="cursor:pointer" title="Print the Report"></i></span> -->
                                    <?php
                                    $cid = $_GET['editid'];
                                    //Getting Prices
                                    $query = mysqli_query($con, "select * from tblpricelist");
                                    while ($rw = mysqli_fetch_array($query)) {
                                        $twp = $rw['TopWear'];
                                        $bwp = $rw['BottomWear'];
                                        $wwp = $rw['Woolen'];
                                    }

                                    $ret = mysqli_query($con, "select * from tbllaundryreq where ID='$cid'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {

                                    ?>

                                        <div id="print">
                                            <table border="1" class="table table-bordered mg-b-0" width="100%">
                                                <tr>
                                                    <th>Date of Laundry</th>
                                                    <td><?php echo $row['DateofLaundry']; ?></td>
                                                    <th>Posting Date</th>
                                                    <td><?php echo $row['postingDate']; ?></td>
                                                </tr>


                                                <tr>
                                                    <th>Top Wear</th>
                                                    <td><?php echo $twqty = $row['TopWear'] ?></td>

                                                    <th>Bootom Wear</th>
                                                    <td><?php echo $bwqty = $row['BootomWear']; ?></td>
                                                </tr>

                                                <tr>
                                                    <th>Woolen Cloth</th>
                                                    <td><?php echo $wcqty = $row['WoolenCloth']; ?></td>

                                                    <th>Others</th>
                                                    <td><?php echo $thrqyty = $row['Other']; ?></td>
                                                </tr>

                                                <tr>
                                                    <th>Service</th>
                                                    <td><?php echo $row['Service']; ?></td>

                                                    <th>Pickup Address</th>
                                                    <td><?php $padd = $row['PickupAddress'];
                                                        if ($padd == '') :
                                                            echo "NA";
                                                        else :
                                                            echo $padd;
                                                        endif;
                                                        ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Contact Person</th>
                                                    <td><?php echo $row['ContactPerson']; ?></td>

                                                    <th>Description</th>
                                                    <td><?php echo $row['Description']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Method</th>
                                                    <td><?php echo $row['PaymentType']; ?></td>
                                                    <th>Record Status</th>
                                                    <td> <?php
                                                            if ($row['Status'] == "0") {
                                                                echo "New";
                                                            }
                                                            if ($row['Status'] == "1") {
                                                                echo "Accept";
                                                            }
                                                            if ($row['Status'] == "2") {
                                                                echo "Inprocess";
                                                            }
                                                            if ($row['Status'] == "3") {
                                                                echo "Finish";
                                                            }; ?></td>
                                                </tr>
                                            </table>
                                            <table border="1" class="table table-bordered mg-b-0" width="100%">
                                                <tr>
                                                    <th colspan="5" style="color:red">Invoice of the Above Laundary request</th>
                                                </tr>

                                                <tr>
                                                    <th>#</th>
                                                    <th>Clothes</th>
                                                    <th>Qty</th>
                                                    <th>Per Price</th>
                                                    <th>Total</th>
                                                </tr>

                                                <tr>
                                                    <td>1</td>
                                                    <td>Top Wear</td>
                                                    <td><?php echo $twqty; ?></td>
                                                    <td><?php echo $twp; ?></td>
                                                    <td><?php echo $twqty * $twp; ?></td>
                                                </tr>


                                                <tr>
                                                    <td>2</td>
                                                    <td>Bottom Wear</td>
                                                    <td><?php echo $bwqty; ?></td>
                                                    <td><?php echo $bwp; ?></td>
                                                    <td><?php echo $bwqty * $bwp; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>3</td>
                                                    <td>Woolen Wear</td>
                                                    <td><?php echo $wcqty; ?></td>
                                                    <td><?php echo $wwp; ?></td>
                                                    <td><?php echo $wcqty * $wwp; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>4</td>
                                                    <td>Others</td>
                                                    <td><?php echo $thrqyty; ?></td>
                                                    <td>Other charge will be added by admin</td>
                                                    <td><?php echo $otchpr = $row['Othercharges']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Total</th>
                                                    <th><?php echo $twqty + $bwqty + $wcqty + $thrqyty; ?></th>
                                                    <td></td>
                                                    <th><?php echo $twqty * $twp + $bwqty * $bwp + $wcqty * $wwp + $otchpr; ?></th>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php } ?>
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