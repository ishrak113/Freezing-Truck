<?php
namespace App\Rides;
use PDO;
include_once '../../db/dbconnection.php';

class Rides
{
  private $carId='';
  private $name='';
  private $phone='';
  private $to='';
  private $from='';
  private $createAt='';


  public function setData($value='')
  {
    if (array_key_exists("cars",$value)) {
      $this->carId=$value['cars'];
    }
    if (array_key_exists("driver",$value)) {
      $this->name=$value['driver'];
    }
    if (array_key_exists("phone",$value)) {
      $this->phone=$value['phone'];
    }
    if (array_key_exists("to",$value)) {
      $this->to=$value['to'];
    }
    if (array_key_exists("from",$value)) {
      $this->from=$value['from'];
    }
    if (array_key_exists("createAt",$value)) {
      $this->createAt=$value['createAt'];
    }

    return $this;

  }
  public function find_cars($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from cars WHERE user_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_on_ride($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from ride WHERE car_id='$this->carId' AND deleted_at='0000-00-00 00:00:00'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_chip_id($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from cars WHERE car_id='$this->carId'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function create_rideId($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT MAX(id) from ride";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data[0][0];

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function insert_ride($rideId)
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "INSERT INTO ride (ride_id,car_id,name,phone,ride_to,ride_from,created_at) Values(:ri,:ci,:n,:p,:rt,:rf,:ca)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          'ri' => $rideId,
          'ci' => $this->carId,
          'n' => $this->name,
          'p' => $this->phone,
          'rt' => $this->to,
          'rf' => $this->from,
          'ca' => $this->createAt
        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function insert_result($chipId)
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "INSERT INTO result (chip_id,temperature,lattitude,longitude,created_at) Values(:ci,:t,:lt,:lg,:ca)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          'ci' => $chipId,
          't' =>  "00",
          'lt' => "00.000000",
          'lg' => "00.000000",
          'ca' => $this->createAt
        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  // manage ride
  public function show_rides($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from ride where deleted_at='0000-00-00 00:00:00'";
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
        $query = "SELECT * from cars where car_id='$value'";
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
        $query = "SELECT * from cars where car_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data[0];

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_driver_name($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from ride where car_id='$value' AND deleted_at='0000-00-00 00:00:00'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data[0]['name'];

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_driver_phone($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from ride where car_id='$value' AND deleted_at='0000-00-00 00:00:00'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data[0]['phone'];

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function remove_ride($value='',$timeAndDate)
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "UPDATE  ride SET deleted_at = :da WHERE ride_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
          'da' => $timeAndDate

        ));
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }

  public function find_cars_id($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from ride where ride_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function find_chip_details($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "SELECT * from cars where car_id='$value'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;

    }catch (PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
  }
  public function remove_result($value='')
  {
    try{
        $pdo = new PDO('mysql:host=localhost;dbname='.db_name,db_username,db_password);
        $query = "DELETE FROM  result WHERE chip_id='$value'";
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
