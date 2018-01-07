<?php
  class Router {
    private $dataArray = [];
    private $urlArray = [];
    private $actionArray = [];

    public function __construct($dataArray, $urlArray) {
      $this->dataArray = $dataArray;
      $this->urlArray = $urlArray;
    }

    public function attach($actionName, $action) {
      $this->actionArray[$actionName] = $action;
    }

    private function createPath($path) {
      
    }

    public function queryProcess() {
      if(count($this->dataArray) !== 0){
        $calc = new MyCalculator($this->dataArray['num1'], $this->dataArray['num2']);

        if(!$calc->checkData()){
          $this->actionArray['mainPage']->process();
          $this->actionArray['errorPage']->process();
        } else {
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
              header('location: /index.php?');
              break;
          }
        }
      } else {
        $this->actionArray['mainPage']->process();
      }
    }

  }
