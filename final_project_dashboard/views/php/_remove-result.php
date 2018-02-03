<?php
session_start();
include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\Result\Result;

$yearMonthDay = date("Y-m-d");
$hourSecond = date("h:i:s");

$timeAndDate = $yearMonthDay." ".$hourSecond;

$b = new Result();

if (isset($_POST['id'])) {
  $b->remove_result($_POST['id'],$timeAndDate);
}

 ?>
