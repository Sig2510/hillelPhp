<?php
  class Router {
    const ROUTE_KEY = 'r';

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

    public function queryProcess() {
      if(count($this->dataArray) !== 0){
        $valid = new MyValidator();
        $t_num1 = $this->dataArray['num1'];
        $t_num2 = $this->dataArray['num2'];
        $t_oper = $this->dataArray['operations'];

        if(!$valid->checkData($t_num1, $t_num2)) {
          $this->actionArray['mainPage']->process();
          $this->actionArray['errorPage']->process();
        } else {
          switch ($this->urlArray[self::ROUTE_KEY]) {

            case '/':
              $this->actionArray['mainPage']->process();
              break;

            case '/result':
              $this->actionArray['resultPage']->process($t_num1, $t_num2, $t_oper);
              break;

            default:
              header('location: /index.php?r=/');
              break;
          }
        }
      } else {
        $this->actionArray['mainPage']->process();
      }
    }

  }
