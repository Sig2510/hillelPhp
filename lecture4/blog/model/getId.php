<?php
  class IdChecker{
    private $id = null;

    public function __construct () {
      if(!isset($_GET['id'])) {
        header('location: /');
      }else {
      $this->id = $_GET['id'];
      }
    }

    public function getId(){
        return $this->id;
    }
  }
