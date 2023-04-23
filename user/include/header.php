    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="dashboard.php">
              <!-- <img src="./assets/images/logo.svg" alt="logo" /> -->
              <h4>URBAN LAUNDRY</h4>
              <span class="font-12 d-block font-weight-light">Industrial laundry & dry clean </span>
            </a>
            <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="./assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-2">
              <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                  <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                      <i class="mdi mdi-magnify"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <!-- <div class="nav-profile-img">
                    <i class="mdi mdi-account-circle menu-icon text-muted" style="font-size:36px;"></i>
                  </div> -->
                  <?php
                  $adid = $_SESSION['lduid'];
                  $ret = mysqli_query($con, "select FullName from tbluser where ID='$adid'");
                  $row = mysqli_fetch_array($ret);
                  $name = $row['FullName'];

                  ?>
                  <div class="nav-profile-text">
                    <p class="text-black font-weight-semibold m-0"><i class="mdi mdi-account-circle menu-icon text-muted" style="font-size:15px;"></i><?php echo $name; ?> </p>
                    <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                  </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="user_profile.php">
                    <i class="mdi mdi-account mr-2 text-success"></i> User Profile </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="change_password.php">
                    <i class="mdi mdi-lock mr-2 text-success"></i> Change Password </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-clock-outline menu-icon"></i>
                <span class="menu-title">Request Status</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item">
                    <a class="nav-link" href="new_request.php">New Request</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="accept_request.php">Accept Request</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="inprocess_request.php">In Process</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="finish_request.php">Finish</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-qrcode-scan menu-icon"></i>
                <span class="menu-title">QR Scanner</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-receipt menu-icon"></i>
                <span class="menu-title">Loyalty Points</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-calendar-clock menu-icon"></i>
                <span class="menu-title">Payment History</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Plan & Programs</span></a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">Payment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/dropdowns.html">Address</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/typography.html">Qr Settings</a>
                  </li>
                </ul>
              </div>
            </li>

          </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->