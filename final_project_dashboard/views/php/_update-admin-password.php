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

  if (empty($_POST['oldPassword'])) {
    $_SESSION['errorPassChange']="Enter Old Password";
    header("location:".$baseUrl."admin/views/layout/update-admin.php");
  }
  else {
    $b->setData($_POST);
    $data = $b->find_update_admin($_SESSION["userId"]);
    // echo "<pre>";
    // print_r($data);
    // echo $_SESSION["username"]."<br/>";
    // echo $_SESSION["userId"];
    // die();

    $passForCheck = $b->generate_pass($data[0]['user_hash']);
    // echo $passForCheck."<br/>";
    // echo $data[0]['user_pass'];
    // die();
    if ( ($data[0]['user_name'] == $_SESSION["username"]) && ($data[0]['user_id'] == $_SESSION['userId']) ) {

      if ($data[0]['user_pass'] == $passForCheck ) {
        $hash = $b->create_hash();
        $newUpdatepassword = $b->generate_new_pass($hash);
        $insert = $b->update_password($newUpdatepassword,$hash,$_SESSION['userId']);
        if (empty($insert)) {
          $_SESSION['successPassChange']="Password Update Successfull";
          header("location:".$baseUrl."admin/views/layout/update-admin.php");
        }
      }else {
        $_SESSION['errorPassChange']="Old Password Not Mached";
        header("location:".$baseUrl."admin/views/layout/update-admin.php");
      }
    }else {
      header("location:../../logout.php");

    }



  }



}



 ?>
