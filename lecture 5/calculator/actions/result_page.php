<?php
  class ResultPage extends Page {

    public function process($num1, $num2, $oper){
      $num1 = $num1;
      $num2 = $num2;
      $tempResult = $this->operaionResultate($num1, $num2, $oper);
      require_once './view/result_page.php';
    }

    private function operaionResultate($num1, $num2, $oper) {
      $result = 0;
      $numb1 = $num1;
      $numb2 = $num2;
      $calc = new MyCalculator($numb1, $numb2);

      switch ($oper) {

        case 'add':
          $result = $calc->myAdd();
          break;

        case 'subtract':
          $result= $calc->mySub();
          break;

        case 'multiply':
          $result = $calc->myMulti();
          break;

        case 'divide':
          $result = $calc->myDiv();
          break;
      }

      return $result;
    }
  }
