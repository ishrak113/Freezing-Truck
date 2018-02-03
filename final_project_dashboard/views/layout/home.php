
  <?php $page_slug="home"; ?>
  <?php include '../php/_header.php'; ?>

    <!-- Header menue -->
    <?php include 'header.php'; ?>
    <!-- Header menue -->

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
                <h2><?php echo $_SESSION['username'];?></h2>
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

          <!-- top tiles -->
          <?php
          if (($_SESSION['adminStatus'] == "Super") || ($_SESSION['adminStatus'] == "Prime")){
          include 'top-data-general.php';
          }elseif ($_SESSION['adminStatus'] == "Moderator") {
          include 'top-data-general.php';
        }else {
          include 'top-data-general.php';
        }
          ?>
          <!-- /top tiles -->
          <?php
          $m = date("m");
          $month = array("01"=>"JANUARY","02"=>"FEBRUARY","03"=>"MARCH","04"=>"APRILE","05"=>"MAY","06"=>"JUNE","07"=>"JULY","08"=>"AUGUST","09"=>"SEPTEMBER","10"=>"OCTOBER","11"=>"NOVEMBER","12"=>"DEEMBER")

          ?>

          <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
              <h4 class="p-t-xl">
                Today : <span class="green"><?php echo date("l");?> ,&nbsp;</span><span class="green"><?php echo date("d")." ".$month[$m]." ".date("Y");?>.</span>
              </h4>
              <h4 class="p-b-xl">
                <!-- Last login at : <span class="green">10pm, &nbsp;</span><span class="green">15 December 2016.</span> -->
              </h4>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
            <!-- Visitors location Start  -->
            <?php
            // include 'visitor-location.php';
            ?>
            <!-- Visitors location End -->
            </div>
          </div>
        </div>
        <!-- /page content -->


      </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- Footer -->


  </body>
</html>
