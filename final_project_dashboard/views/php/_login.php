<?php
session_start();
include_once ("_header.php");
include_once ("../../vendor/autoload.php");
use App\Login\Login;


$b = new Login();

if (isset($_POST)) {
  $b->setData($_POST);
  $data = $b->findUser();
  // echo "<pre>";
  // print_r($data);
  // print_r($_POST);
  // die();
  if ($_POST['loginUsername'] == $data[0]['user_name'] || $_POST['loginUsername'] == $data[0]['email']) {
    $passForCheck = $b->generate_pass($data[0][user_hash]);

    if ($passForCheck === $data[0]['user_pass']) {
      if ($data[0]['token'] === '0') {
        $_SESSION['username'] = $data[0]['user_name'];
        $_SESSION['userId'] = $data[0]['user_id'];
        $_SESSION['adminStatus'] = $data[0]['status'];
        header("location:".$baseUrl."views/layout/home.php");
      }else {
        $_SESSION['error']="Your account is deactivete";
        header("location:".$baseUrl."admin");
      }
    }else {
      $_SESSION['error']="Username or Password not matched";
      header("location:http://localhost/TempView/");
    }

  }else {
    $_SESSION['error']="Invalive Username or Email";
    header("location:http://localhost/TempView/");
  }
}


// $b->setData($_POST);


 ?>
