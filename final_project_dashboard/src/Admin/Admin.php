<?php
namespace App\Admin;
use PDO;
include '../../db/dbconnection.php';

class Admin
{
  private $userId='';
  private $adminStatus='';

  private $activateAdminId;
  private $deactivateAdminId;

  private $updateEmail ='';

  private $oldPassword='';
  private $newPassword='';

  private $createAt='';
  private $updateAt='';
  private $deleteAt='';


  public function setData($value='')
  {

    if (array_key_exists("userId",$value)) {
      $this->userId=$value['userId'];
    }
    if (array_key_exists("adminStatus",$value)) {
      $this->adminStatus=$value['adminStatus'];
    }
    if (array_key_exists("deactivateAdminId",$value)) {
      $this->deactivateAdminId=$value['deactivateAdminId'];
    }
    if (array_key_exists("activateAdminId",$value)) {
      $this->activateAdminId=$value['activateAdminId'];
    }
    if (array_key_exists("updateEmail",$value)) {
      $this->updateEmail=$value['updateEmail'];
    }

    if (array_key_exists("oldPassword",$value)) {
      $this->oldPassword=$value['oldPassword'];
    }
    if (array_key_exists("changePassword",$value)) {
      $this->newPassword=$value['changePassword'];
    }

    if (array_key_exists("updateAt",$value)) {
      $this->updateAt=$value['updateAt'];
    }


    return $this;

  }




  public function index()
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "UPDATE  users SET status = :s, updated_at = :ua WHERE user_id='$this->userId'";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          's' => $this->adminStatus,
          'ua' => $this->updateAt

        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function find_super_admin($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * FROM  users WHERE status='Super'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function find_moderator_admin($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * FROM  users WHERE status='Moderator'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function find_editor_admin($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * FROM  users WHERE status='Editor'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function find_update_admin($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * FROM  users WHERE user_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function activate_admin($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "UPDATE  users SET token = :t, deleted_at = :da WHERE user_id='$this->activateAdminId'";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          't' => 0,
          'da' => '0000-00-00 00:00:00'

        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function deactivate_admin($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "UPDATE  users SET token = :t, deleted_at = :da WHERE user_id='$this->deactivateAdminId'";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          't' => 1,
          'da' => $value

        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function update_email($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "UPDATE  users SET email = :e, updated_at = :ua WHERE user_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          'e' => $this->updateEmail,
          'ua' => $this->updateAt
        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }


  public function update_password($newPass,$newHash,$user)
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "UPDATE  users SET user_pass = :p, user_hash= :h, updated_at = :ua  WHERE user_id='$user'";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          'p' => $newPass,
          'h' => $newHash,
          'ua' => $this->updateAt
        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function generate_pass($hash)
  {
    $finalPass = crypt($this->oldPassword,$hash);
    return $finalPass;
  }
  public function generate_new_pass($hash)
  {
    $finalPass = crypt($this->newPassword,$hash);
    return $finalPass;
  }

  public function create_hash($value='')
  {
    $hash_type = "$2y$10$";
    $salt_length = 22;

    $random_string=md5(uniqid(mt_rand(), true));
    $base64_string = base64_encode($random_string);
    $modified_base64_string = str_replace('+','.',$base64_string);
    $salt = substr($modified_base64_string,0,$salt_length);

    $hash = $hash_type.$salt;

    return $hash;

  }

  public function check_username($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * FROM  users WHERE user_name='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();

        if (array_key_exists(0,$data)) {
          echo $data[0]['user_id'];
        }



    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function check_email($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * FROM  users WHERE email='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();

        if (array_key_exists(0,$data)) {
          echo $data[0]['user_id'];
        }



    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  // public function find_user($value='')
  // {
  //   try{
  //       $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
  //       $query = "SELECT * FROM  users WHERE unique_id='$this->userId'";
  //       $stmt = $pdo->prepare($query);
  //       $stmt->execute();
  //       $data = $stmt->fetchAll();
  //       return $data[0];
  //
  //   }catch (PDOException $e){
  //       echo 'Error: '. $e->getMessage();
  //   }
  // }



}



 ?>
