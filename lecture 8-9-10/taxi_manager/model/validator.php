<?php
  class Validator extends Connect {
    private $errors = [];

    public function __construct() {
      parent::__construct();
    }

    private function checkCarStatus($car_id) {
      $stmt = $this->conn->prepare('SELECT driver_id FROM cars WHERE id = ?');
      $stmt->execute([$car_id]);
      $res = $stmt->fetch(PDO::FETCH_ASSOC);

      return is_null($res['driver_id']);
    }

    private function checkDriverStatus($driver_id) {
      $stmt = $this->conn->prepare('SELECT car_id FROM drivers WHERE id = ?');
      $stmt->execute([$driver_id]);
      $res = $stmt->fetch(PDO::FETCH_ASSOC);

      return is_null($res['car_id']);
    }

    public function checkData($data){
      $car_id = $data['car_id'];

      if(isset($data['driver_id'])) {
        $driver_id = $data['driver_id'];

        if(!$this->checkDriverStatus($driver_id)) {
          $this->errors[] = 'This driver is already working';
        } else {
          if(!$this->checkCarStatus($car_id)) {
             $this->errors[] = 'This car is already in use';
          }
        }
      } else {
        if($this->checkCarStatus($car_id)) {
          $this->errors[] = 'This car is already empty';
        }
      }

      return $this->errors;
    }
  }
