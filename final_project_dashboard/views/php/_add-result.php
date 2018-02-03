<?php
session_start();
include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\Result\Result;


$b = new Result();


date_default_timezone_set('Asia/Dhaka');
$yearMonthDay = date("Y-m-d");
$hourSecond = date("h:i:s");
$time = $yearMonthDay." ".$hourSecond;

// echo "<pre>";
// print_r($time);
// die();

if (isset($_GET)) {
  $b->setData($_GET);
  $insert = $b->update_result($time);

}



 ?>
