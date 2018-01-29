<?php
  class Router {
    const ROUTE_KEY = 'r';

    private $postData;
    private $getData;
    private $actions = [];

    public function __construct($postD, $getD) {
      $this->postData = $postD;
      $this->getData = $getD;
    }

    public function attach($key, $value) {
      $this->actions[$key] = $value;
    }

    public function serve() {
      switch ($this->getData[self::ROUTE_KEY]) {
        case '/':
          $this->actions['mainPage']->process($this->postData, $this->getData);
          break;

        default:
          header('location: /index.php?r=/');
          break;
      }
    }
  }
