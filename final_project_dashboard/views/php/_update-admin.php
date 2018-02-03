<?php
session_start();
include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\Admin\Admin;


$b = new Admin();

// echo "<pre>";
// print_r($_POST);
// die();

if (isset($_POST)) {
  if (!filter_var($_POST["updateEmail"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errorMessage']="Invalid email format";
    header("location:".$baseUrl."admin/views/layout/update-admin.php");
  }
  else {
    $b->setData($_POST);
    $insert = $b->update_email($_SESSION['userId']);
    if (empty($insert)) {
      $_SESSION['adminSuccess']="Email updated successfull";
      header("location:".$baseUrl."admin/views/layout/update-admin.php");
    }


  }



}



 ?>
