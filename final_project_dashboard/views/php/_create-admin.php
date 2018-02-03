<?php
session_start();
include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\CreateAdmin\CreateAdmin;


$b = new CreateAdmin();

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// die();


if (isset($_POST)) {


  if ($_POST['password'] !== $_POST['confirmPassword'] ) {
    $_SESSION['errorMessage']="Password Not matched";
    header("location:".$baseUrl."/views/layout/create-admin.php");
  }
  elseif (!preg_match("/^[_a-zA-Z0-9]*$/",$_POST['userName'])) {
    $_SESSION['errorMessage']="No space or special character in user name";
    header("location:".$baseUrl."/views/layout/create-admin.php");
  }
  elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errorMessage']="Invalid email format";
    header("location:".$baseUrl."/views/layout/create-admin.php");
  }
  else {
    // die();
    $b->setData($_POST);
    $maxUser = $b->create_userId();
    $hash = $b->create_hash();
    $finalPass = $b->password_encrypt($_POST['confirmPassword'],$hash);
    $insert = $b->index($maxUser+1,$finalPass,$hash);
    if (empty($insert)) {
      $_SESSION['adminSuccess']="Admin Added Successfull";
      header("location:".$baseUrl."/views/layout/create-admin.php");
    }


  }



}



 ?>
