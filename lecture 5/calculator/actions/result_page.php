<?php
  class ResultPage extends Page {
    public function process($result){
      $tempResult = $result;
      require_once './view/result_page.php';
    }
  }
