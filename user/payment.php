<?php
session_start();
//error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['lduid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submitpay'])) {
        $lmsuid = $_SESSION['lduid'];
        $dol = $_SESSION['date'];
        $topwear = $_SESSION['topwear'];
        $bootomwear = $_SESSION['bottomwear'];
        $woolencloth = $_SESSION['woolencloth'];
        $others = $_SESSION['others'];
        $service = $_SESSION['service'];
        $pkadd = $_SESSION['address'];
        $contperson = $_SESSION['contactperson'];
        $dec = $_SESSION['description'];
        $ptype = $_POST['paymenttype'];
        $status = 0;
        $query = mysqli_query($con, "insert into  tbllaundryreq(UserID,DateofLaundry,TopWear,BootomWear,WoolenCloth,Other,Service,PickupAddress,ContactPerson,Description,Status,PaymentType) value('$lmsuid','$dol','$topwear','$bootomwear','$woolencloth','$others','$service','$pkadd','$contperson','$dec','$status','$ptype')");
        if ($query) {
            echo '<script>alert("Laundry request has been sent.")</script>';
            echo "<script>window.location.href='new_request.php'</script>";
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
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Payment</li>
                            </ol>
                            <!-- Icon Cards-->

                            <!-- Area Chart Example-->

                            <form method="post">
                                <!-- DataTables Example -->
                                <?php

                                $ret = mysqli_query($con, "select * from tblpricelist");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {

                                ?>

                                    <h3 style="text-align: center;">Laundry Price(Per Unit)</h3>
                                    <table border="1" class="table table-bordered mg-b-0">
                                        <tr>

                                            <th>Particular</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                        <tr>
                                            <th>Top Wear Laundry Price</th>
                                            <td><span>&#8377;</span><?php echo $a = $row['TopWear']; ?></td>
                                            <td><?php echo $b = $_SESSION['topwear']; ?></td>
                                            <td><span>&#8377;</span><?php echo $ga = $b * $a ?></td>
                                        </tr>


                                        <tr>
                                            <th>Bootom Wear Laundry Price</th>
                                            <td><span>&#8377;</span><?php echo $a1 = $row['BottomWear']; ?></td>
                                            <td><?php echo $b1 = $_SESSION['bottomwear']; ?></td>
                                            <td><span>&#8377;</span><?php echo $gb = $b1 * $a1 ?></td>
                                        </tr>

                                        <tr>
                                            <th>Woolen Cloth Laundry Price</th>
                                            <td><span>&#8377;</span><?php echo $a2 = $row['Woolen']; ?></td>
                                            <td><?php echo $b2 = $_SESSION['woolencloth']; ?></td>
                                            <td><span>&#8377;</span><?php echo $gc = $b2 * $a2 ?></td>
                                        </tr>
                                        <tr>
                                            <th>Other Price</th>
                                            <td>Other Price depend upon cloth variety(other than above three category)</td>
                                            <td><?php echo $b3 = $_SESSION['others']; ?></td>
                                            <td>It will add at the time of delivery</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" style="text-align:center"> Approx Grand Total</th>
                                            <td><span>&#8377;</span><?php echo $ga + $gb + $gc; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Payment Mode</th>
                                            <td><input type="radio" name="paymenttype" checked="ture" value="Cash on Delivery">Cash on Delivery(COD)</td>
                                        </tr>


                                    </table>
                                <?php } ?>
                                <button type="submit" name="submitpay" class="btn btn-primary btn-block">Submit</button>
                            </form>
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