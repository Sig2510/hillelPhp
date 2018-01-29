<?php
  class MainPage extends Page {
    private $taxi;
    private $validator;

    public function __construct() {
      $this->taxi = new Taxi();
      $this->validator = new Validator();
    }

    protected function get() {
      $cars = $this->taxi->getAllCars();
      $drivers = $this->taxi->getAllDrivers();
      require_once './view/index.php';
    }


    protected function post() {
      $confirmed_errors = $this->validator->checkData($this->postData);

      if(empty($confirmed_errors)){
        if(isset($this->postData['driver_id'])){
          $this->taxi->setDriver($this->postData['driver_id'], $this->postData['car_id']);
        } else {
          $this->taxi->removeDriver($this->postData['car_id']);
        }
      }

      $cars = $this->taxi->getAllCars();
      $drivers = $this->taxi->getAllDrivers();
      require_once './view/index.php';
    }
  }
