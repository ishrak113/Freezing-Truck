<?php
namespace App\Result;
use PDO;
include_once '../../db/dbconnection.php';

class Result
{
  private $chipId='';
  private $temp='';
  private $lt='';
  private $lg='';
  private $createAt='';

  public function setData($value='')
  {
    if (array_key_exists("id",$value)) {
      $this->chipId=$value['id'];
    }
    if (array_key_exists("temp",$value)) {
      $this->temp=$value['temp'];
    }
    if (array_key_exists("lt",$value)) {
      $this->lt=$value['lt'];
    }
    if (array_key_exists("lg",$value)) {
      $this->lg=$value['lg'];
    }

    return $this;

  }

  public function update_result($time)
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "UPDATE  result SET temperature = :t, lattitude = :lt, longitude = :lg, created_at = :ca WHERE chip_id='$this->chipId'";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          't' => $this->temp,
          'lt' => $this->lt,
          'lg' => $this->lg,
          'ca' => $time
        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function show_result($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from result where deleted_at='0000-00-00 00:00:00'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_userId($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from chip where chip_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_result($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from result where chip_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_cars_info($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from cars where ic_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data[0];

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_driver($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from ride where car_id='$value' AND deleted_at='0000-00-00 00:00:00'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }


}



 ?>
