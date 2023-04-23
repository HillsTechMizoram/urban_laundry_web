<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-chevron-double-left"></span>
          </button>
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="./assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <ul class="navbar-nav navbar-nav-left">
            <li class="nav-item dropdown ml-3">

              <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <?php
                $ret1 = mysqli_query($con, "select tbluser.FullName,tbllaundryreq.ID from tbllaundryreq join tbluser on tbluser.id=tbllaundryreq.UserID where tbllaundryreq.Status='0'");
                $num = mysqli_num_rows($ret1);
                ?>
                <span class="badge badge-danger"><?php echo $num; ?></span>
              </a>

              <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <?php if ($num > 0) {
                  while ($result = mysqli_fetch_array($ret1)) {
                ?>
                    <a class="dropdown-item" href="view_newrequest.php?editid=<?php echo $result['ID']; ?>">New Request Received from <?php echo $result['FullName']; ?></a>
                  <?php }
                } else { ?>

                  <a class="dropdown-item" href="new-request.php">No New Requests Found</a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
              </div>
            </li>
            <li class="nav-item dropdown ml-3">
              <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi mdi-van-utility"> </i>
                <?php
                $ret1 = mysqli_query($con, "select tbluser.FullName,tbllaundryreq.ID from tbllaundryreq join tbluser on tbluser.id=tbllaundryreq.UserID where tbllaundryreq.Status='0'");
                $num = mysqli_num_rows($ret1);
                ?>
                <span class="badge badge-danger"><?php echo $num; ?></span>
              </a>

              <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="px-3 py-3 font-weight-semibold mb-0">Delivery Notification</h6>
                <div class="dropdown-divider"></div>
                <?php if ($num > 0) {
                  while ($result = mysqli_fetch_array($ret1)) {
                ?>
                    <a class="dropdown-item" href="view_newrequest.php?editid=<?php echo $result['ID']; ?>">New Request Received from <?php echo $result['FullName']; ?></a>
                  <?php }
                } else { ?>

                  <a class="dropdown-item" href="new-request.php">No New Requests Found</a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>