<?php
session_start();
include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\Admin\Admin;

$b = new Admin();

$b->find_update_admin();

if (isset($_POST)) {
  // echo "<pre>";
  // print_r($_POST);
  // die();

  if ($_POST['adminStatus'] == $_POST['currentStatus'] ) {
    $_SESSION['adminSuccess']="Status remain same";
    header("location:".$baseUrl."admin/views/layout/update-admin-super.php?id=".$_POST['userId']);
  }

  else {
    // die();
    $b->setData($_POST);
    $insert =$b->index();
    if (empty($insert)) {
      $_SESSION['adminSuccess']="Admin Status Change To ".$_POST['adminStatus'];
      header("location:".$baseUrl."admin/views/layout/update-admin-super.php?id=".$_POST['userId']);
    }


  }



}

$userName = $row[0]['user_name'];
$email = $row[0]['email'];
$status = $row[0]['status'];
$token = $row[0]['token'];

?>
