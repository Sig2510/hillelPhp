<?php
  class Router {
    private $dataArray = [];
    private $actionArray = [];

    public function __construct($array) {
      $this->dataArray = $array;
    }

    public function attach($actionName, $action) {
      $this->actionArray[$actionName] = $action;
    }

    public function loadHomePage() {
      $this->actionArray['mainPage']->process();
    }

    public function queryProcess() {
      $calc = new MyCalculator($this->dataArray['num1'], $this->dataArray['num2']);
      switch ($this->dataArray['operations']) {

        case 'add':
          $this->actionArray['resultPage']->process($calc->myAdd());
          break;

        case 'subtract':
          $this->actionArray['resultPage']->process($calc->mySub());
          break;

        case 'multiply':
          $this->actionArray['resultPage']->process($calc->myMulti());
          break;

        case 'divide':
          $this->actionArray['resultPage']->process($calc->myDiv());
          break;

        default:
          header('location: /index.php?r=/');
          break;
      }
    }

  }
