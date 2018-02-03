
<?php
include '../php/_top-data-super.php';

// echo "<pre>";
// print_r($_SESSION);
// die();
 ?>

<!-- top tiles -->
<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-truck"></i> Total Cars</span>
    <div class="count green"><?php echo $totalcars; ?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-thermometer-quarter"></i> Over Temperature </span>
    <div class="count text-danger"><?php echo $carsBelowTemp ?></div>
  </div>



</div>
<!-- /top tiles -->
