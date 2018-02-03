<?php
namespace App\Login;
use PDO;
include '../../db/dbconnection.php';

class Login
{
  private $username='';
  // private $userId='';
  private $email='';
  private $password='';
  private $token='qwerty';
  private $userRole='2';
  private $isActive='1';

  private $loginUsername='';
  private $loginPassword='';


  public function setData($value='')
  {

    if (array_key_exists("loginUsername",$value)) {
      $this->loginUsername=$value['loginUsername'];
    }
    if (array_key_exists("LoginPassword",$value)) {
      $this->loginPassword=$value['LoginPassword'];
    }


    return $this;

  }


  public function findUser()
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * FROM users WHERE user_name='$this->loginUsername' or email='$this->loginUsername'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function generate_pass($hash)
  {
    $finalPass = crypt($this->loginPassword,$hash);
    return $finalPass;
  }



}



 ?>
