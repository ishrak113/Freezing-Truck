<?php

include_once ("../../vendor/autoload.php");
use App\TopData\TopData;


$b = new TopData();

$temp ='20';
$carsBelowTemp =' ';
$totalcars = $b->find_total_cars($_SESSION['userId']);

$chipId = $b->cars_over_temp($temp);
$i=0;
// echo "<pre>";
// print_r($chipId);
// die();
foreach ($chipId as $value) {
  $userAndCarId = $b->find_user_and_car_id($value['chip_id']);

  if (!empty($userAndCarId)) {
    if ($userAndCarId[0]['user_id']==$_SESSION['userId']) {
      $onRide = $b->find_car_on_ride($userAndCarId[0]['car_id']);
      if (!empty($onRide)) {
        $i++;
      }
      // echo "<pre>";
      // print_r($onRide);
    }
  }
}
$carsBelowTemp = $i;


 ?>
