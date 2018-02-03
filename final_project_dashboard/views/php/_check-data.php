<?php
session_start();
include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\Rfid\Rfid;


$b = new Rfid();

// echo "<pre>";
// print_r($_POST);
// die();


if (isset($_GET)) {

  $b->setData($_GET);
  $insert = $b->check_rfid();
  // echo "<pre>";
  // print_r($insert);
  // die();
  if (isset($insert[0]['chip_id'])) {
    echo "true";
    return true;
  }else {
    echo "false";
    return false;
  }

}



 ?>
