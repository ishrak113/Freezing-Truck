
<?php session_start();

if (empty($_SESSION['username'])) {
  header("location:../../../admin");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Temp View | User area </title>

    <!-- Bootstrap -->
    <link href="<?php echo $baseUrl.'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $baseUrl.'assets/css/font-awesome.min.css'?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo $baseUrl.'assets/css/green.css'?>" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo $baseUrl.'assets/css/bootstrap-progressbar-3.3.4.min.css'?>" rel="stylesheet">


    <?php  if($page_slug == "home") {?>
      <!-- jVectorMap -->
      <link href="<?php echo $baseUrl.'assets/css/maps/jquery-jvectormap-2.0.3.css'?>" rel="stylesheet"/>
    <?php }?>

    <?php  if($page_slug == "result" || $page_slug == "manage-rides") {?>
      <!-- Datatables -->
      <link href="<?php echo $baseUrl.'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
      <link href="<?php echo $baseUrl.'assets/css/buttons.bootstrap.min.css'?>" rel="stylesheet">
      <link href="<?php echo $baseUrl.'assets/css/fixedHeader.bootstrap.min.css'?>" rel="stylesheet">
      <link href="<?php echo $baseUrl.'assets/css/responsive.bootstrap.min.css'?>" rel="stylesheet">
      <link href="<?php echo $baseUrl.'assets/css/scroller.bootstrap.min.css'?>" rel="stylesheet">
    <?php }?>

    <!-- Custom Theme Style -->
    <link href="<?php echo $baseUrl.'assets/css/custom.min.css'?>" rel="stylesheet">

    <!-- Custom Admin Style -->
    <link href="<?php echo $baseUrl.'assets/css/Adminstyle.css'?>" rel="stylesheet">

    <style>
     #map {
       width: 100%;
       height: 400px;
       background-color: grey;
     }
    </style>

    <?php $websiteName = "IoT Avatar"; ?>
