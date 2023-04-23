      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="./assets/images/faces/face1.jpg" alt="profile" />
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center">URBAN LAUNDRY</span>
                <span class="text-secondary icon-sm text-center">Admin</span>
              </div>
            </a>
          </li>
          <!-- <li class="nav-item pt-3">
            <a class="nav-link d-block" href="index.html">
              <img class="sidebar-brand-logo" src="./assets/images/logo.svg" alt="" />
              <img class="sidebar-brand-logomini" src="./assets/images/logo-mini.svg" alt="" />
              <div class="small font-weight-light pt-1">Responsive Dashboard</div>
            </a>
            <form class="d-flex align-items-center" action="#">
              <div class="input-group">
                <div class="input-group-prepend">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control border-0" placeholder="Search" />
              </div>
            </form>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="mdi mdi-poll-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-washing-machine menu-icon"></i>
              <span class="menu-title">Laundry Requests</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="new_request.php">New Requests</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="accept_request.php">Accept Requests</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="inprocess_request.php">Inprocess Requests</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="finish_request.php">Finish Requests</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="manage_laundryprice.php">
              <i class="mdi mdi-content-paste menu-icon"></i>
              <span class="menu-title">Laundry Price</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-map-marker-radius menu-icon"></i>
              <span class="menu-title">Delivery Status</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-star-outline menu-icon"></i>
              <span class="menu-title">Loyalty Points Records</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-notebook menu-icon"></i>
              <span class="menu-title">Service Invoice</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#">Laundry Invoice</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Dryclean Invoice</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Sofa Cleaning Invoice</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-calendar-today menu-icon"></i>
              <span class="menu-title">Laundry Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="bwdates_report_ds.php">B/w Date</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="requestcount_report_ds.php">Requests Count</a>
                </li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-history menu-icon"></i>
              <span class="menu-title">Payment History </span>
            </a>
          </li>



          <li class="nav-item pt-3">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-settings-outline menu-icon"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="admin_profile.php">Admin Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="changepassword.php">Change Password</a>
                </li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->