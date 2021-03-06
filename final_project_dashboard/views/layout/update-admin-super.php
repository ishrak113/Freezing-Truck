<?php $page_slug="update-admin-super";?>
<?php include '../php/_header.php'; ?>
<!-- Header menue -->
<?php include 'header.php'; ?>
<!-- Header menue -->
<?php
if (($_SESSION['adminStatus'] !== "Super") && ($_SESSION['adminStatus'] !== "Prime")){
header("location:../../logout.php");

}
?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo $baseUrl.'admin/views/layout/home.php' ?>" class="site_title"><i class="fa fa-tachometer"></i> <span><?php echo $websiteName ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="../../assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION["username"];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- Sidebar menue -->
            <?php include 'sidebar.php'; ?>
            <!-- Sidebar menue -->


          </div>
        </div>

        <!-- top navigation -->
        <?php include 'top-navigation.php'; ?>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Admin</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>



                  <div class="x_content">
                    <h3 style="text-align:center; color:red" class="text-danger">
                        <?php
                        if (isset($_SESSION['errorMessage'])) {
                            echo $_SESSION['errorMessage'];
                            unset($_SESSION['errorMessage']);
                        }

                        ?>
                    </h3>
                    <h3 style="text-align:center;" class="text-success">
                        <?php
                        if (isset($_SESSION['adminSuccess'])) {
                            echo $_SESSION['adminSuccess'];
                            unset($_SESSION['adminSuccess']);
                        }

                        ?>
                    </h3>

                    <?php
                    include '../php/_show-update-admin-super.php';
                    ?>

                    <form   class="form-horizontal form-label-left" method="post" action="../php/_update-admin-super.php">

                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="col-md-2 col-sm-2 col-xs-12 col-md-offset-2">User Name</h5>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <h5><?php echo $userName; ?></h5>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="col-md-2 col-sm-2 col-xs-12 col-md-offset-2">Email</h5>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <h5><?php echo $email; ?></h5>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="col-md-2 col-sm-2 col-xs-12 col-md-offset-2">Current Status</h5>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <h5><?php echo $status; ?></h5>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="col-md-2 col-sm-2 col-xs-12 col-md-offset-2">Token</h5>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                          if ($token==0) {
                            echo '<h5 style="color:#169F85;">Active</h5>';
                          }else {
                            echo '<h5 style="color:red;">Deactive</h5>';
                          }
                           ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <h5 class="col-md-2 col-sm-2 col-xs-12 col-md-offset-2"> Change Admin Status
                        </h5>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="adminStatus">
                            <option value="Editor">Editor</option>
                            <option value="Moderator">Moderator</option>
                            <option value="Super">Super</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden"  required class="form-control col-md-7 col-xs-12" name="userId" value='<?php echo $userId ?>'>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden"  required class="form-control col-md-7 col-xs-12" name="currentStatus" value='<?php echo $status ?>'>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden"  required class="form-control col-md-7 col-xs-12" name="updateAt" value='<?php echo date("Y-m-d")." ".date("h:i:s");?>'>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="">Update Admin</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- /page content -->


      </div>
    </div>


    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Footer -->
