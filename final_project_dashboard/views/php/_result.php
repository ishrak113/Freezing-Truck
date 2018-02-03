<?php
include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\Result\Result;


$b = new Result();
$row = $b->show_result();
// echo "<pre>";
// print_r($row);
// die();
foreach ($row as  $value) {
  $userArray = $b->find_userId($value['chip_id']);
  if (!empty($userArray)) {
    $user = $userArray[0]['user_id'];
    if ($user == $_SESSION['userId']) {
      $result = $b->find_result($value['chip_id']);

      $cars = $b->find_cars_info($result[0]['chip_id']);

      $driver = $b->find_driver($cars['car_id']);
      if (!empty($driver)) {
        $driverName = $driver[0]['name'];
      }else {
        $driverName ='<span class="text-danger"><strong>Error 501</strong></span>';
      }

      $driverPhone = $b->find_driver($cars['car_id']);
      if (!empty($driver)) {
        $driverPhone = $driver[0]['phone'];
      }else {
        $driverPhone ='<span class="text-danger"><strong>Error 501</strong></span>';
      }
      foreach ($result as $value) {

      ?>
      <tr>
        <td><?php echo $driverName;?></td>
        <td><?php echo $driverPhone;?></td>
        <td><?php echo $cars['car_number'];?></td>
        <td><?php echo $cars['car_details'];?></td>
        <td><?php
        if ($value['temperature'] > 20) {
          echo '<span class="btn btn-warning not-btn">'.$value['temperature'].'&deg;'.'C'.'</span>';
        }else {
            echo '<span class="btn btn-success not-btn">'.$value['temperature'].'&deg;'.'C'.'</span>';
        }
         ?></td>
        <td><a target="_blank" href="map.php?lt=<?php echo $value['lattitude'];?>&lg=<?php echo $value['longitude'];?>" class="btn btn-primary">Recent Location</a> </td>
        <td><?php echo substr($value['created_at'],0,10)." / ".substr($value['created_at'],10,6);?></td>
        <!-- <td><a data-row="" class="btn btn-danger remove-result">Remove</a> </td> -->
      </tr>
      <?php
      }
    }

  }// chech user array


}

 ?>
