<?php
  class Taxi extends Connect {

    public function __construct() {
      parent::__construct();
    }

    public function getAllDrivers() {
      $res = $this->conn->query('SELECT name, id as driver_id FROM drivers WHERE car_id IS NULL ORDER BY id');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCars() {
      $res = $this->conn->query('SELECT c.model as model, c.id as car_id, d.name as driver FROM cars as c
                                 LEFT JOIN drivers as d ON c.driver_id = d.id ORDER BY c.id');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setDriver($driver_id, $car_id) {
      $stmt = $this->conn->prepare('UPDATE cars as c, drivers as d SET c.driver_id = ?, d.car_id = ?
                                    WHERE c.id = ? AND d.id = ?');
      $stmt->execute([$driver_id, $car_id, $car_id, $driver_id]);
    }

    public function removeDriver($car_id) {
      $stmt = $this->conn->prepare('UPDATE cars as c, drivers as d SET c.driver_id = NULL, d.car_id = NULL
                                    WHERE c.id = ? AND d.id = c.driver_id');
      $stmt->execute([$car_id]);
    }
  }
