<?php

include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\Admin\Admin;

$b = new Admin();

$row = $b->find_update_admin($_SESSION['userId']);
// echo $_SESSION['userId'];
// echo "<pre>";
// print_r($row);
// die();

$userName = $row[0]['user_name'];
$email = $row[0]['email'];


?>
