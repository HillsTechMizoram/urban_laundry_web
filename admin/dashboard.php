<?php
session_start();
error_reporting(0);
include('./include/dbconnection.php');
if (strlen($_SESSION['ldaid'] == 0)) {
  header('location:logout.php');
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
      <!-- partial:partials/_settings-panel.html -->
      <!-- <div id="settings-trigger"><i class="mdi mdi-settings"></i></div> -->
      <!-- <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-default-theme">
          <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles default primary"></div>
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles light"></div>
        </div>
      </div> -->
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
      <?php include('include/navigationbar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper pb-0">
          <div class="page-header flex-wrap">
            <div class="header-left">
              <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
              <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>
            </div>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
              <div class="d-flex align-items-center">
                <a href="#">
                  <p class="m-0 pr-3">Dashboard</p>
                </a>
                <a class="pl-3 mr-4" href="#">
                  <p class="m-0">ADMIN</p>
                </a>
              </div>
              <button type="button" onclick="window.location.href = '#';" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add Laundry Items </button>
            </div>
          </div>

          <!-- image card row starts here -->
          <div class="row">
            <div class="col-sm-3 stretch-card grid-margin">
              <div class="card">
                <div class="card-body p-0">
                  <img class="img-fluid w-100" src="./assets/images/dashboard/4.jpg" alt="" />
                </div>
                <?php $query1 = mysqli_query($con, "Select * from tbllaundryreq where Status ='0'");
                $reqcount = mysqli_num_rows($query1);
                ?>
                <div class="card-body px-3 text-dark">
                  <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">NEW REQUEST</p>
                    <i class="mdi mdi-clock-outline"></i>
                  </div>

                  <div class="d-flex justify-content-between font-weight-semibold">
                    <p class="mb-0">
                      <i class="mdi mdi-washing-machine star-color pr-1"></i><?php echo $reqcount; ?>
                    </p>
                    <p class="mb-0">New Request</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 stretch-card grid-margin">
              <div class="card">
                <div class="card-body p-0">
                  <img class="img-fluid w-100" src="./assets/images/dashboard/4.jpg" alt="" />
                </div>
                <?php $query2 = mysqli_query($con, "Select * from tbllaundryreq where Status ='1'");
                $acccount = mysqli_num_rows($query2);
                ?>
                <div class="card-body px-3 text-dark">
                  <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">REQUEST ACCEPT</p>
                    <i class="mdi mdi-clock-outline"></i>
                  </div>
                  <div class="d-flex justify-content-between font-weight-semibold">
                    <p class="mb-0">
                      <i class="mdi mdi-washing-machine star-color pr-1"></i><?php echo $acccount; ?>
                    </p>
                    <p class="mb-0">Accept</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 stretch-card grid-margin">
              <div class="card">
                <div class="card-body p-0">
                  <img class="img-fluid w-100" src="./assets/images/dashboard/4.jpg" alt="" />
                </div>
                <?php $query3 = mysqli_query($con, "Select * from tbllaundryreq where Status ='2'");
                $inpcount = mysqli_num_rows($query3);
                ?>
                <div class="card-body px-3 text-dark">
                  <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">INPROCESS</p>
                    <i class="mdi mdi-clock-outline"></i>
                  </div>

                  <div class="d-flex justify-content-between font-weight-semibold">
                    <p class="mb-0">
                      <i class="mdi mdi-washing-machine star-color pr-1"></i><?php echo $inpcount; ?>
                    </p>
                    <p class="mb-0">Inprocess</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 stretch-card grid-margin">
              <div class="card">
                <div class="card-body p-0">
                  <img class="img-fluid w-100" src="./assets/images/dashboard/4.jpg" alt="" />
                </div>
                <?php $query4 = mysqli_query($con, "Select * from tbllaundryreq where Status ='3'");
                $fincount = mysqli_num_rows($query4);
                ?>
                <div class="card-body px-3 text-dark">
                  <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">LAUNDRY COMPLETE</p>
                    <i class="mdi mdi-clock-outline"></i>
                  </div>

                  <div class="d-flex justify-content-between font-weight-semibold">
                    <p class="mb-0">
                      <i class="mdi mdi-washing-machine star-color pr-1"></i><?php echo $fincount; ?>
                    </p>
                    <p class="mb-0">Finish</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- first row starts here -->
          <!-- <div class="row">
            <div class="col-xl-9 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between flex-wrap">
                    <div>
                      <div class="card-title mb-0">Sales Revenue</div>
                      <h3 class="font-weight-bold mb-0">$32,409</h3>
                    </div>
                    <div>
                      <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                        <div class="d-flex mr-5">
                          <button type="button" class="btn btn-social-icon btn-outline-sales">
                            <i class="mdi mdi-inbox-arrow-down"></i>
                          </button>
                          <div class="pl-2">
                            <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                            <span class="font-10 font-weight-semibold text-muted">TOTAL SALES</span>
                          </div>
                        </div>
                        <div class="d-flex mr-3 mt-2 mt-sm-0">
                          <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                            <i class="mdi mdi-cash text-info"></i>
                          </button>
                          <div class="pl-2">
                            <h4 class="mb-0 font-weight-semibold head-count"> 2,804 </h4>
                            <span class="font-10 font-weight-semibold text-muted">TOTAL PROFIT</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted font-13 mt-2 mt-sm-0"> Your sales monitoring dashboard template. <a class="text-muted font-13" href="#"><u>Learn more</u></a>
                  </p>
                  <div class="flot-chart-wrapper">
                    <div id="flotChart" class="flot-chart">
                      <canvas class="flot-base"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 stretch-card grid-margin">
              <div class="card card-img">
                <div class="card-body d-flex align-items-center">
                  <div class="text-white">
                    <h1 class="font-20 font-weight-semibold mb-0"> Get mobile </h1>
                    <h1 class="font-20 font-weight-semibold">application!</h1>
                    <p>to optimize your selling prodcut</p>
                    <p class="font-10 font-weight-semibold"> Enjoy the advantage of premium. </p>
                    <button class="btn bg-white font-12">Get Premium</button>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- table row starts here -->
          <div class="row">
            <div class="col-xl-12 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php
                  $ret = mysqli_query($con, "select * from tblpricelist");
                  $cnt = 1;
                  while ($row = mysqli_fetch_array($ret)) {
                  ?>
                    <h3 style="text-align: center;">Laundry Price(Per Unit)</h3>
                    <table border="1" class="table table-bordered mg-b-0">
                      <tr>
                        <th>Top Wear Laundry Price</th>
                        <td><?php echo $row['TopWear']; ?></td>
                      </tr>
                      <tr>
                        <th>Bootom Wear Laundry Price</th>
                        <td><?php echo $row['BottomWear']; ?></td>
                      </tr>
                      <tr>
                        <th>Woolen Cloth Laundry Price</th>
                        <td><?php echo $row['Woolen']; ?></td>
                      </tr>
                    </table>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 stretch-card grid-margin">
              <div class="card">
                <div class="card-body pb-0">
                  <h4 class="card-title mb-0">Registered Users</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table custom-table text-dark">
                      <thead>
                        <tr>
                          <th>S.NO</th>
                          <th>Full Name</th>
                          <th>Mobile Number</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $ret = mysqli_query($con, "select *from tbluser");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                          <tr>
                            <td><?php echo $cnt; ?></td>

                            <td><?php echo $row['FullName']; ?></td>
                            <td><?php echo $row['MobileNumber']; ?></td>

                            <td><a href="edit_userdetail.php?editid=<?php echo $row['Id']; ?>">Edit User Detail</a>
                          </tr>
                        <?php
                          $cnt = $cnt + 1;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                  <a class="text-black font-13 d-block pt-2 pb-2 pb-lg-0 font-weight-bold pl-4" href="#">Show more</a>
                </div>
              </div>
            </div>
          </div>
          <!-- doughnut chart row starts -->
          <div class="row">
            <div class="col-sm-12 stretch-card grid-margin">
              <div class="card">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card border-0">
                      <div class="card-body">
                        <div class="card-title">Channel Sessions</div>
                        <div class="d-flex flex-wrap">
                          <div class="doughnut-wrapper w-50">
                            <canvas id="doughnutChart1" width="100" height="100"></canvas>
                          </div>
                          <div id="doughnut-chart-legend" class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card border-0">
                      <div class="card-body">
                        <div class="card-title">News Sessions</div>
                        <div class="d-flex flex-wrap">
                          <div class="doughnut-wrapper w-50">
                            <canvas id="doughnutChart2" width="100" height="100"></canvas>
                          </div>
                          <div id="doughnut-chart-legend2" class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card border-0">
                      <div class="card-body">
                        <div class="card-title">Device Sessions</div>
                        <div class="d-flex flex-wrap">
                          <div class="doughnut-wrapper w-50">
                            <canvas id="doughnutChart3" width="100" height="100"></canvas>
                          </div>
                          <div id="doughnut-chart-legend3" class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- last row starts here -->
          <!-- <div class="row">
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="card-title mb-2">Upcoming events (3)</div>
                  <h3 class="mb-3">23 september 2019</h3>
                  <div class="d-flex border-bottom border-top py-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked /></label>
                    </div>
                    <div class="pl-2">
                      <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
                      <p class="m-0 text-black"> Hey I attached some new PSD files… </p>
                    </div>
                  </div>
                  <div class="d-flex border-bottom py-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" /></label>
                    </div>
                    <div class="pl-2">
                      <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
                      <p class="m-0 text-black"> Discuss performance with manager </p>
                    </div>
                  </div>
                  <div class="d-flex border-bottom py-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" /></label>
                    </div>
                    <div class="pl-2">
                      <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
                      <p class="m-0 text-black">Meeting with Alisa</p>
                    </div>
                  </div>
                  <div class="d-flex pt-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" /></label>
                    </div>
                    <div class="pl-2">
                      <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
                      <p class="m-0 text-black"> Hey I attached some new PSD files… </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                      <div class="hex-mid hexagon-warning">
                        <i class="mdi mdi-clock-outline"></i>
                      </div>
                    </div>
                    <div class="pl-4">
                      <h4 class="font-weight-bold text-warning mb-0"> 12.45 </h4>
                      <h6 class="text-muted">Schedule Meeting</h6>
                    </div>
                  </div>
                  <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                      <div class="hex-mid hexagon-danger">
                        <i class="mdi mdi-account-outline"></i>
                      </div>
                    </div>
                    <div class="pl-4">
                      <h4 class="font-weight-bold text-danger mb-0">34568</h4>
                      <h6 class="text-muted">Profile visits</h6>
                    </div>
                  </div>
                  <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                      <div class="hex-mid hexagon-success">
                        <i class="mdi mdi-laptop-chromebook"></i>
                      </div>
                    </div>
                    <div class="pl-4">
                      <h4 class="font-weight-bold text-success mb-0"> 33.50% </h4>
                      <h6 class="text-muted">Bounce Rate</h6>
                    </div>
                  </div>
                  <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                      <div class="hex-mid hexagon-info">
                        <i class="mdi mdi-clock-outline"></i>
                      </div>
                    </div>
                    <div class="pl-4">
                      <h4 class="font-weight-bold text-info mb-0">12.45</h4>
                      <h6 class="text-muted">Schedule Meeting</h6>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="hexagon">
                      <div class="hex-mid hexagon-primary">
                        <i class="mdi mdi-timer-sand"></i>
                      </div>
                    </div>
                    <div class="pl-4">
                      <h4 class="font-weight-bold text-primary mb-0"> 12.45 </h4>
                      <h6 class="text-muted mb-0">Browser Usage</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
              <div class="card color-card-wrapper">
                <div class="card-body">
                  <img class="img-fluid card-top-img w-100" src="./assets/images/dashboard/img_5.jpg" alt="" />
                  <div class="d-flex flex-wrap justify-content-around color-card-outer">
                    <div class="col-6 p-0 mb-4">
                      <div class="color-card primary m-auto">
                        <i class="mdi mdi-clock-outline"></i>
                        <p class="font-weight-semibold mb-0">Delivered</p>
                        <span class="small">15 Packages</span>
                      </div>
                    </div>
                    <div class="col-6 p-0 mb-4">
                      <div class="color-card bg-success m-auto">
                        <i class="mdi mdi-tshirt-crew"></i>
                        <p class="font-weight-semibold mb-0">Ordered</p>
                        <span class="small">72 Items</span>
                      </div>
                    </div>
                    <div class="col-6 p-0">
                      <div class="color-card bg-info m-auto">
                        <i class="mdi mdi-trophy-outline"></i>
                        <p class="font-weight-semibold mb-0">Arrived</p>
                        <span class="small">34 Upgraded</span>
                      </div>
                    </div>
                    <div class="col-6 p-0">
                      <div class="color-card bg-danger m-auto">
                        <i class="mdi mdi-presentation"></i>
                        <p class="font-weight-semibold mb-0">Reported</p>
                        <span class="small">72 Support</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © urbanlaundry.com 2023</span>
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Developed By: <a href="https://hillstech.in/" target="_blank">Hills Tech. Mizoram</a></span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.hillstech.in/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span> -->
          </div>

          <!-- <div>
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Developed By: <a href="https://hillstech.in/" target="_blank">Hills Tech. Mizoram</a></span>
          </div> -->
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